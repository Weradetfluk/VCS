<?php
/*
* Choice_vote
* manage Choice vote
* @input -
* @output -
* @author suwapat saowarod 62160340
* @Create Date 2565-03-18
*/

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/VCS_controller.php";
class Choice_vote extends VCS_controller
{
	/*
 	* add_choice_vote
 	* add choice vote
 	* @input data
 	* @output -
 	* @author Priyarat Bumrungkit 62160156
 	* @Create Date 2565-03-12
 	*/
	public function add_choice_vote()
	{
		$this->load->model('/M_vcs_choice_vote', 'mcho');
		$this->mcho->cho_name = $this->input->post('cho_name');
		$this->mcho->cho_description = $this->input->post('cho_description');
		$this->mcho->cho_vot_id = $this->input->post('vot_id');

		$file = $_FILES['cho_path'] ?? '';
		$file_name = $_FILES['cho_path']['name'] ?? '';
		$file_tmp_name = $_FILES['cho_path']['tmp_name'] ?? '';
		$file_size = $_FILES['cho_path']['size'] ?? '';
		$file_error = $_FILES['cho_path']['error'] ?? '';
		$error_image = '';
		if (isset($file)) {
			$file_ext = explode('.', $file_name); // เเยก string ให้เป็น array โดยใช้ ' . ' ในการแยก

			// end() จะดึงค่าสุดท้ายของ array จากนั้นนำมาทำเป็นตัวอักษรพิมพ์เล็ก ด้วยคำสั่ง strtolower()
			$file_actaul_ext = strtolower(end($file_ext));

			// เช็คว่าไฟล์นั้นมีปัญหาหรือไม่ และรูปขนาดเกิน 30000000 KB หรือไม่
			if ($file_error != 0 || $file_size >= 3000000) {
				$error_image = 'false';
			}
		} else {
			$error_image = 'false';
		}

		if ($error_image != 'false') {
			$file_new_name = uniqid('', true); // uniqid เอาไว้สร้าง id แบบสุ่ม 23 ตัวอักษร

			// ใส่ directory ที่จะเก็บ ลงในตัวแปร file_destination
			$file_destination = './image_choice_vote/' . $file_new_name . '.' . $file_actaul_ext;
			move_uploaded_file($file_tmp_name, $file_destination); // เก็บไฟล์ลง floder ที่ชื่อว่า image_choice_vote

			// สร้าง path รูปภาพเพื่อเข้าถึงภาพที่พึ่งเก็บ

			$this->mcho->cho_path = $file_new_name . '.' . $file_actaul_ext;
			$this->mcho->add_choice_vote();

			$this->session->set_userdata("add_error_image", 'success');
		} else {
			$this->session->set_userdata("add_error_image", 'fail');
		}
		redirect('Choice_vote/show_choice_vote_list/' . $this->input->post('vot_id'));
	}

	/*
	 * show_choice_vote_list
	 * show list choice vote 
	 * @input -
	 * @output -
	 * @author suwapat saowarod 62160340
	 * @Create Date 2565-03-06
	 */
	public function show_choice_vote_list($vot_id)
	{
		$this->load->model('M_vcs_choice_vote', 'mcho');
		$this->load->model('M_vcs_vote', 'mvot');
		$this->mcho->cho_vot_id = $vot_id;
		$data['arr_choice_vote'] = $this->mcho->get_choice_vote_by_vot_id();
		$data['arr_vote'] = $this->mvot->get_vote_name();
		$this->load->model('M_vcs_user', 'muse');
		if ($this->session->has_userdata("use_status") == 2) {
			$this->muse->use_id = $this->session->userdata("use_id");

			$result = $this->muse->get_by_id();
			$this->session->set_userdata("use_point", $result->use_point);
		}
		$data['vot_id'] = $vot_id;
		$this->output('v_list_choice_vote', $data);

		
	}

	/*
	 * vote_ajax
	 * vote save in database
	 * @input cho_id, score_vote
	 * @output -
	 * @author suwapat saowarod 62160340
	 * @Create Date 2565-03-10
	 */
	public function vote_ajax()
	{
		$this->load->model('M_vcs_choice_vote', 'mcho');
		$this->load->model('M_vcs_history_vote', 'mhis');

		// vcs_history_vote
		date_default_timezone_set('Asia/Bangkok');
		$date_now = date("Y-m-d H:i:s");
		$check_vote = $this->mcho->check_vote($date_now);
		if($check_vote){
			$this->mhis->his_use_id = $this->session->userdata("use_id");
			$this->mhis->his_cho_id = $this->input->post('cho_id');
			$this->mhis->his_score = $this->input->post('score_vote');
			$point_sum = $this->session->userdata("use_point") - $this->input->post('score_vote');
			$this->session->set_userdata("use_point", $point_sum);
			$this->mhis->his_date_vote = $date_now;
			$this->mhis->insert_history_vote();
	
			echo 1;
		}else{
			echo 2;
		}
		
	}

	/*
	 * delete_choice_vote_ajax
	 * delete choice vote
	 * @input cho_id
	 * @output -
	 * @author Thanisorn thumsawanit 62160088
	 * @Create Date 2565-03-12
	 * @Update -
	 */
	public function delete_choice_vote_ajax()
	{
		$this->load->model('/M_vcs_choice_vote', 'mvcv');
		$this->mvcv->cho_id = $this->input->post('cho_id');
		$this->mvcv->delete_choice_vote();
	}

	/*
	 * update_choice_vote
	 * update choice vote
	 * @input cho_id,choice_name,choice_system_name
	 * @output -
	 * @author Jutamas Thaptong 62160079
	 * @Create Date 2565-03-12
	 * @Update -
	 */
	public function update_choice_vote()
	{

		$this->load->model('/M_vcs_choice_vote', 'mcho');
		$this->mcho->cho_id = $this->input->post('cho_id');
		$this->mcho->cho_name = $this->input->post('cho_name');
		$this->mcho->cho_description = $this->input->post('cho_description');
		$this->mcho->cho_vot_id = $this->input->post('vot_id');

		$file = $_FILES['cho_path_edit'] ?? '';
		$file_name = $_FILES['cho_path_edit']['name'] ?? '';
		$file_tmp_name = $_FILES['cho_path_edit']['tmp_name'] ?? '';
		$file_size = $_FILES['cho_path_edit']['size'] ?? '';
		$file_error = $_FILES['cho_path_edit']['error'] ?? '';
		$error_image = '';

		if (isset($file)) {
			$file_ext = explode('.', $file_name); // เเยก string ให้เป็น array โดยใช้ ' . ' ในการแยก

			// end() จะดึงค่าสุดท้ายของ array จากนั้นนำมาทำเป็นตัวอักษรพิมพ์เล็ก ด้วยคำสั่ง strtolower()
			$file_actaul_ext = strtolower(end($file_ext));

			// เช็คว่าไฟล์นั้นมีปัญหาหรือไม่ และรูปขนาดเกิน 30000000 KB หรือไม่
			if ($file_error != 0 || $file_size >= 3000000) {
				$error_image = 'false';
			}
		} else {
			$error_image = 'false';
		}

		if ($error_image != 'false') {

			$file_new_name = uniqid('', true); // uniqid เอาไว้สร้าง id แบบสุ่ม 23 ตัวอักษร

			// ใส่ directory ที่จะเก็บ ลงในตัวแปร file_destination
			$file_destination = './image_choice_vote/' . $file_new_name . '.' . $file_actaul_ext;
			move_uploaded_file($file_tmp_name, $file_destination); // เก็บไฟล์ลง floder ที่ชื่อว่า image_choice_vote

			// สร้าง path รูปภาพเพื่อเข้าถึงภาพที่พึ่งเก็บ
			$this->mcho->cho_path = $file_new_name . '.' . $file_actaul_ext;
			// echo '<br>cho_path: ' . $this->mcho->cho_path;

			$this->mcho->update_choice_vote();
			//$arr_img_delete_old = array();
			$arr_img_delete_old = $this->input->post('cho_path_old');
			if ($arr_img_delete_old != '') {
				$this->mcho->cho_path = $arr_img_delete_old;
				unlink('./image_choice_vote/' . $arr_img_delete_old);
				// $this->mcho->delete_image_choice_vote();	
			}
			$this->session->set_userdata("edit_error_image", 'success');
			redirect('Choice_vote/show_choice_vote_list/' . $this->input->post('vot_id'));
		} else if (isset($_FILES["cho_path_edit"]) && empty($_FILES["cho_path_edit"]["name"])) {

			$this->session->set_userdata("edit_error_image", 'success');
			$this->mcho->cho_path = $this->input->post('cho_path_old');
			$this->mcho->update_choice_vote();
			redirect('Choice_vote/show_choice_vote_list/' . $this->input->post('vot_id'));
		} else {

			$this->session->set_userdata("edit_error_image", 'fail');
			redirect('Choice_vote/show_choice_vote_list/' . $this->input->post('vot_id'));
		}
	}
}
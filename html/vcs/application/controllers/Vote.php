<?php
/*
* Vote
* manage vote
* @input -
* @output -
* @author suwapat saowarod 62160340
* @Create Date 2565-03-01
*/

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/VCS_controller.php";
class Vote extends VCS_controller
{
    /*
	* index
	* 
	* @input -
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-01
	*/
	public function index()
	{
		$this->show_vote_list();
	}

	/*
	* show_vote_list
	* show list vote 
	* @input -
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-06
	*/
	public function show_vote_list()
	{
		$this->load->model('M_vcs_vote', 'vvot');
		date_default_timezone_set('Asia/Bangkok');
		$date_now = date("Y-m-d H:i:s");
		if ($this->session->userdata("use_status") == 1) {
			$and = "('" .  $date_now . "' between vot_start_time AND vot_end_time) AND vot_status = 2";
		} else {
			$and = '';
		}
		$data['arr_vote'] = $this->vvot->get_vote_all($and);
		$this->output('v_list_vote', $data);
	}

    /*
    * delete_vote_ajax
    * delete vote
    * @input vot_id
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2565-03-12
    * @Update -
    */
	public function delete_vote_ajax()
	{
		$this->load->model('/M_vcs_vote', 'mvot');
		$this->mvot->vot_id = $this->input->post('vot_id');
		$this->mvot->delete_vote();
	}

    /*
 	* add_choice_vote
 	* add choice vote
 	* @input data
 	* @output -
 	* @author Priyarat Bumrungkit 62160156
 	* @Create Date 2565-03-12
 	*/
	public function add_vote()
	{
		$this->load->model('/M_vcs_vote', 'mvot');
		$this->mvot->vot_name = $this->input->post('name');
		$this->mvot->vot_start_time = $this->input->post('start_vote');
		$this->mvot->vot_end_time = $this->input->post('end_vote');

		$file = $_FILES['vot_path'] ?? '';
		$file_name = $_FILES['vot_path']['name'] ?? '';
		$file_tmp_name = $_FILES['vot_path']['tmp_name'] ?? '';
		$file_size = $_FILES['vot_path']['size'] ?? '';
		$file_error = $_FILES['vot_path']['error'] ?? '';
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
			$file_destination = './image_vote/' . $file_new_name . '.' . $file_actaul_ext;
			move_uploaded_file($file_tmp_name, $file_destination); // เก็บไฟล์ลง floder ที่ชื่อว่า image_vote

			// สร้าง path รูปภาพเพื่อเข้าถึงภาพที่พึ่งเก็บ
			$this->mvot->vot_path = $file_new_name . '.' . $file_actaul_ext;
			$this->mvot->add_vote();
			$this->session->set_userdata("add_error_image", 'success');
		} else {
			$this->session->set_userdata("add_error_image", 'fail');
		}
		redirect('Vote/show_vote_list');
	}
	/*
    * update_status_vote_ajax
    * update vote status
    * @input vote_id
    * @output -
    * @author Kasama Donwong 62160074
    * @Create Date 2565-03-15
    * @Update Date -
    */
	public function update_status_vote_ajax()
	{
		$this->load->model('/M_vcs_vote', 'mvot');
		$this->mvot->vot_id = $this->input->post('vot_id');
		$this->mvot->vot_status = $this->input->post('vot_status');
		$this->mvot->update_status_vote();
	}

	/*
 	* edit_vote
 	* edit vote
 	* @input data
 	* @output -
 	* @author Naaka Punparich 62160082
 	* @Create Date 2565-03-16
 	*/
	public function edit_vote()
	{
		$this->load->model('/M_vcs_vote', 'mvot');
		$this->mvot->vot_id = $this->input->post('id');
		$this->mvot->vot_name = $this->input->post('name');
		$this->mvot->vot_start_time = $this->input->post('start_vote');
		$this->mvot->vot_end_time = $this->input->post('end_vote');

		$file = $_FILES['vot_path_edit'] ?? '';
		$file_name = $_FILES['vot_path_edit']['name'] ?? '';
		$file_tmp_name = $_FILES['vot_path_edit']['tmp_name'] ?? '';
		$file_size = $_FILES['vot_path_edit']['size'] ?? '';
		$file_error = $_FILES['vot_path_edit']['error'] ?? '';
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
			$file_destination = './image_vote/' . $file_new_name . '.' . $file_actaul_ext;
			move_uploaded_file($file_tmp_name, $file_destination); // เก็บไฟล์ลง floder ที่ชื่อว่า image_vote

			// สร้าง path รูปภาพเพื่อเข้าถึงภาพที่พึ่งเก็บ
			$this->mvot->vot_path = $file_new_name . '.' . $file_actaul_ext;
			// echo '<br>vot_path: ' . $this->mvot->vot_path;

			$this->mvot->edit_vote();
			//$arr_img_delete_old = array();
			$arr_img_delete_old = $this->input->post('vot_path_old');
			if($arr_img_delete_old != ''){
					$this->mvot->vot_path = $arr_img_delete_old;
					unlink('./image_vote/' . $arr_img_delete_old);
					$this->mvot->delete_image_vote();	
			}
			$this->session->set_userdata("edit_error_image", 'success');
			redirect('Vote/show_vote_list');
		} else if (isset($_FILES["vot_path_edit"]) && empty($_FILES["vot_path_edit"]["name"])) {
			$this->session->set_userdata("edit_error_image", 'success');
			$this->mvot->vot_path = $this->input->post('vot_path_old');
			$this->mvot->edit_vote();			
			redirect('Vote/show_vote_list');
		} else {
			$this->session->set_userdata("edit_error_image", 'fail');
			redirect('Vote/show_vote_list');
		}
	}
}
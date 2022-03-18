<?php
/*
* User
* manage User
* @input -
* @output -
* @author suwapat saowarod 62160340
* @Create Date 2565-03-01
*/

defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/VCS_controller.php";
class User extends VCS_controller
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
		$this->show_manage_user_page();
	}

	/*
	* show_manage_user_page
	* show manage user page 
	* @input data
	* @output -
	* @author naaka punparich 62160082 & 
	* @Create Date 2565-03-01
	*/
	public function show_manage_user_page()
	{
		$this->load->model('/M_vcs_user', 'vuse');
		$data['arr_user'] = $this->vuse->get_user_all();
		$this->output('v_manage_user', $data);
	}

	/*
	* show_manage_user_page
	* show manage user page 
	* @input data
	* @output -
	* @author naaka punparich 62160082 
	* @Create Date 2565-03-01
	*/
	public function add_manage_user()
	{
		$this->load->model('/Da_vcs_user', 'vuse');

		$this->vuse->use_id = intval($this->input->post('use_id'));
		$this->vuse->use_name = $this->input->post('use_name');
		$this->vuse->use_username = $this->input->post('use_username');
		$this->vuse->use_password = $this->input->post('use_password');
		$this->vuse->use_status = 1;
		$this->vuse->use_point = $this->input->post('use_point');

		$this->vuse->add_user();
		redirect('User/show_manage_user_page');
	}


	/*
	* update_user_information
	* update_user_information
	* @input data
	* @output -
	* @author Chutipon Thermsirisuksin 62160081 
	* @Create Date 2565-03-13
	*/
	public function update_user_information()
	{
		$this->load->model('/M_vcs_user', 'vuse');

		$this->vuse->use_id = $this->input->post('use_id');
		$this->vuse->use_name = $this->input->post('use_name');
		$this->vuse->use_username = $this->input->post('use_username');
		$this->vuse->use_password = $this->input->post('use_password');
		$this->vuse->use_status = 1;
		$this->vuse->use_point = $this->input->post('use_point');

		$this->vuse->update_user();
		redirect('User/show_manage_user_page');
	}

	/*
    * delete_use
    * update use_status = 4 in database
    * @input use_id
    * @output -
    * @author Acharaporn pornpattanasap 62160344
    * @Create Date 2565-03-12
    */
	public function delete_user()
	{
		$this->load->model('/M_vcs_user', 'vuse');
		$this->vuse->use_id = $this->input->post('use_id');
		$this->vuse->delete_user();
	}
}
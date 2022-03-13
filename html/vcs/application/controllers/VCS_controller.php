<?php
/*
* VCS_controller
* controller
* @input -
* @output -
* @author suwapat saowarod 62160340
* @Create Date 2565-03-01
*/

defined('BASEPATH') or exit('No direct script access allowed');

class VCS_controller extends CI_Controller
{
	/*
    * @author Suwapat Saowarod 62160340
    */
	public function __construct()
	{
		parent::__construct();
		$this->load->helper('mydate_helper.php');
	}

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
		$this->show_login_page();
	}

	/*
	* output
	* show views
	* @input view, data
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-06
	*/
	public function output($view, $data = NULL)
	{
		$this->load->view('v_header');
		$this->load->view('v_javascript');
		$this->load->view('v_topbar');
		$this->load->view($view, $data);
		$this->load->view('v_footer');
	}

	/*
	* show_login_page
	* show page login to vote system
	* @input data
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-01
	*/
	public function show_login_page()
	{
		$this->load->view('v_header');
		$this->load->view('v_javascript');
		$this->load->view('v_login');
		$this->load->view('v_footer');
	}

	/*
	* login
	* login
	* @input username, password
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-06
	*/
	public function login()
	{
		$this->load->model('/M_vcs_user', 'vuse');
		$this->vuse->use_username = $this->input->post('username');
		$this->vuse->use_password = $this->input->post('password');
		$check_login = $this->vuse->get_by_username_and_password();

		if($check_login){
			// set session
			$this->session->set_userdata("use_id", $check_login->use_id);
			$this->session->set_userdata("use_name", $check_login->use_name);
			$this->session->set_userdata("use_status", $check_login->use_status);
			$this->session->set_userdata("use_point", $check_login->use_point);
			if($this->session->userdata("use_status") == 1){
				redirect('User/show_vote_list');
			}else{
				$this->show_manage_user_page();
			}
			
		}else{
			$data['login_fail'] = 'ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้อง';
			$this->output('v_login', $data);
		}
	}

	/*
	* logout
	* logout
	* @input -
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-12
	*/
	public function logout()
	{
		$this->session->unset_userdata("use_id");
		$this->session->unset_userdata("use_name");
		$this->session->unset_userdata("use_status");
		$this->session->unset_userdata("use_point");
		$this->output('v_login');
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
		redirect('VCS_controller/show_manage_user_page');
	}
}

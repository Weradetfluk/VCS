<?php
/*
* VCS_controller
* controller
* @input -
* @output -
* @author suwapat saowarod 62160340
* @Create Date 2565-03-01
*/ 

defined('BASEPATH') OR exit('No direct script access allowed');

class VCS_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
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
		$this->output('v_login');
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

		// if($check_login){
		// 	redirect('User/show_vote_list');
		// }else{
		// 	$data['login_fail'] = 'ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้อง';
		// 	$this->output('v_login', $data);
		// }
	}
}

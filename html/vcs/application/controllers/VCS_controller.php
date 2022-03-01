<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class VCS_controller extends CI_Controller {

	public function __construct()
    {
        parent::__construct();
    }
	
	public function index()
	{
		$this->show_login_page();
	}

	/*
	* show_login_page
	* show page login to vote system
	* @input -
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-01
	*/ 
	public function show_login_page()
	{
		$this->load->view('v_header');
		$this->load->view('v_javascript');
		$this->load->view('login');
		$this->load->view('v_footer');
	}
}

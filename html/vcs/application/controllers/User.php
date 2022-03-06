<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include_once dirname(__FILE__) ."/VCS_controller.php";
class User extends VCS_controller {

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
    public function show_vote_list(){
        $this->load->model('M_vcs_vote', 'vvot');
        $data['arr_vote'] = $this->vvot->get_vote_all();
        $this->output('v_list_vote', $data);
        // echo '<pre>';
        // print_r($data['arr_vote']);
        // echo '</pre>';
    }
}

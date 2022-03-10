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

	/*
	* show_choice_vote_list
	* show list choice vote 
	* @input -
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-06
	*/ 
    public function show_choice_vote_list($vot_id){
        $this->load->model('M_vcs_choice_vote', 'vcho');
		$this->vcho->cho_vot_id = $vot_id;
        $data['arr_choice_vote'] = $this->vcho->get_choice_vote_by_vot_id();
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
    public function vote_ajax(){
		$this->load->model('M_vcs_choice_vote', 'vcho');
		$this->load->model('M_vcs_user', 'usr');
		$score_sum = $this->input->post('score_vote') + $this->input->post('cho_score');
		$this->vcho->cho_score = $score_sum;
		$this->vcho->cho_id = $this->input->post('cho_id');
        $this->vcho->update_score_by_cho_id();
    }
}

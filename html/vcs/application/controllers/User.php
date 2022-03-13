<?php
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
		$data['arr_vote'] = $this->vvot->get_vote_all();
		$this->output('v_list_vote', $data);
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
		$this->mcho->cho_vot_id = $vot_id;
		$data['arr_choice_vote'] = $this->mcho->get_choice_vote_by_vot_id();
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
		$this->load->model('M_vcs_user', 'musr');
		$this->load->model('M_vcs_history_vote', 'mhis');

		// vcs_choice_vote
		$score_sum = $this->input->post('score_vote') + $this->input->post('cho_score');
		$this->mcho->cho_score = $score_sum;
		$this->mcho->cho_id = $this->input->post('cho_id');
		$this->mcho->update_score_by_cho_id();

		// vcs_user
		$point_sum = $this->session->userdata("use_point") - $this->input->post('score_vote');
		$this->session->set_userdata("use_point", $point_sum);
		$this->musr->use_id = $this->session->userdata("use_id");
		$this->musr->use_point = $this->session->userdata("use_point");
		$this->musr->update_point_by_use_id();

		// vcs_history_vote
		date_default_timezone_set('Asia/Bangkok');
		$this->mhis->his_use_id = $this->session->userdata("use_id");
		$this->mhis->his_cho_id = $this->input->post('cho_id');
		$this->mhis->his_score = $this->input->post('score_vote');
		$this->mhis->his_date_vote = date("Y-m-d H:i:s");
		$this->mhis->insert_history_vote();

		echo 1;
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

	public function update_choice_vote_ajax()
	{

		$this->load->model('/M_vcs_choice_vote', 'mvcv');
		$this->mvcv->cho_id = $this->input->post('cho_id');
		$this->mvcv->cho_name = $this->input->post('choice_name');
		$this->mvcv->cho_score = $this->input->post('choice_score');
		$this->mvcv->update_choice_vote();
	}


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
		$this->mcho->cho_score = $this->input->post('cho_score');
		$this->mcho->cho_vot_id = $this->input->post('vot_id');
		$this->mcho->add_choice_vote();
		$this->show_choice_vote_list($this->input->post('vot_id'));
	}
}
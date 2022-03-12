<?php
/*
* Dashboard_score
* Dashboard_score controller show score
* @input -
* @output -
* @author weradet nopsombun 62160110
* @Create Date 2565-03-12
*/
include_once dirname(__FILE__) ."/VCS_controller.php";
defined('BASEPATH') or exit('No direct script access allowed');
class Dashboard_score extends VCS_controller
{

	public function __construct()
	{
		parent::__construct();
	}

	/*
	* index
	* 
	* @input -
	* @output -
	* @author weradet nopsombun 62160110
	* @Create Date 2565-03-12
	*/
	public function index()
	{
		$this->show_list_vote_page();
	}

	/*
	* index
	* 
	* @input -
	* @output -
	* @author weradet nopsombun 62160110
	* @Create Date 2565-03-12
	*/
	public function show_list_vote_page()
	{
		

	}

	/*
	* show_dasbord_score_page
	* show page login to vote system
	* @input cho_vot_id
	* @output -
	* @author weradet nopsombun 62160110
	* @Create Date 2565-03-11
	*/
	public function show_dasbord_score_page($cho_vot_id)
	{
		$data['cho_vot_id'] = $cho_vot_id;
		$this->output("v_show_score", $data);
	}
	/*
	* index
	* 
	* @input -
	* @output -
	* @author weradet nopsombun 62160110
	* @Create Date 2565-03-12
	*/
	public function get_score_vote_ajax()
	{
		$this->load->model('/M_vcs_choice_vote', 'vcsm');
		$this->vcsm->cho_vot_id = $this->input->post('cho_vot_id');

		$data['arr_score'] =$this->vcsm->get_score_vote();

		echo json_encode($data);

	}
}

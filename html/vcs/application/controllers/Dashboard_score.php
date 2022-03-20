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


	public function show_list_vote_page(){
		$this->session->unset_userdata('page');
		$this->session->set_userdata('page', 3);

		$data = array();
		$data['arr_vote'] = $this->get_data_vote();
		$this->output('v_list_vote_dashboard', $data);
	}


	/*
	* index
	* 
	* @input -
	* @output -
	* @author weradet nopsombun 62160110
	* @Create Date 2565-03-12
	*/
	public function get_data_vote()
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
		return $data;
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

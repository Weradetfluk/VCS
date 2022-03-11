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
		$this->show_list_vote();
	}

	/*
	* index
	* 
	* @input -
	* @output -
	* @author weradet nopsombun 62160110
	* @Create Date 2565-03-12
	*/
	public function show_list_vote()
	{
		

	}
	/*
	* show_dasbord_score_page
	* show page login to vote system
	* @input data
	* @output -
	* @author suwapat saowarod 62160340
	* @Create Date 2565-03-01
	*/
	public function show_dasbord_score_page()
	{
		$this->output("v_show_score");
	}


}

<?php
/*
* Da_vcs_vote
* Manage vote
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/VCS_model.php";
class Da_vcs_vote extends VCS_model{
	
	public $vot_id;
	public $vot_name;
    public $vot_status;
    public $vot_start_time;
    public $vot_end_time;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }
}
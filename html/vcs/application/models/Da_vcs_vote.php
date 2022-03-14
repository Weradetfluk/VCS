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
    public $vot_path;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * add_vote
    * Add Vote
    * @input cho_name, cho_score, cho_vot_id
    * @output 
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2565-03-12
    */
    public function add_vote()
    {
        $sql = "INSERT INTO `vcs_vote`(vot_name, vot_start_time, vot_end_time, vot_path, vot_status) VALUES(?, ?, ?, ?, 1)";
        $this->db->query($sql, array($this->vot_name, $this->vot_start_time, $this->vot_end_time, $this->vot_path));
    }
}
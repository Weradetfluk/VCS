<?php
/*
* Da_vcs_history_vote
* Manage history vote
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-11
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/VCS_model.php";
class Da_vcs_history_vote extends VCS_model{
	
	public $his_id;
	public $his_date_vote;
    public $his_score;
    public $his_cho_id;
    public $his_use_id;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * insert_history_vote
    * insert history vote
    * @input his_date_vote, his_score, his_cho_id, his_use_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-11
    * @Update Date -
    */
    function insert_history_vote()
    {
        $sql = "INSERT INTO `vcs_history_vote`(`his_date_vote`, `his_score`, `his_cho_id`, `his_use_id`) 
                VALUES (?,?,?,?)";
        $this->db->query($sql, array($this->his_date_vote, $this->his_score, $this->his_cho_id, $this->his_use_id));
    }
}
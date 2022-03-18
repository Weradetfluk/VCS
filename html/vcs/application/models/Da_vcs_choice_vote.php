<?php
/*
* Da_vcs_choice_vote
* Manage choice vote
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-10
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/VCS_model.php";
class Da_vcs_choice_vote extends VCS_model
{

    public $cho_id;
    public $cho_name;
    public $cho_score;
    public $cho_vot_id;
    public $cho_status;
    public $cho_path;
    public $cho_system_name;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
    * update_score_by_cho_id
    * update score by cho id
    * @input cho_id, cho_score
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-10
    * @Update Date -
    */
    function update_score_by_cho_id()
    {
        $sql = "UPDATE `vcs_choice_vote` SET `cho_score`=?
                WHERE cho_id = ?";
        $this->db->query($sql, array($this->cho_score, $this->cho_id));
    }
    /*
    * delete_choice_vote
    * delete choice vote
    * @input cho_id
    * @output -
    * @author Thanisorn thumsawanit 62160088
    * @Create Date 2564-03-12
    */
    public function delete_choice_vote()
    {
        $sql = "UPDATE `vcs_choice_vote` SET 
                    `cho_status`=2
                WHERE cho_id = ?";
        $this->db->query($sql, array($this->cho_id));
    }

    public function update_choice_vote()
    {
        $sql = "UPDATE `vcs_choice_vote` SET 
                    `cho_name`=?,
                    `cho_score`=?
                WHERE cho_id = ?";

        $this->db->query($sql, array($this->cho_name, $this->cho_score, $this->cho_id));
    }

    /*
    * add_choice_vote
    * Add Choice Vote
    * @input data
    * @output 
    * @author Priyarat Bumrungkit 62160156
    * @Create Date 2565-03-12
    */
    public function add_choice_vote()
    {
        $sql = "INSERT INTO vcs_choice_vote(cho_name, cho_system_name, cho_vot_id, cho_score, cho_status, cho_path) VALUES(?, ?, ?, 0, 1, ?)";
        $this->db->query($sql, array($this->cho_name, $this->cho_system_name, $this->cho_vot_id, $this->cho_path));
    }
}
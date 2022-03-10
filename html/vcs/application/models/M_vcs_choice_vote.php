<?php
/*
* M_vcs_choice_vote
* Get data choice vote
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-10
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/Da_vcs_choice_vote.php";
class M_vcs_choice_vote extends Da_vcs_choice_vote{
    
    /*
    * get_choice_vote_by_vot_id
    * get choice vote by vot_id
    * @input use_username, use_password
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-10
    * @Update Date -
    */
    function get_choice_vote_by_vot_id()
    {
        $sql = "SELECT cho_id, cho_name, cho_score from vcs_choice_vote
                WHERE cho_vot_id = ?";
        $query = $this->db->query($sql, array($this->cho_vot_id));
        return $query->result();
    }
}
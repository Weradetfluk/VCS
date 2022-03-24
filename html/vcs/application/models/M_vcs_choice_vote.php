<?php
/*
* M_vcs_choice_vote
* Get data choice vote
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-10
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/Da_vcs_choice_vote.php";
class M_vcs_choice_vote extends Da_vcs_choice_vote
{
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
        $sql = "SELECT cho_id, cho_name, cho_score, cho_path, cho_description from vcs_choice_vote
                WHERE cho_vot_id = ? AND cho_status = 1";
        $query = $this->db->query($sql, array($this->cho_vot_id));
        return $query->result();
    }
    /*
    * get_score_vote()
    * get choice vote score by vot_id
    * @input use_username, use_password
    * @output -
    * @author weradet nopsombun 62160110
    * @Create Date 2565-03-12
    * @Update Date -
    */
    function get_score_vote()
    {
        $sql = "SELECT vcs_choice_vote.cho_score, vcs_choice_vote.cho_name FROM vcs_choice_vote 
        WHERE vcs_choice_vote.cho_vot_id = ?";
        $query = $this->db->query($sql, array($this->cho_vot_id));
        return $query->result();
    }

    /*
    * check_vote()
    * check vote
    * @input cho
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-21
    * @Update Date -
    */
    function check_vote($date_now)
    {
        $sql = "SELECT * FROM vcs_choice_vote
                LEFT JOIN vcs_vote
                ON vcs_vote.vot_id = vcs_choice_vote.cho_vot_id
        WHERE ('$date_now' between vcs_vote.vot_start_time AND vcs_vote.vot_end_time) AND vcs_vote.vot_status = 2";
        $query = $this->db->query($sql, array($this->cho_vot_id));
        $query_row = $query->num_rows();
        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }
}

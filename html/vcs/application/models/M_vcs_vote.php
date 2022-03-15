<?php
/*
* M_vcs_vote
* Get data vote
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/Da_vcs_vote.php";
class M_vcs_vote extends Da_vcs_vote{
    /*
    * get_vote_all
    * get vote all
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-06
    * @Update Date -
    */
    function get_vote_all($and)
    {   
        if($and != ''){
            $sql = "SELECT * from vcs_vote WHERE $and";
        }else{
            $sql = "SELECT * from vcs_vote WHERE vot_status != 3";
        }
        
        $query = $this->db->query($sql);
        return $query->result();
    }
}
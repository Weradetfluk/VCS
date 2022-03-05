<?php
/*
* M_vcs_user
* Get data user
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/Da_vcs_user.php";
class M_vcs_user extends Da_vcs_user{
    
    /*
    * get_by_username_and_password
    * get by username and password
    * @input use_username, use_password
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-06
    * @Update Date -
    */
    function get_by_username_and_password()
    {
        $sql = "SELECT use_id from vcs_user
                WHERE use_username = ? AND use_password = ?";
        $query = $this->db->query($sql, array($this->use_username, $this->use_password));
        return $query;
    }
}
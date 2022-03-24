<?php
/*
* M_vcs_user
* Get data user
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/Da_vcs_user.php";
class M_vcs_user extends Da_vcs_user
{

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
        $sql = "SELECT use_id, use_name, use_status, use_point from vcs_user
                WHERE use_username = ? AND use_password = ?";
        $query = $this->db->query($sql, array($this->use_username, $this->use_password));
        $query_row = $query->num_rows();

        if ($query_row) {
            return $query->row();
        } else {
            return false;
        }
    }

    /*
    * get_user_all
    * get user all
    * @input -
    * @output -
    * @author naaka punparich 62160082
    * @Create Date 2565-03-06
    * @Update Date -
    */
    function get_user_all()
    {
        $sql = "SELECT * from vcs_user";
        $query = $this->db->query($sql);
        return $query->result();
    }

    /*
    * get_by_id
    * get user by id
    * @input -
    * @output -
    * @author Suwapat Saowarod 62160340 
    * @Create Date 2565-03-24
    * @Update Date -
    */
    function get_by_id()
    {
        $sql = "SELECT use_password from vcs_user WHERE use_id = ?";
        $query = $this->db->query($sql, array($this->use_id));
        return $query->row();
    }
}

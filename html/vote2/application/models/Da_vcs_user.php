<?php
/*
* Da_vcs_user
* Manage user
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) . "/VCS_model.php";
class Da_vcs_user extends VCS_model
{

    public $use_id;
    public $use_name;
    public $use_username;
    public $use_password;
    public $use_status;
    public $use_point;

    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        parent::__construct();
    }

    /*
	* add_user
	* Add user
	* @input data
	* @output -
	* @author naaka punparich 62160082 
	* @Create Date 2565-03-01
	*/
    public function add_user()
    {
        $sql = "INSERT INTO vcs_user(use_id, use_name, use_username, use_password, use_status, use_point) VALUES(?, ?, ?, ?, ?, ?)";
        $this->db->query($sql, array($this->use_id, $this->use_name, $this->use_username, $this->use_password, $this->use_status, $this->use_point));
    }

    /*
    * update_point_by_use_id
    * update score by cho id
    * @input use_point, use_id
    * @output -
    * @author Suwapat Saowarod 62160340
    * @Create Date 2565-03-11
    * @Update Date -
    */
    function update_point_by_use_id()
    {
        $sql = "UPDATE `vcs_user` SET `use_point`= ?
                WHERE `use_id` = ?";
        $this->db->query($sql, array($this->use_point, $this->use_id));
    }

    /*
	* update_user
	* update user
	* @input data
	* @output -
	* @author Chutipon Thermsirisuksin 62160081 
	* @Create Date 2565-03-13
	*/
    public function update_user()
    {
        $sql = "UPDATE vcs_user
                SET use_name = ?, use_username = ?, use_password = ?, use_status = ?, use_point = ?
                WHERE use_id = ?";
        $this->db->query($sql, array($this->use_name, $this->use_username, $this->use_password, $this->use_status, $this->use_point, $this->use_id));
    }

    /*
    * delete_user
    * update use_status == 4
    * @input use_id
    * @output -
    * @author Acharaporn 62160344
    * @Create Date 2565-03-12
    */
    public function delete_user()
    {
        $sql = "DELETE FROM `vcs_user` 
				
        WHERE use_id=?";
        $this->db->query($sql, array($this->use_id));
    }
}
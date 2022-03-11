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
}

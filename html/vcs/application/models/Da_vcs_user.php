<?php
/*
* Da_vcs_user
* Manage user
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-06
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/VCS_model.php";
class Da_vcs_user extends VCS_model{
	
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
}
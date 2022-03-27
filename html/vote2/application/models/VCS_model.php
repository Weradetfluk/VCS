<?php
/*
* VCS_model
* Main Model CI 
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-06
*/
defined('BASEPATH') or exit('No direct script access allowed');

class VCS_model extends CI_Model
{
    public $db;
    public $db_name;
    /*
    * @author Suwapat Saowarod 62160340
    */
    public function __construct()
    {
        $this->db = $this->load->database('VCS', true);
        $this->db_name = $this->db->database;
    }

}
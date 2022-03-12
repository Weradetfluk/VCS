<?php
/*
* Da_vcs_choice_vote
* Manage choice vote
* @author Suwapat Saowarod 62160340
* @Create Date 2565-03-10
*/
defined('BASEPATH') or exit('No direct script access allowed');
include_once dirname(__FILE__) ."/VCS_model.php";
class Da_vcs_choice_vote extends VCS_model{
	
	public $cho_id;
	public $cho_name;
    public $cho_score;
    public $cho_vot_id;

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
        $sql = "DELETE `vcs_choice_vote` 
				WHERE cho_id=?";
        $this->db->query($sql, array($this->cho_id));
    }
}
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAdmin() {
		$query = $this->db->get('admin');
		return $query->result();
	}

	function assignRole($user_id, $user_type) //updates a user role based on their user ID
	{
		$OB=array('user_type'=>$user_type);
		
		$this->db->from('users')->Where('user_id', $user_id);
		$this->db->update('users', $OB);
		
	}

	function assignSWStat($user_id, $student_worker) //updates a user role based on their user ID
	{
		$OB=array('student_worker'=>$student_worker);

		$this->db->from('advisee')->Where('user_id', $user_id);
		$this->db->update('advisee', $OB);
	}

	function setHoldStat($user_id, $hold) //updates a user role based on their user ID
	{
		$OB=array('hold'=>$hold);
		
		$this->db->from('advisee')->Where('user_id', $user_id);
		$this->db->update('advisee', $OB);
		
	}

	}
?>
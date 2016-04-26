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

	function assignTo($user_id, $user_type) //updates a user role based on their user ID
	{
		$OB=array('user_type'=>$user_type);
		//$this->db->from('advisee');
		$this->db->from('users')->Where('user_id', $user_id);
		$this->db->update('users', $OB);
		
	}

	}
?>
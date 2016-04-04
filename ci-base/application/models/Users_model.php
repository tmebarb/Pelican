<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function login($username, $password)
	{
		$this->db->select('user_id, user_name, user_password, user_type, user_fullname');
		$this->db->limit(1);

		$this->db->from('users');
		$this->db->where('user_name', $username);
		$this->db->where('user_password', MD5($password));
		$query = $this->db->get();
		if($query->num_rows() == 1) 
			return $query->row();
		else
			return null;
	}

	function checkusername($username) {
		$this->db->limit(1);
		$this->db->from('users');
		$this->db->where('user_name', $username);

		$query = $this->db->get();
		if($query->num_rows() == 1) 
			return $query->row();
		else
			return null;
	}

	function checkemail($emaail) {
		$this->db->limit(1);
		$this->db->from('users');
		$this->db->where('user_email', $emaail);

		$query = $this->db->get();
		if($query->num_rows() == 1) 
			return $query->row();
		else
			return null;
	}

	function savesignup ($username, $password, $fullname, $user_type) {
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $fullname,
			'user_type'	=> $user_type
			);

		$this->db->insert('users', $data); 
	}

	function getallusers () { 
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result();
	}
}
?>
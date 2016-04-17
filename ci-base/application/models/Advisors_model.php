<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisors_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function change_Major($adviseeNewMajor, $advisee_id) {
		$OB=array('major'=>$adviseeNewMajor);
		$this->db->from('advisee')->where('student_id', $advisee_id);
		$this->db->update('advisee', $OB); 
		
	}


	function saveAdvisor($first_name, $last_name, $email, $pic, $password, $major, $dob)
	{
		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'pic'	=> $pic,
			'password' => $password,
			'major' => $major,
			'dob' => $dob
			);

		$this->advisors->insert('advisor', $data); 
	}

		function getAll() {
		$query = $this->db->get('advisors');
		return $query->result();
	}

		function fillDatabase()
		{
		$x=0;
		$username='90';
		$password='0291301293';
		$user_fullname='123232323';
		$user_type='advisee';
		while($x<5000){
			$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;
$this->db->insert('users', $data); 
			$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
			);
			$this->db->insert('users', $data); 
			$username++;
			$password++;
			$user_fullname++;
			$x++;

		
		$this->db->insert('users', $data); 
	}

	

}}
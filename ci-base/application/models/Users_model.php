<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function login($username, $password)
	{
		$this->db->select('user_name, user_password, user_id, user_type, user_id, user_fullname');
		$this->db->limit(1);

		$this->db->from('users');
		$this->db->where('user_name', $username);
		$this->db->where('user_password', MD5($password));
				
		$query = $this->db->get();
		$rowA=$query->row_array();
		if($query->num_rows() == 1) //verifies only 1 user has the corresponding username + password pair
		{
			if(element('user_type', $rowA)=='advisor')
			{
			$sql='SELECT advisor_id FROM users join advisor ON users.user_id=advisor.user_id WHERE users.user_id=?'; //query adds advisor ID to user data array before returning
			$findAdvID=$this->db->query($sql, array(element('user_id', $rowA))); 
			$rowB=$findAdvID->row_array();
			return array_merge($rowA, $rowB);
			}
			else if(element('user_type', $rowA)=='advisee')
			{
			$sql='SELECT student_id, advisor_id FROM users join advisee ON users.user_id=advisee.user_id WHERE users.user_id=?'; //query adds student ID to user data array before returning
			$findAdvID=$this->db->query($sql, array(element('user_id', $rowA))); 
			$rowB=$findAdvID->row_array();
			return array_merge($rowA, $rowB);
			}
			return($rowA);
		}
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

	function savesignup ($username, $password, $fullname, $user_type, $CWID, $email) {
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $fullname,
			'user_type'	=> $user_type,
			'CWID' => $CWID,
			'user_email' => $email
			);
		
		$this->db->insert('users', $data); 
		if($user_type=='advisee')  //these if block checks the role assigned to the current user and adds th
		{		 					//their user_id to the appropriate role table for use with linking and sorting
			
			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('user_name', $username);
			$adviseeUID=$this->db->get()->row()->user_id;
			$advisee_Data= array(
				'user_id'=>$adviseeUID);
			$this->db->insert('advisee', $advisee_Data);
			}

		if($user_type=='advisor')
		{		 

			$this->db->select('user_id');
			$this->db->from('users');
			$this->db->where('user_name', $username);
			$advisorUID=$this->db->get()->row()->user_id;
			$advisor_Data= array(
				'user_id'=>$advisorUID);
			$this->db->insert('advisor', $advisor_Data);
			}
			unset($user_type,$username,$password,$fullname,$user_id);
	}

	function getallusers () { 
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result();
	}

	//Model to return the profile page for a user based on their type
	function profileInfo($user_id, $user_type)
	{
		if($user_type == 'advisor')
		{
			$this->db->select('user_fullname, CWID, user_name, user_email, user_phone, major, office_loc');
			$this->db->from('users, advisor');
			$this->db->where('users.user_id', $user_id);
			$this->db->where('users.user_id = advisor.user_id');

			$query = $this->db->get();
			return $query->result();
		}


		if($user_type == 'advisee')
		{
			$this->db->select('user_fullname, CWID, user_name, user_email, user_phone, major, classification');
			$this->db->from('users, advisee');
			$this->db->where('users.user_id', $user_id);
			$this->db->where('users.user_id = advisee.user_id');

			$query = $this->db->get();
			return $query->result();
		}

		

		else
		{
			$this->db->select('user_fullname, CWID, user_name, user_email, user_phone');
			$this->db->from('users');
			$this->db->where('user_id', $user_id);

			$query = $this->db->get();
			return $query->result();
		}
	}
}
?>
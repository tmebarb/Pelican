<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function login($username, $password)
	{
		$this->db->select('user_name, user_password, user_type, user_fullname, CWID, user_id');
		$this->db->limit(1);

		$this->db->from('users');
		$this->db->where('user_name', $username);
		$this->db->where('user_password', MD5($password));
				
		$query = $this->db->get();
		$rowA=$query->row_array();

		if($query->num_rows() == 1) //verifies only 1 user has the corresponding username + password pair
		{
			if(element('user_type', $rowA)=='advisee' || element('user_type', $rowA)=='student_worker')
			{
				$rowB= $this->db->select('advised_by')->from('users')->where('user_id',element('user_id', $rowA))->get()->row_array(); //query adds advisor's ID to user data array before returning
			
			return array_merge($rowA, $rowB);
			}

		return $rowA;
				
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
			return False;
		else
			return null;
	}

	function checkemail($emaail) {
		$this->db->limit(1);
		$this->db->from('users');
		$this->db->where('user_email', $emaail);

		$query = $this->db->get();
		if($query->num_rows() == 1) 
			return False;
		else
			return null;
	}

	function checkCWID($emaail) {
		$this->db->limit(1);
		$this->db->from('users');
		$this->db->where('CWID', $CWID);

		$query = $this->db->get();
		if($query->num_rows() == 1) 
			return False;
		else
			return null;
	}

	function savesignup ($username, $password, $fullname, $user_type, $email,$CWID, $user_phone) {
		$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $fullname,
			'user_type'	=> $user_type,
			'user_email' => $email,
			'user_phone' => $user_phone,
			'CWID' => $CWID
			);
		
		$this->db->insert('users', $data); 

		//for development only, ideally the "roles" would mostly be defined by an admin or match up with a CWID in the database
		if($user_type=='advisee')  //these if block checks the role assigned to the current user and adds
		{		 					//their CWID to the appropriate role table for use with linking and sorting
			$data= array(
				'CWID'=>$CWID);
			$this->db->insert('advisee', $data);
			return true;

		}

		if($user_type=='advisor')
		{		 
			$data= array(
				'CWID'=>$CWID);
			$this->db->insert('advisor', $data);
			return true;

		}
		return true;
			//unset($user_type,$username,$password,$fullname,$user_id);
		
	}

	function getallusers () { 
		$this->db->from('users');
		$query = $this->db->get();
		return $query->result();
	}

	//Model to return the profile page for a user based on their type
	function profileInfo($CWID, $user_type)
	{
		if($user_type == 'advisor')
		{
			$this->db->select('user_fullname, CWID, user_name, user_email, user_phone, major, office_loc');
			$this->db->from('users, advisor');
			$this->db->where('users.CWID', $CWID);
			$this->db->where('users.CWID = advisor.CWID');

			$query = $this->db->get();
			return $query->result();
		}


		if($user_type == 'advisee')
		{
			$this->db->select('user_fullname, CWID, user_name, user_email, user_phone, major, classification');
			$this->db->from('users, advisee');
			$this->db->where('users.CWID', $CWID);
			$this->db->where('users.CWID = advisee.CWID');

			$query = $this->db->get();
			return $query->result();
		}

		

		else
		{
			$this->db->select('user_fullname, CWID, user_name, user_email, user_phone');
			$this->db->from('users');
			$this->db->where('CWID', $CWID);

			$query = $this->db->get();
			return $query->result();
		}
	}
}
?>
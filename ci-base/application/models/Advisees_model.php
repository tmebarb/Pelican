<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisees_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAll() {
		$query = $this->db->get('advisees');
		return $query->result();
	}
	function getAllAdviseeDetails() {
		$this->db->select('u.user_id, u.user_fullname, u.CWID, a.classification, a.major');
		$this->db->from('users u');
		$this->db->join('advisee a', 'u.user_id = a.user_id', 'inner');

		$query = $this->db->get();
		return $query->result();
	}

	//Function that inserts the user fullname, user name, email, cwid, password, phone number, classification, and major for an advisee into the user and advisee table
	function saveAdvisee($user_fullname, $user_name, $email, $CWID, $password, $phone, $classification, $major)
    {
    	//An array of information to be inserted into the users table
        $user_data = array(
            'user_fullname' => $user_fullname,
            'user_name' => $user_name,
            'user_email' => $email,
            'CWID' => $CWID,
            'user_password' => $password,
            'user_phone' => $phone,
            'user_type' => 'advisee'
        );

        $this->db->insert('users', $user_data);

        //Gets the user id that was created alongside the insert into the users table
        $advisee_userid = $this->db->insert_id();

        //An array of information for the same user that will be inserted into the advisee table
        $advisee_data = array(
        	'classification' => $classification,
        	'major' => $major,
        	'user_id' => $advisee_userid
        	);
        $this->db->insert('advisee', $advisee_data);
    }
}
?>
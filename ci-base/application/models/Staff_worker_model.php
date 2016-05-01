<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_worker_model extends CI_Model
{

	function __construct()

	{
		parent::__construct();
		$this->load->helper('array');
	}

	function assignTo($advisor_id, $advisee_id) //matches an advisor to an advisee based on their ID
	{
		$OB=array('advised_by'=>$advisor_id);
		//$this->db->from('advisee');
		$this->db->from('users')->Where('CWID', $advisee_id);
		$this->db->update('users', $OB); 
		
	}

	function getAll() {
		$query = $this->db->get('users');
		return $query->result();
	}

	function showAllAdvisees() //calls database to get selected info from users table about all advisees that have currently been advised
	{
		$result= $this->db->query('SELECT a.user_fullname AS advisee_name, a.CWID, a.user_email, a.user_phone, c.major, c.classification, b.user_fullname AS advisor_name
			FROM users AS a, users AS b, advisee AS c
			WHERE a.advised_by = b.CWID
			AND c.CWID = a.CWID');

		//if($result->num_rows()>0)
			return $result;	
	}

	function getAllMajors() {
		$query = $this->db->get('majors');
		return $query->result();
	}


	function getAdvisorsByMajor($major) {
		$this->db->where('major', $major);
        $this->db->join('users', 'users.user_id = advisor.user_id');
		$query = $this->db->get('advisor');
		return $query->result();
	}
	function getAdviseeByAdvisor($advisor) {
		//$this->db->where('major', $major);
        //$this->db->join('advisee', '$advisor');
		$query = $this->db->get('advisee');
		return $query->result();
	}
	function  getAllAdvisee() {
		$this->db->select('u.user_fullname, u.CWID, a.classification, a.major');
		$this->db->from('users u');
		$this->db->join('advisee a', 'u.user_id = a.user_id', 'inner');
		$this->db->where('a.student_worker', 0);

		$query = $this->db->get();
		return $query->result();
	}

}
?>
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
		$this->db->select('u.user_fullname AS advisee_name, u.CWID, u.user_email, u.user_phone, a.major, a.classification, uA.user_fullname AS advisor_name');
		$this->db->from('users u, advisee a, users uA');
		$this->db->where('u.user_id = a.user_id');
		$this->db->where('uA.user_id = u.advised_by');

		$query = $this->db->get();
		return $query->result();	
	}

	function showAllAdvisors() //calls database to get selected info from users table about all advisors
	{
		$this->db->select('u.user_fullname, u.CWID, u.user_email, u.user_phone, a.major, a.office_loc, COUNT(uA.advised_by) AS numOfAdvisees');
		$this->db->from('users u, advisor a, users uA');
		$this->db->where('u.user_id = a.user_id');
		$this->db->where('u.user_id = uA.advised_by');
		$this->db->group_by("u.user_fullname"); 

		$query = $this->db->get();
		return $query->result();	
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
	function  getAllStudentWorkers() {
		$this->db->select('u.user_fullname AS advisee_name, u.CWID, u.user_email, u.user_phone, a.major, a.classification, uA.user_fullname AS advisor_name');
		$this->db->from('users u, advisee a, users uA');
		$this->db->where('u.user_id = a.user_id');
		$this->db->where('a.student_worker', 1);
		$this->db->where('uA.user_id = u.advised_by');

		$query = $this->db->get();
		return $query->result();
	}
    function  redeemAdvisee($id) {
        $data = array('student_worker'=>0);
        $this->db->where('user_id', $id);
        $this->db->update('advisee', $data);
    }
    function deleteAdvisee($id) {
        $this->db->delete('advisee', array('user_id' => $id));
        $this->db->delete('users', array('user_id' => $id));
    }
}
?>
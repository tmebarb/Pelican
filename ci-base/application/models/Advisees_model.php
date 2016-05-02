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
	function getAdvisorDetailsByAdviseeUserID($user_id) {
		$this->db->select('u.advised_by as advisor_id, u2.user_fullname as advisor_name');
		$this->db->from('users u, users u2');
		$this->db->where('u.user_id', $user_id);
		$this->db->where('u2.user_id = u.advised_by');
		//$this->db->join('advisor a', 'u.user_id = a.user_id', 'inner');

		$query = $this->db->get();
		return $query->row();
	}

    function getAdvisingSessionDetailsbyAdvisorUserID($user_id) {
        $this->db->select('s.startDate, s.endDate, s.type');
        $this->db->from('active_advising_sessions s, users u, advisor a');
        $this->db->where('u.user_id', $user_id);
        $this->db->where('u.user_id = a.user_id');
        $this->db->where('s.advisor_id = a.advisor_id');
        $query = $this->db->get();
        return $query->row();
    }
    function getSlotsByDateNDay($day, $date, $advisor_id) {
        $this->db->select('s.slot_id, s.start_time, s.end_time');
        $this->db->from('timeslots s, active_advising_sessions actv, advisor a, users u');
        $this->db->where('u.user_id', $advisor_id);
        $this->db->where('u.user_id = a.user_id');
        $this->db->where('actv.endDate >=', $date);
        $this->db->where('s.day', $day);
        $this->db->where('actv.startDate <=',   $date);
        $this->db->where('actv.advisor_id =a.advisor_id');
        $this->db->where('s.advisor_id =a.advisor_id');
        $query = $this->db->get();
        return $query->result();
    }
}
?>
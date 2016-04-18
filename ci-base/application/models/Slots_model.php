<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slots_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function addtimeslot($start, $end, $advisor_id, $student_id, $day, $is_repeating, $open)
	{
		$data = array(
			'start_time' => $start,
			'end_time' => $end,
			'advisor_id'	=> $advisor_id,
			'student_id' => $student_id,
			'day' => $day,
			'is_repeating' => $is_repeating,
			'open' => $open
			);

		$this->db->insert('timeslots', $data); 
	}
	function getslotsbyadvisor($advisor_id) {
		$this->db->where('advisor_id', $advisor_id);
		$query = $this->db->get('timeslots');
		return $query->result();
	}


}
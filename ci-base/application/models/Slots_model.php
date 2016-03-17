<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Slots_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function addtimeslot($title, $start, $end, $advisor_id, $student_id, $day, $is_repeating, $type)
	{
		$data = array(
			'title' => $title,
			'start' => $start,
			'end' => $end,
			'advisor_id'	=> $advisor_id,
			'student_id' => $student_id,
			'day' => $day,
			'is_repeating' => $is_repeating,
			'type' => $type
			);

		$this->db->insert('slots', $data); 
	}
	function getslotsbyadvisor($advisor_id) {
		$this->db->where('advisor_id', $advisor_id);
		$query = $this->db->get();
		return $query->result();
	}

}
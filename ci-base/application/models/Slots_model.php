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
				'advisee_id' => $student_id,
				'day' => $day,
				'is_repeating' => $is_repeating,
				'open' => $open
		);

		$this->db->insert('timeslots', $data);
	}

	function addtimeslot2($start, $end, $advisor_id, $student_id, $date)
	{
		$data = array(
				'start_time' => $start,
				'end_time' => $end,
				'advisor_id'	=> $advisor_id,
				'advisee_id' => $student_id,
				'date' => $date
		);

		$this->db->insert('timeslots', $data);
	}

	function updatetimeslot($slot_id, $start, $end, $advisor_id, $student_id, $day, $is_repeating, $open)
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
		$this->db->where('slot_id', $slot_id);
		$this->db->update('timeslots', $data); 
	}
	function getslotsbyadvisor($advisor_id) {
		$this->db->where('advisor_id', $advisor_id);
		$query = $this->db->get('timeslots');
		return $query->result();
	}

	function removeTimeSlot($slot_id) {
		$this->db->where('slot_id', $slot_id);
		$this->db->delete('timeslots');
	}


}
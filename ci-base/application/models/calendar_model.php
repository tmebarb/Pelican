<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Calendar_model extends CI_Model
{
	function generate_calendar($year, $month)
	{
		$this->load->helper('url');
		$this->load->helper('array');
		
		$prefs = array (
               'show_next_prev' => TRUE ,
               'next_prev_url' => 	'http://localhost:8181/Pelican/ci-base/My_calendar/showcal'
             );

		
		$events = $this->get_events($year, $month);
		$this->load->library('calendar', $prefs);
		return $this->calendar->generate($year, $month, $events);
	}

	function get_events($year, $month){
		$events = array();
		$query = $this->db->select('date,event')->from ('calendar')-> like('date',"$year-$month")-> where('advisor_id', $this->session->userdata('advisor_id'))-> get();
		$query=$query->result();
		foreach ($query as $row) {
			
			$day = (int)substr($row->date, 8,2);
			$events[(int)$day] = $row->event;
			
		}
		return $events;
	}

	function add_events($date, $event){

	
			$query = $this->db->get_where('calendar', array('date'=>$date));
			if($query->num_rows() > 0){
				$this->db->where('date',$date);
				$this->db->update('calendar',array('event'=>$event));
			}else {
				$this->db->insert('calendar', array('date' => $date, 'event' => $event));
					}
						}
}
<?php
if(!defined('BASEPATH'))
	exit('No direce script access allowed');

class Mycal_model extends CI_Model {
	function generate_calendar($year, $month){

	$pref = array(
				'show_next_prev'=>'TRUE', //need help with this! Time 6:39 in youtube video
				'next_prev_url'=>base_url().'My_calendar/showcal'
			);
			$events = array(
				(int)'01'=>'rent',
				'10'=>'pay bills',
				'25'=>'trip to cali',
				);
			

			$this->load->library('calendar', $pref);
			return $this->calendar->generate($year, $month);
	}
}
?>
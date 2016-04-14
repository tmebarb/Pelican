<?php
	class My_calendar extends CI_Controller {

		function showcal() {
			echo " my calendar project";
			$this->load->library('calendar');
			echo $this->calendar->generate();
		}
	}
?>
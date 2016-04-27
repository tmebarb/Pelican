<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Advisor extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
			$this->load->model('Advisees_model');
			$this->load->model('Advisors_model');
			$this->load->model('Slots_model');
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->library('breadcrumbs');
			if(!$this->session->userdata('id')) {
				$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
				redirect('login');
			}
		}


		function timeslots() {
		   	$this->breadcrumbs->push('Advisor', '/advisor');
			$this->breadcrumbs->push('Time Slot Settings', 'timeslots');
			$this->breadcrumbs->unshift('Home', '/');
			//$sessiondetails = -1;

			//$data = array('allusers' => $this->Users_model->getallusers(), 'view'=> 'student/selectappointment');
			$advisor = $this->Advisors_model->getAdvisorByUserId($this->session->userdata('user_id'));
			$sessiondetails = $this->Advisors_model->getActiveAdvisingSessions($advisor->advisor_id);
			$allSlots = $this->Slots_model->getslotsbyadvisor($advisor->advisor_id);
			
			$mondayStartSlots = array();
			$mondayEndSlots = array();
			$mondayUpdateID = array();

			$tuesdayStartSlots = array();
			$tuesdayEndSlots = array();
			$tuesdayUpdateID = array();

			$WednesdayStartSlots = array();
			$WednesdayEndSlots = array();
			$WednesdayUpdateID = array();

			$thrdayStartSlots = array();
			$thrdayEndSlots = array();
			$thrdayUpdateID = array();

			$fridayStartSlots = array();
			$fridayEndSlots = array();
			$firdayUpdateID = array();

			foreach ($allSlots as $slot) {
				if ($slot->day == 'monday') {
					array_push($mondayStartSlots, $slot->start_time);
					array_push($mondayEndSlots, $slot->end_time);
					array_push($mondayUpdateID, $slot->slot_id);
				} else if ($slot->day == 'tuesday') {
					array_push($tuesdayStartSlots, $slot->start_time);
					array_push($tuesdayEndSlots, $slot->end_time);
					array_push($tuesdayUpdateID, $slot->slot_id);
				} else if ($slot->day == 'wednesday') {
					array_push($WednesdayStartSlots, $slot->start_time);
					array_push($WednesdayEndSlots, $slot->end_time);
					array_push($WednesdayUpdateID, $slot->slot_id);
				} else if ($slot->day == 'thrday') {
					array_push($thrdayStartSlots, $slot->start_time);
					array_push($thrdayEndSlots, $slot->end_time);
					array_push($thrdayUpdateID, $slot->slot_id);
				} else if ($slot->day == 'friday') {
					array_push($fridayStartSlots, $slot->start_time);
					array_push($fridayEndSlots, $slot->end_time);
					array_push($firdayUpdateID, $slot->slot_id);
				}
			}
			
			//echo ($advisor==null);
			//if($sessiondetails!=null) {
			//	$session_id = $sessiondetails->session_id;
				//echo $session_id;
			//}
			
			$data = array('view' => 'advisor/timeslots',
						  'sessiondetails' => $sessiondetails,
							'mondayStartSlots' => $mondayStartSlots,
							'mondayEndSlots' => $mondayEndSlots,
							'mondayUpdateID' => $mondayUpdateID,
							'tuesdayStartSlots' => $tuesdayStartSlots,
							'tuesdayEndSlots' => $tuesdayEndSlots,
							'tuesdayUpdateID' => $tuesdayUpdateID,
							'WednesdayStartSlots' => $WednesdayStartSlots,
							'WednesdayEndSlots' => $WednesdayEndSlots,
							'WednesdayUpdateID' => $WednesdayUpdateID,
							'thrdayStartSlots' => $thrdayStartSlots,
							'thrdayEndSlots' => $thrdayEndSlots,
							'thrdayUpdateID' => $thrdayUpdateID,
							'fridayStartSlots' => $fridayStartSlots,
							'fridayEndSlots' => $fridayEndSlots,
							'firdayUpdateID' => $firdayUpdateID
							);
			

			$this->load->view('admin', $data);
		}


		function updatetimeslots() {
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$session_id = $this->input->post('session_id');
			$advisor = $this->Advisors_model->getAdvisorByUserId($this->session->userdata('user_id'));
			$advisor_id = $advisor->advisor_id;
			$mondayUpdateID = $this->input->post('mondayUpdateID');
			$tuesdayUpdateID = $this->input->post('tuesdayUpdateID');
			$WednesdayUpdateID = $this->input->post("WednesdayUpdateID");
			$thrdayUpdateID = $this->input->post('thrdayUpdateID');
			$firdayUpdateID = $this->input->post('firdayUpdateID');
			$mondaystart = $this->input->post('mondaystart');
			$mondayend = $this->input->post('mondayend');
			$allSlots = $this->Slots_model->getslotsbyadvisor($advisor->advisor_id);

			foreach ($allSlots as $slot) {
				if ((($mondayUpdateID) ? !in_array($slot->slot_id, $mondayUpdateID) : true)  && (($tuesdayUpdateID) ? !in_array($slot->slot_id, $tuesdayUpdateID) : true) && (($WednesdayUpdateID) ? !in_array($slot->slot_id, $WednesdayUpdateID) : true)   && (($thrdayUpdateID) ? !in_array($slot->slot_id, $thrdayUpdateID) : true)  &&  (($firdayUpdateID) ? !in_array($slot->slot_id, $firdayUpdateID) : true)      ) {
					$this->Slots_model->removeTimeSlot($slot->slot_id);
				} 
			}	

			foreach ($mondaystart as $index => $slot) {
				if ((!$mondayUpdateID) ? false : array_key_exists($index, $mondayUpdateID)) {
						$this->Slots_model->updatetimeslot($mondayUpdateID[$index], $slot, $mondayend[$index], $advisor_id, "", 'monday', 1, 1);
				} else {
					if ($slot && $mondayend[$index]) {
						$this->Slots_model->addtimeslot($slot, $mondayend[$index], $advisor_id, "", 'monday', 1, 1);
					}
				}
			}
			$tuestart = $this->input->post('tuestart');
			$tueend = $this->input->post('tueend');
			foreach ($tuestart as $index => $slot) {
				if ((!$tuesdayUpdateID) ? false : array_key_exists($index, $tuesdayUpdateID)) {
						$this->Slots_model->updatetimeslot($tuesdayUpdateID[$index], $slot, $tueend[$index], $advisor_id, "", 'tuesday', 1, 1);
				} else {
					if ($slot && $tueend[$index]) {
						$this->Slots_model->addtimeslot($slot, $tueend[$index], $advisor_id, "", 'tuesday', 1, 1);
					}
				}
			}

			
			$wedstart = $this->input->post('wedstart');
			$wedend = $this->input->post('wedend');
			foreach ($wedstart as $index => $slot) {
				if ((!$WednesdayUpdateID) ? false : array_key_exists($index, $WednesdayUpdateID) ) {
						$this->Slots_model->updatetimeslot($WednesdayUpdateID[$index], $slot, $wedend[$index], $advisor_id, "", 'wednesday', 1, 1);
				} else {
					if ($slot && $wedend[$index]) {
						$this->Slots_model->addtimeslot($slot, $wedend[$index], $advisor_id, "", 'wednesday', 1, 1);
					}
				}
			}
			
			$thrstart = $this->input->post('thrstart');
			$thrend = $this->input->post('thrend');
			foreach ($thrstart as $index => $slot) {
				if ((!$thrdayUpdateID) ? false : array_key_exists($index, $thrdayUpdateID) ) {
						$this->Slots_model->updatetimeslot($thrdayUpdateID[$index], $slot, $thrend[$index], $advisor_id, "", 'thrday', 1, 1);
				} else {
					if ($slot && $thrend[$index]) {
						$this->Slots_model->addtimeslot($slot, $thrend[$index], $advisor_id, "", 'thrday', 1, 1);
					}
				}
			}
			
			$fristart = $this->input->post('fristart');
			$friend = $this->input->post('friend');
			foreach ($fristart as $index => $slot) {
				if ((!$firdayUpdateID) ? false : array_key_exists($index, $firdayUpdateID) ) {
						$this->Slots_model->updatetimeslot($firdayUpdateID[$index], $slot, $friend[$index], $advisor_id, "", 'friday', 1, 1);
				} else {
					if ($slot && $friend[$index]) {
						$this->Slots_model->addtimeslot($slot, $friend[$index], $advisor_id, "", 'friday', 1, 1);
					}
				}
			}

			

			if(!$session_id)
				$this->Advisors_model->startSession($startdate, $enddate, $advisor);
			else
				$this->Advisors_model->udpateSession($session_id, $startdate, $enddate, $advisor);

			$this->session->set_flashdata('success_msg', 'Timeslot details have been updated!<br/><br/>');
		  	redirect('advisor/timeslots');
		}

		function funTimeSlots()
		{
				$date= $this->input->post('date');
			$adviseeID= $this->input->post('adviseeID');
			$data = array('view' => 'fun_Time_Slots',
							'date' => $date,
							'student_id' => $adviseeID
							);
			
			$this->Staff_worker_model->assignTo($advisorID, $adviseeID);
			$this->load->view('admin', $data);
		}

		function profilePage(){
			
		}

		//Opens the form for an Advisor to change a student's major
		function initChangeMajor()
		{

			$data = array('view' => 'advisor/ChangeMajorForm');
			$this->load->view('admin', $data);
		}

		//Function that takes input specifying an Advisee's new major and the Advisee's id and sends it to the change_major function
		function changeMajor()
		{
			$newMajor= $this->input->post('adviseeNewMajor');
			$adviseeID= $this->input->post('adviseeID');
			$data = array('view' => 'advisor/changeMajorSuccess',
							'adviseeNewMajor' => $newMajor,
							'student_id' => $adviseeID
							);
			
			$this->Advisors_model->change_Major($newMajor, $adviseeID);
			$this->load->view('admin', $data);

		}

		//Function that lists all the advisees of an advisor based on the advisor's CWID
		function listAdvisees()
		{

				$advisorID = $this->session->userdata('id');
				//print_r($advisorID==null);
				// return;
				$data = array('view' => 'listAdvisorsAdvisees',
								'advisees' => $this->Advisors_model->list_Advisees($advisorID));
				// print_r($data);
				// return;

				$this->load->view('admin', $data);
		}

		function initChangeOffice()
		{
			$data = array('view' => 'advisor/ChangeOfficeForm');
			$this->load->view('admin', $data);
		}

		//Uses an advisor's user_id to link to advisor table and change the advisor's office location
		function changeOffice()
		{
			$office = $this->input->post('advisorOffice');			
			$advisorID = $this->session->userdata('user_id');
			$data = array('view' => 'advisor/changeOfficeSuccess', 'newOffice' => $office, 'officeInfo' => $this->Advisors_model->change_Office($office, $advisorID));			
			$this->load->view('admin', $data);
		}

	}

?>

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
			$advisor = $this->Advisors_model->getAdvisorByUserId($this->session->userdata('id'));
			$sessiondetails = $this->Advisors_model->getActiveAdvisingSessions($advisor->advisor_id);
			//echo ($advisor==null);
			//if($sessiondetails!=null) {
			//	$session_id = $sessiondetails->session_id;
				//echo $session_id;
			//}
			
			$data = array('view' => 'advisor/timeslots',
						  'sessiondetails' => $sessiondetails);


			$this->load->view('admin', $data);
		}


		function updatetimeslots() {
			$startdate = $this->input->post('startdate');
			$enddate = $this->input->post('enddate');
			$session_id = $this->input->post('session_id');
			$advisor_id = $this->Advisors_model->getAdvisorByUserId($this->session->userdata('id'))->advisor_id;
			
			$mondaystart = $this->input->post('mondaystart');
			$mondayend = $this->input->post('mondayend');
			
			$tuestart = $this->input->post('tuestart');
			$tueend = $this->input->post('tueend');
			
			$wedstart = $this->input->post('wedstart');
			$wedend = $this->input->post('wedend');
			
			$thrstart = $this->input->post('thrstart');
			$thrend = $this->input->post('thrend');
			
			$fristart = $this->input->post('fristart');
			$friend = $this->input->post('friend');

			$advisor = $this->Advisors_model->getAdvisorByUserId($this->session->userdata('id'));

		//	$allSlots = $this->Slots_model->addtimeslot("1:30am", "2:00pm", $advisor->advisor_id, "", "monday", 1, 1);
			$allSlots = $this->Slots_model->getslotsbyadvisor($advisor->advisor_id);

			print_r($allSlots);


			if(!$session_id)
				$this->Advisors_model->startSession($startdate, $enddate, $advisor_id);
			else
				$this->Advisors_model->udpateSession($session_id, $startdate, $enddate, $advisor_id);

			$this->session->set_flashdata('success_msg', 'Timeslot details have been updated!<br/><br/>');
//		   	redirect('advisor/timeslots');
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

		function initChangeMajor()
		{

			$data = array('view' => 'ChangeMajorForm');
			$this->load->view('admin', $data);
		}

		function changeMajor()
		{
			$newMajor= $this->input->post('adviseeNewMajor');
			$adviseeID= $this->input->post('adviseeID');
			$data = array('view' => 'changeMajorSuccess',
							'adviseeNewMajor' => $newMajor,
							'student_id' => $adviseeID
							);
			
			$this->Advisors_model->change_Major($newMajor, $adviseeID);
			$this->load->view('admin', $data);

		}

	}

?>

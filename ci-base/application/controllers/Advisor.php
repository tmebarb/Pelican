<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Advisor extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
			$this->load->model('Advisees_model');
			$this->load->model('Advisors_model');
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

			//$data = array('allusers' => $this->Users_model->getallusers(), 'view'=> 'student/selectappointment');
			$data = array('view' => 'advisor/timeslots');
			$this->load->view('admin', $data);
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

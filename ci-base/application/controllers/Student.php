<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Student extends CI_Controller {

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


		function selectappointment() {
		   	$this->breadcrumbs->push('Student', '/student');
			$this->breadcrumbs->push('Select Appointment', 'selectappointment');
			$this->breadcrumbs->unshift('Home', '/');

			$data = array('allusers' => $this->Users_model->getallusers(), 'view'=> 'student/selectappointment');

			$this->load->view('admin', $data);
		}

	}

?>

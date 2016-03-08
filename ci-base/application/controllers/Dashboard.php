<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
			$this->load->model('Advisees_model');
			$this->load->model('Advisors_model');
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->helper('url');
			
			if(!$this->session->userdata('id')) {
				$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
				redirect('login');
			}
		}

		function index() {
			$data = array('allusers' => $this->Users_model->getallusers(), 'view'=> 'admin-template/dashboard');

			$this->load->view('admin', $data);
		}

		function db() {
			$data = array('alladvisees' => $this->Advisees_model->getAll(), 'view'=> 'admin-template/db');

			$this->load->view('admin', $data);
		}

		function addadvisor() {
			$data = array('view'=> 'admin-template/add-advisor');

			$this->load->view('admin', $data);
		}

		function saveadvisor() {
		    $this->form_validation->set_rules('first_name', '<b>First Name</b>', 'trim|required');
		    $this->form_validation->set_rules('last_name', '<b>Last Name</b>', 'trim|required');
		    $this->form_validation->set_rules('email5', '<b>Email</b>', 'trim|required|valid_email');
		    $this->form_validation->set_rules('path', '<b>Photo</b>', 'trim|required');
		    $this->form_validation->set_rules('password', '<b>Password</b>', 'trim|required');
		    $this->form_validation->set_rules('repassword', '<b>Confirm Password</b>', 'trim|required');
		    $this->form_validation->set_rules('major', '<b>Major</b>', 'trim|required');
		    $this->form_validation->set_rules('dob', '<b>Date of Birth</b>', 'trim|required');
		    if($this->form_validation->run() == FALSE) {
				$data = array('view'=> 'admin-template/add-advisor');

				$this->load->view('admin', $data);
		   	} else {
		   		$first_name = $this->input->post('first_name');
		   		$last_name = $this->input->post('last_name');
		   		$email = $this->input->post('email5');
		   		$path = $this->input->post('path');
		   		$password = $this->input->post('password');
		   		$major = $this->input->post('major');
		   		$dob = $this->input->post('dob');
		   		if ($this->Users_model->checkemail($email)) {
		   			$this->session->set_flashdata('error_msg', 'Email Already Exists! <br/><br/>');
		   			redirect('dashboard/addadvisor');
		   		}
		   			$this->Advisors_model->saveAdvisor($first_name, $last_name, $email, $path, $password, $major, $dob);
		   			$this->session->set_flashdata('success_msg', 'Advisor details saved!<br/><br/>');
		   			redirect('dashboard/addadvisor');
		   	}
		}

		function calender() {
			$userType = $this->session->userdata('usertype');
			$data = array('view'=> 'calender');

			$this->load->view('admin', $data);
		}

	}

?>

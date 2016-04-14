<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends CI_Controller { 

		function __construct() {
			parent::__construct();
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->model('Users_model');
			$this->load->helper('array');
		}

		function index() {
			if($this->session->userdata('id'))
	   			redirect('dashboard');
			$this->load->view('page-login');
		}

		function logout() {
			$this->session->unset_userdata('id');
			$this->session->unset_userdata('user_type');
   			$this->session->set_flashdata('success_msg', 'You Logged out. <br/>');
	   		redirect('login');
		}


		public function verify()
		{

		    $this->form_validation->set_rules('username', '<i>Username</i>', 'trim|required');
		    $this->form_validation->set_rules('password', '<i>Password</i>', 'trim|required');
			$array=array();
		 	if($this->form_validation->run() == FALSE) {
		    	$this->load->view('page-login');
		   	} else {
		   		$username = $this->input->post('username');
		   		$password = $this->input->post('password');

		   		if ($array = $this->Users_model->login($username, $password)) { //verifies the user is already registered
		   		{
		   			$role=element('user_type', $array);
			   		if($role = 'advisor')  //if regiestered user is labeled as advisor, gets userdata based on advisor
			   		{
				   		$this->session->set_userdata('username', $username);
				   		$this->session->set_userdata('id', element('user_id', $array));
				   		$this->session->set_userdata('password', $password);
				   		$this->session->set_userdata('user_type', element('user_type', $array));
				   		$this->session->set_userdata('user_fullname', element('user_fullname', $array));
				   		$this->session->set_userdata('advisor_id', element('advisor_id', $array));
			   		}
			   		else if($role = 'advisee')// works like the above if, but with advisee instead
			   		{
				   		$this->session->set_userdata('username', $username);
				   		$this->session->set_userdata('id', element('user_id', $array));
				   		$this->session->set_userdata('password', $password);
				   		$this->session->set_userdata('user_type', element('user_type', $array));
				   		$this->session->set_userdata('user_fullname', element('user_fullname', $array));
				   		$this->session->set_userdata('student_id', element('student_id', $array));
				   		$this->session->set_userdata('advisor_id'), element('advisor_id', $array));
			   		}
			   	}

	   				redirect('dashboard');
		   		} else { //if username/password combo not in database, login fails
		   			$this->session->set_flashdata('error_msg', 'Invalid Username/Password! <br/><br/>');
		   			redirect('login');
		   		}

		   	}
		   	 }

		

		public function signup() {
			$this->load->view('signup');
		}

		public function savesignup() {
		    $this->form_validation->set_rules('username', '<i>Username</i>', 'trim|required');
		    $this->form_validation->set_rules('password', '<i>Password</i>', 'trim|required');
			
			if($this->form_validation->run() == FALSE) {
		    	$this->load->view('signup');
		   	}
		   	else {
		   		$username = $this->input->post('username');
		   		$password = $this->input->post('password');
		   		$fullname = $this->input->post('fullname');
		   		$user_type = $this->input->post('user_type');
		   		if ($this->Users_model->checkusername($username)) {
		   			$this->session->set_flashdata('error_msg', 'Username Already Exists! <br/><br/>');
		   			redirect('login/signup');
		   		}
		   		$this->Users_model->savesignup($username, md5($password), $fullname, $user_type);
		   			$this->session->set_flashdata('success_msg', 'User created! You may login. <br/><br/>');
		   			redirect('login');
		   	}

		}
	}

?>

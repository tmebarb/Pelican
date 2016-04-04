<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Login extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->model('Users_model');
		}

		function index() {
			if($this->session->userdata('id'))
	   			redirect('dashboard');
			$this->load->view('page-login');
		}

		function logout() {
			$this->session->unset_userdata('id');
   			$this->session->set_flashdata('success_msg', 'You Logged out. <br/>');
	   		redirect('login');
		}

		public function verify()
		{

		    $this->form_validation->set_rules('username', '<i>Username</i>', 'trim|required');
		    $this->form_validation->set_rules('password', '<i>Password</i>', 'trim|required');

		 	if($this->form_validation->run() == FALSE) {
		    	$this->load->view('page-login');
		   	} else {
		   		$username = $this->input->post('username');
		   		$password = $this->input->post('password');

		   		if ($data = $this->Users_model->login($username, $password)) {
			   		
			   		$this->session->set_userdata('username', $username);
			   		$this->session->set_userdata('id', $data->user_id);
			   		$this->session->set_userdata('password', $password);
			   		$this->session->set_userdata('user_type', $data->user_type);
			   		$this->session->set_userdata('user_fullname', $data->user_fullname);

	   				
	   				redirect('dashboard');
		   		} else {
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
		   		$role = $this->input->post('user_type');
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

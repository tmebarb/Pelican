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
			$this->session->unset_userdata('password');
			$this->session->unset_userdata('user_fullname');
			$this->session->unset_userdata('');
   			$this->session->set_flashdata('success_msg', 'You Logged out. <br/>');
	   		redirect('login');
		}

		public function password_con($str)
			{
				if ($str == 'test')
				{
					$this->form_validation->set_message('username_check', 'The %s field can not be the word "test"');
					return FALSE;
				}
				else
				{
					return TRUE;
				}
			}
		public function verify()
		{

		    $this->form_validation->set_rules('username', '<i>Username</i>', 'trim|required');
		    $this->form_validation->set_rules('password', '<i>Password</i>', 'trim|required');
		    

			$array=array();
		 	if($this->form_validation->run() == FALSE) {
		    	$this->load->view('page-login');
		   	} 

		   	else {
		   		$username = $this->input->post('username');
		   		$password = $this->input->post('password');

		   		if ($array = $this->Users_model->login($username, $password)) { //verifies the user is already registered
		   		{
		   			$role=element('user_type', $array);
			   		
			   		if($role = 'advisee' || $role = 'student_worker')// works like the above if, but with advisee instead
			   		{
				   		$this->session->set_userdata('username', $username);
				   		$this->session->set_userdata('id', element('CWID', $array));
				   		$this->session->set_userdata('password', $password);
				   		$this->session->set_userdata('user_type', element('user_type', $array));
				   		$this->session->set_userdata('user_fullname', element('user_fullname', $array));
				   		$this->session->set_userdata('advisor_id', element('advised_by', $array));
				   		
			   		}
			   		else
			   		{
			   			$this->session->set_userdata('username', $username);
				   		$this->session->set_userdata('id', element('CWID', $array));
				   		$this->session->set_userdata('password', $password);
				   		$this->session->set_userdata('user_type', element('user_type', $array));
				   		$this->session->set_userdata('user_fullname', element('user_fullname', $array));
				   	}
			   		
			   		}
			   		redirect('dashboard');
			   	}

	   				
		   		 else { //if username/password combo not in database, login fails
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
		    $this->form_validation->set_rules('user_email', '<i>user_email</i>', 'trim|required');
		    $this->form_validation->set_rules('con_password', '<i>con_pass</i>', 'trim|required|matches[password]');
		    $this->form_validation->set_rules('CWID', '<i>CWID</i>', 'trim|required');
		    $this->form_validation->set_rules('fullname', '<i>fullname</i>', 'required');
			
			if($this->form_validation->run() == FALSE) {
		    	$this->load->view('signup');
		   	}
		   	else {

		   		$username = $this->input->post('username');
		   		$password = $this->input->post('password');
		   		$fullname = $this->input->post('fullname');
		   		$user_type = $this->input->post('user_type');
		   		$email=$this->input->post('user_email');
		  		$CWID = $this->input->post('CWID');
		  		$user_phone = $this->input->post('user_phone');
		  		
		  		
		   		if($this->Users_model->savesignup($fullname, $username, $CWID, md5($password), $email, $user_type))
		   		{
		   			$this->session->set_flashdata('success_msg', 'User created! You may login. <br/><br/>');
		   			redirect('login');
		   		}
		  		}
		   		/*if ($this->Users_model->checkusername($username)) {
		   					$this->session->set_flashdata('error_msg', 'Username Already Exists! <br/><br/>');
		   			redirect('login/signup');
		   		}

		   		if ($this->Users_model->checkemail($email)) {
		   			$this->session->set_flashdata('error_msg', 'A user with that email Already Exists! Please try again <br/><br/>');
		   			redirect('login/signup');

		   		if ($this->Users_model->checkCWID($CWID)) {
		   			$this->session->set_flashdata('error_msg', 'A user with that CWID Already Exists! Please try again <br/><br/>');
		   			redirect('login/signup');
		   		}*/
		   		
		   	}

		}
	
	?>
	


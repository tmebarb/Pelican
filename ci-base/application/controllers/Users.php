<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Users extends CI_Controller 
	{
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
		//Functions to change a users' phone number
		function initChangePhone()
		{
			$data = array('view' => 'changePhoneForm');
			$this->load->view('admin', $data);
		}
		function initChangePassword()
		{
			$data = array('view' => 'changePasswordForm');
			$this->load->view('admin', $data);
		}
		function changePhone()
		{
			$userID = $this->session->userdata('user_id');
			$newPhone = $this->input->post('new_number');
			$data = array('view' => 'changePhoneSuccess', 'new_phone' => $newPhone,
							'newPhone' => $this->Users_model->change_Number($userID, $newPhone));
			$this->load->view('admin', $data);
		}
		function changePassword()
		{
			$userID = $this->session->userdata('user_id');
			$newPassword = $this->input->post('new_password');
			$data = array('view' => 'changePasswordSuccess', 'new_password' => $newPassword,
							'newPassword' => $this->Users_model->change_Password($userID, $newPassword));
			$this->load->view('admin', $data);

		   	$conPassword = $this->input->post('con_password');
		   		
		   	$this->Users_model->change_Password($userID, md5($newPassword));
		}

		function listAll()
		{
			$data = array('view' => 'listAllUsers', 
							'users' => $this->Users_model->getallusers());

			$this->load->view('admin', $data);
		}

	}

?>

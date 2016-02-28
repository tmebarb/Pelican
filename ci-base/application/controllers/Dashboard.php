<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Dashboard extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
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
			$data = array('allusers' => $this->Users_model->getallusers(), 'view'=> 'admin-template/db');

			$this->load->view('admin', $data);
		}

	}

?>

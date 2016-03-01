<?php 

	class Dashboard extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
			$this->load->model('Advisees_model');
			$this->load->model('Apts_model');
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
			$data = array('students' => $this->Advisees_model->getAll(), 'view'=> 'admin-template/db');

			$this->load->view('admin', $data);
		}

		function calender()
		{
		    $result=$this->Apts_model->getAll();
		    $data = array('info' => $result, );
		    echo json_encode($data);

		}

		function testCall() {
			$this->load->view('admin-template/test');
		}

		function savedate() {
			$tst = $this->input->get('asdf');

			$data = array('title' => $tst);
			echo json_encode($data);
		}
	}
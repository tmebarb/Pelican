<?php

class test extends CI_Controller {

function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
			$this->load->model('Advisees_model');
			$this->load->helper('url');

function index() {
			$data = array('allusers' => $this->Users_model->getallusers(), 'view'=> 'admin-template/dashboard');

			$dataa = array('alladvisees' => $this->Advisees_model->getAll(), 'view'=> 'admin-template/db');

			$this->load->view('admin', $data);
		}
	}

}
?>
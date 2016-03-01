<?php 

	class testView extends CI_Controller {

		function __construct() {
			parent::__construct();
			$this->load->model('Advisees_model');
			$this->load->helper('url');
			
			if(!$this->session->userdata('id')) {
				$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
				redirect('login');
			}
		}

			function db() {
			$data = array('alladvisees' => $this->Advisees_model->getAll(), 'view'=> 'admin-template/db');

			$this->load->view('admin', $data);
		}
}
?>
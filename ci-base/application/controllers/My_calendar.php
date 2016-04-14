<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class My_calendar extends CI_Controller
{
function __construct() {
			parent::__construct();
			$this->load->model('Users_model');
			$this->load->model('Advisees_model');
			$this->load->model('Advisors_model');
			//$this->load->model('Staff_worker_model');
			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->helper('url');
			$this->load->helper('array');
			$this->load->library('breadcrumbs');
			if(!$this->session->userdata('id')) {
				$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
				redirect('login');
			}
		}
	function showcal (){
		$this->load->helper('url');
		$prefs = array (
               'month_type'   => 'long',
               'day_type'     => 'short',
               'show_next_prev' => TRUE ,
               
             );

$this->load->library('calendar', $prefs);

echo $this->calendar->generate();

	}
}
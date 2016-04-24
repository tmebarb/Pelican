
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class Staff_member extends CI_Controller {

		function __construct() {
			parent::__construct();
			
			$this->load->model('Staff_worker_model');
			
			$this->load->helper(array('form'));
			
			$this->load->library('breadcrumbs');
			if(!$this->session->userdata('id')) {
				$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
				redirect('login');
			}
		}

function ListAdvisees(){
	$advisees=$this->Staff_worker_model->showAllAdvisees();
	$data = array('view' => 'listAdvisorsAdvisees',
					'advisees' => $advisees);
			$this->load->view('admin', $data);
}

function advisorToAdvisee(){
			
			$data = array('view' => 'advisor_To_Advisee');
			$this->load->view('admin', $data);
			

		}
function dashboard(){
	redirect('dashboard');
   
}

function advisorAdviseeMatch(){
//if($this->session->userdata->user)
			$advisorID= $this->input->post('advisorID');
			$adviseeID= $this->input->post('adviseeID');
			$data = array('view' => 'advisor_Advisee_Match',
							'advisor_id' => $advisorID,
							'student_id' => $adviseeID
							);
			
			$this->Staff_worker_model->assignTo($advisorID, $adviseeID);
			$this->load->view('admin', $data);

		}
}	
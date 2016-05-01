
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_member extends CI_Controller {

	function __construct() {
		parent::__construct();

        $this->load->model('Staff_worker_model');
        $this->load->model('Advisors_model');

		$this->load->helper(array('form'));

		$this->load->library('breadcrumbs');
		if(!$this->session->userdata('id')) {
			$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
			redirect('login');
		}
	}

	function ListAdvisees(){
		$advisees=$this->Staff_worker_model->showAllAdvisees();
		$data = array('view' => 'staff_member/listAllAdvisees',
			'advisees' => $advisees);
		$this->load->view('admin', $data);
	}

    function ListAdvisors(){
        $advisors=$this->Staff_worker_model->showAllAdvisors();
        $data = array('view' => 'staff_member/listAdvisors',
            'advisors' => $advisors);
        $this->load->view('admin', $data);
    }

	function advisorToAdvisee(){
		$this->breadcrumbs->push('Staff Member', '/');
		$this->breadcrumbs->push('Assign Advisors', 'advisorToAdvisee');
		$this->breadcrumbs->unshift('Home', '/');

			//print_r($this->Staff_worker_model->getAdvisorsByMajor("computersciences"));
		$data = array('view' => 'advisor_To_Advisee',
			'majors' => $this->Staff_worker_model->getAllMajors());
		$this->load->view('admin', $data);


	}
	function dashboard(){
		redirect('dashboard');

	}

	function advisorAdviseeMatch(){
//if($this->session->userdata->user)
		$advisorID= $this->input->post('advisorID');
        $adviseeID= $this->input->post('adviseeID');
        $adviseeIDStart= $this->input->post('adviseeIDStart');
        $adviseeIDEnd= $this->input->post('adviseeIDEnd');
        $rangeOrIndividual= $this->input->post('rangeOrIndividual');
        if($rangeOrIndividual == "Range of CWID for Advisee") {
            $initial = $adviseeIDStart;
            while($initial <= $adviseeIDEnd ) {
               // echo $initial++;
                $data = array('view' => 'advisor_Advisee_Match',
                    'advisor_id' => $advisorID,
                    'student_id' => $initial
                );
                $this->Staff_worker_model->assignTo($advisorID, $initial);
                $initial++;
            }

        } else {
            $data = array('view' => 'advisor_Advisee_Match',
                'advisor_id' => $advisorID,
                'student_id' => $adviseeID
            );
            $this->Staff_worker_model->assignTo($advisorID, $adviseeID);
        }
		$this->load->view('admin', $data);

	}
    function getAdvisorsByMajor($value='')
    {
        //$data = array('advisors' =>  $this->Staff_worker_model->getAdvisorsByMajor($value));
        echo json_encode($this->Staff_worker_model->getAdvisorsByMajor($value));
    }

    function deleteAdvisor() {
        $this->breadcrumbs->push('Staff Member', '/');
        $this->breadcrumbs->push('Delete Advisors', 'deleteAdvisor');
        $this->breadcrumbs->unshift('Home', '/');

        //print_r($this->Staff_worker_model->getAdvisorsByMajor("computersciences"));
        $data = array('view' => 'deleteAdvisor',
            'majors' => $this->Staff_worker_model->getAllMajors());
        $this->load->view('admin', $data);
    }

    function delteAdvisorProcess() {
        $advisorID= $this->input->post('advisorID');
        $data = array();
        if($advisorID!=null) {
            $this->Advisors_model->deleteAdvisor($advisorID);
            $this->session->set_flashdata('successmsg', 'Advisor Details removed from system!');
        } else {
            $this->session->set_flashdata('errormsg', 'Please Select any Advisor first!');
        }
        $data = array('view' => 'deleteAdvisor',
            'majors' => $this->Staff_worker_model->getAllMajors());
        $this->load->view('admin', $data);
    }

    function viewStudentWorker() {
        $this->breadcrumbs->push('Staff Member', '/');
        $this->breadcrumbs->push('Student Workers', 'viewStudentWorker');
        $this->breadcrumbs->unshift('Home', '/');
        $data = array('view' => 'staff_member/listAllAdvisees',
            'advisees' => $this->Staff_worker_model->getAllStudentWorkers());

        $this->load->view('admin', $data);
    }
    function addStudentWorker() {
        $data = array('view' => 'addStudentWorker',
            'advisees' => $this->Staff_worker_model->getAllAdvisee());

        $this->load->view('admin', $data);
    }
    function  redeemAdvisee($id) {
        $this->Staff_worker_model->redeemAdvisee($id);
        $this->session->set_flashdata('successmsg', 'Student Worker converted to normal Advisee!');
        redirect('staff_member/viewStudentWorker');
    }
    function  deleteStudentWorker($id) {
        $this->Staff_worker_model->deleteAdvisee($id);
        $this->session->set_flashdata('successmsg', 'Student deleted, even from advisee records!');
        redirect('staff_member/viewStudentWorker');
    }
}



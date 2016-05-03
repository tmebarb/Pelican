
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_member extends CI_Controller 
{

	function __construct() {
		parent::__construct();

        $this->load->model('Staff_worker_model');
        $this->load->model('Advisors_model');
        $this->load->model('Users_model');
        $this->load->model('Advisees_model');

		$this->load->helper(array('form'));
        $this->load->helper(array('form', 'url'));

        $this->load->library('form_validation');

		$this->load->library('breadcrumbs');
		if(!$this->session->userdata('id')) {
			$this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
			redirect('login');
		}
	}

    function initAddAdvisee()
    {
        $data = array('view' => 'staff_member/add-advisee');
        $this->load->view('admin', $data);
    }

    function addAdvisee()
    {
        $this->form_validation->set_rules('user_fullname', '<b>Full Name</b>', 'trim|required');
        $this->form_validation->set_rules('user_name', '<b>User Name</b>', 'trim|required');
        $this->form_validation->set_rules('CWID', '<b>CWID</b>', 'trim|required');
        $this->form_validation->set_rules('email5', '<b>Email</b>', 'trim|required|valid_email');
        // $this->form_validation->set_rules('phone', '<b>Phone Number</b>', 'trim');
        $this->form_validation->set_rules('classification', '<b>Classification</b>', 'trim|required');
        $this->form_validation->set_rules('password', '<b>Password</b>', 'trim|required|matches[repassword]|md5');
        $this->form_validation->set_rules('repassword', '<b>Confirm Password</b>', 'trim|required');
        $this->form_validation->set_rules('major', '<b>Major</b>', 'trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $data = array('view'=> 'Staff_member/add-advisee');
            $this->load->view('admin', $data);
        } 
        else 
        {
            $user_fullname = $this->input->post('user_fullname');
            $user_name = $this->input->post('user_name');
            $email = $this->input->post('email5');
            $CWID = $this->input->post('CWID');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            $phone = $this->input->post('phone');

            $classification = $this->input->post('classification');
            $major = $this->input->post('major');
                
            if ($this->Users_model->checkemail($email)) 
            {
                $this->session->set_flashdata('error_msg', 'Email Already Exists! <br/><br/>');
                redirect('Staff_member/addAdvisee');
            }

            $this->Advisees_model->saveAdvisee($user_fullname, $user_name, $email, $CWID, $password, $phone, $classification, $major);
            $this->session->set_flashdata('success_msg', 'Advisee details saved!<br/><br/>');
            redirect('Staff_member/addAdvisee');
        }
    } 

    function initAddAdvisor()
    {
        $data = array('view' => 'staff_member/add-advisor');
        $this->load->view('admin', $data);
    }

    function addAdvisor()
    {
        $this->form_validation->set_rules('user_fullname', '<b>Full Name</b>', 'trim|required');
        $this->form_validation->set_rules('user_name', '<b>User Name</b>', 'trim|required');
        $this->form_validation->set_rules('CWID', '<b>CWID</b>', 'trim|required');
        $this->form_validation->set_rules('email5', '<b>Email</b>', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', '<b>Phone Number</b>', 'trim');
        $this->form_validation->set_rules('office', '<b>Classification</b>', 'trim|required');
        $this->form_validation->set_rules('password', '<b>Password</b>', 'trim|required|matches[repassword]|md5');
        $this->form_validation->set_rules('repassword', '<b>Confirm Password</b>', 'trim|required');
        $this->form_validation->set_rules('major', '<b>Major</b>', 'trim|required');
        if($this->form_validation->run() == FALSE)
        {
            $data = array('view'=> 'Staff_member/add-advisor');
            $this->load->view('admin', $data);
        }
        else
        {
            $user_fullname = $this->input->post('user_fullname');
            $user_name = $this->input->post('user_name');
            $email = $this->input->post('email5');
            $CWID = $this->input->post('CWID');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            $phone = $this->input->post('phone');

            $classification = $this->input->post('office');
            $major = $this->input->post('major');

            if ($this->Users_model->checkemail($email))
            {
                $this->session->set_flashdata('error_msg', 'Email Already Exists! <br/><br/>');
                redirect('Staff_member/addAdvisor');
            }

            $this->Advisors_model->saveAdvisor($user_fullname, $user_name, $email, $CWID, $password, $phone, $classification, $major);
            $this->session->set_flashdata('success_msg', 'Advisor details saved!<br/><br/>');
            redirect('Staff_member/addAdvisor');
        }
    }

     function initAddStaffMember()
    {
        $data = array('view' => 'staff_member/add-staffmember');
        $this->load->view('admin', $data);
    }

    function addStaffMember()
    {
        $this->form_validation->set_rules('user_fullname', '<b>Full Name</b>', 'trim|required');
        $this->form_validation->set_rules('user_name', '<b>User Name</b>', 'trim|required');
        $this->form_validation->set_rules('CWID', '<b>CWID</b>', 'trim|required');
        $this->form_validation->set_rules('email5', '<b>Email</b>', 'trim|required|valid_email');
        $this->form_validation->set_rules('phone', '<b>Phone Number</b>', 'trim');
        $this->form_validation->set_rules('password', '<b>Password</b>', 'trim|required|matches[repassword]|md5');
        $this->form_validation->set_rules('repassword', '<b>Confirm Password</b>', 'trim|required');
        if($this->form_validation->run() == FALSE) 
        {
            $data = array('view'=> 'Staff_member/add-staffmember');
            $this->load->view('admin', $data);
        } 
        else 
        {
            $user_fullname = $this->input->post('user_fullname');
            $user_name = $this->input->post('user_name');
            $email = $this->input->post('email5');
            $CWID = $this->input->post('CWID');
            $password = $this->input->post('password');
            $repassword = $this->input->post('repassword');
            $phone = $this->input->post('phone');
                
            if ($this->Users_model->checkemail($email)) 
            {
                $this->session->set_flashdata('error_msg', 'Email Already Exists! <br/><br/>');
                redirect('Staff_member/addStaffMember');
            }

            $this->Staff_worker_model->saveStaffMember($user_fullname, $user_name, $email, $CWID, $password, $phone);
            $this->session->set_flashdata('success_msg', 'Staff Member details saved!<br/><br/>');
            redirect('Staff_member/addStaffMember');
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

    function ListStaff()
    {
        $staffmembers = $this->Staff_worker_model->getAllStaffMembers();
        $data = array('view' => 'staff_member/listAllStaff', 
                        'staffmembers' => $staffmembers);
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
        $major= $this->input->post('major');
        $adviseeID= $this->input->post('adviseeID');
        $adviseeIDStart= $this->input->post('adviseeIDStart');
        $adviseeIDEnd= $this->input->post('adviseeIDEnd');
        $rangeOrIndividual= $this->input->post('rangeOrIndividual');
        $majorOnly = $this->input->post('majorOnly');
        //echo ($majorOnly);
        //return;
        if($rangeOrIndividual == "Range of CWID for Advisee") {
            $initial = $adviseeIDStart;
            while($initial <= $adviseeIDEnd ) {
                // echo $initial++;
                $data = array('view' => 'advisor_Advisee_Match',
                        'advisor_id' => $advisorID,
                        'student_id' => $initial
                    );
                if($majorOnly) {
                    $this->Staff_worker_model->assignToWithMajor($advisorID, $initial, $major);
                } else {
                    $this->Staff_worker_model->assignTo($advisorID, $initial);
                }
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
        
        //print_r($this->Staff_worker_model->getAdvisorsByMajor("computersciences"));
        $data = array('view' => 'staff_member/deleteAdvisor',
            'advisors' => $this->Staff_worker_model->showAllAdvisors(),
            'majors' => $this->Staff_worker_model->getAllMajors());
        $this->load->view('admin', $data);
    }

    function deleteAdvisorProcess() {
        $advisorCWID= $this->input->post('advisorCWID');
        $advisorIDArray = $this->Advisors_model->get_User_ID($advisorCWID);
        $advisorID = $advisorIDArray[0]->user_id;
        $advisorArray = $this->Advisors_model->get_Name($advisorCWID);
        $advisorName = $advisorArray[0]->user_fullname;

        $data = array();
        if($advisorID!=null) {
            $this->Advisors_model->deleteAdvisor($advisorID);
            $this->session->set_flashdata('successmsg', 'Advisor Details removed from system!');
        } else {
            $this->session->set_flashdata('errormsg', 'Please Select any Advisor first!');
        }
        $data = array('view' => 'Staff_member/deleteAdvisorSuccess',
            'advisor_name' => $advisorName,
            'majors' => $this->Staff_worker_model->getAllMajors());
        $this->load->view('admin', $data);
    }

    function deleteAdvisee() {
        
        //print_r($this->Staff_worker_model->getAdvisorsByMajor("computersciences"));
        $data = array('view' => 'staff_member/deleteAdvisee',
            'advisees' => $this->Staff_worker_model->showAllAdvisees(),
            'majors' => $this->Staff_worker_model->getAllMajors());
        $this->load->view('admin', $data);
    }

    function deleteAdviseeProcess() {
        $adviseeCWID= $this->input->post('adviseeCWID');
        $adviseeIDArray = $this->Advisors_model->get_User_ID($adviseeCWID);
        $adviseeuID = $adviseeIDArray[0]->user_id;
        $adviseeArray = $this->Advisors_model->get_Name($adviseeCWID);
        $adviseeName = $adviseeArray[0]->user_fullname;

        $data = array();
        if($adviseeuID!=null) {
            $this->Staff_worker_model->deleteAdvisee($adviseeuID);
            $this->session->set_flashdata('successmsg', 'Advisee Details removed from system!');
        } else {
            $this->session->set_flashdata('errormsg', 'Please Select an Advisee first!');
        }
        $data = array('view' => 'Staff_member/deleteAdviseeSuccess',
            'advisee_name' => $adviseeName,
            'majors' => $this->Staff_worker_model->getAllMajors());
        $this->load->view('admin', $data);
    }

    function viewStudentWorker() {
        $data = array('view' => 'staff_member/listAllSW',
            'advisees' => $this->Staff_worker_model->getAllStudentWorkersWithoutAdvisor());

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

    function changeHolds()
    {
        $data = array('view' => 'staff_member/change_holds',
                        'advisees' => $this->Staff_worker_model->showAllAdviseesWithHolds());
        $this->load->view('admin', $data);
    }

    function changeHoldsConfirm()
    {
        $adviseeCWID = $this->input->post('adviseeCWID');
        $holdStat = $this->input->post('hold');
        $adviseeArray = $this->Advisors_model->get_Name($adviseeCWID);
        $adviseeName = $adviseeArray[0]->user_fullname;
        $adviseeIDArr = $this->Advisors_model->get_Advisee_ID($adviseeCWID);
        $adviseeID = $adviseeIDArr[0]->advisee_id;
       // $holdArr = $this->Staff_worker_model->getHoldStatus($adviseeID);
        //$holdStat = $holdArr[0]->hold;

        if ($holdStat == 0)
        {
            $data = array('view' => 'Staff_member/change_holds_confirm',
                                'advisee_name' => $adviseeName,
                                'hold' => $holdStat,
                                'msg' => 'has been lifted');
            $this->Staff_worker_model->lift_hold($adviseeID, $holdStat);
            $this->load->view('admin', $data);
        }

        else
        {
            $data = array('view' => 'Staff_member/change_holds_confirm',
                                'advisee_name' => $adviseeName,
                                'hold' => $holdStat,
                                'msg' => 'has been set');
            $this->Staff_worker_model->lift_hold($adviseeID, $holdStat);
            $this->load->view('admin', $data);
        }


    }


}



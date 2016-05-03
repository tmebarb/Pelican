<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->model('Users_model');
        $this->load->model('Advisees_model');
        $this->load->model('Advisors_model');
        $this->load->model('Slots_model');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library('breadcrumbs');
        if (!$this->session->userdata('id')) {
            $this->session->set_flashdata('error_msg', 'I can\'t remember u, Please login again! <br/><br/>');
            redirect('login');
        }
    }


    function selectappointment()
    {
        $this->breadcrumbs->push('Student', '/student');
        $this->breadcrumbs->push('Select Appointment', 'selectappointment');
        $this->breadcrumbs->unshift('Home', '/');

//			$data = array('allusers' => $this->Users_model->getallusers(), 'view'=> 'student/selectappointment');
        $data = array('allusers' => $this->Users_model->getallusers(), 'view' => 'student/selectappointment');
        $this->load->view('admin', $data);
    }

    function addappointment()
    {
        $this->breadcrumbs->push('Student', '/student');
        $this->breadcrumbs->push('Add New Appointment', 'addappointment');
        $this->breadcrumbs->unshift('Home', '/');
//			print_r($this->session->userdata('user_id'));
        $advisor = $this->Advisees_model->getAdvisorDetailsByAdviseeUserID($this->session->userdata('user_id'));
       // print_r($this->Slots_model->getTimeSlotByAdviseeID($this->session->userdata('user_id')));
        //return;
        $data = array('view' => 'student/addappointment',
            'advisor' => $advisor,
            'sessionDetails' => ($advisor)? $this->Advisees_model->getAdvisingSessionDetailsbyAdvisorUserID($advisor->advisor_id):null,
            'slotDetails' => $this->Slots_model->getTimeSlotByAdviseeID($this->session->userdata('user_id')) );
        $this->load->view('admin', $data);
    }

    function saveappointment()
    {
        return;
        $date = $this->input->post('date');
        $startTime = $this->input->post('time');
        $slot_id = $this->input->post('slot_id');
        $time = strtotime($startTime);
        $endTime =date("H:i", strtotime('+30 minutes', $time));
        $user_id = $this->session->userdata('user_id');
        $advisor = $this->Advisees_model->getAdvisorDetailsByAdviseeUserID($user_id);

        if(!$slot_id)
            $this->Slots_model->addtimeslot2($startTime, $endTime, $advisor->advisor_id, $user_id, $date);

        redirect("My_Calender");
    }

    function getAdvisorSlotsByDayNDate($date, $day, $advisor_id) {

        //echo $day;
        $res = $this->Advisees_model->getSlotsByDateNDay($day, $date, $advisor_id);
        if($res == null)
            $res = "";
        echo json_encode($res);
    }
    function test() {
        $data = array('view' => 'student/test');
        $this->load->view('admin', $data);
    }

    function getAdvisorProfile()
    {
        $userid = $this->session->userdata('user_id');
        $advisorArr = $this->Advisees_model->getAdvisorDetailsByAdviseeUserID($userid);

        $advisor_uid = $advisorArr->advisor_id;

        $data = array('view' => 'student/viewAdvisorInfo',
                    'usertype' => 'advisor',
                    'user_info' => $this->Users_model->profileInfo($advisor_uid, 'advisor'));


        $this->load->view('admin', $data);
    }

}

?>

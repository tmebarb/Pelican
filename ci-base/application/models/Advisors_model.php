<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Advisors_model extends CI_Model
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper('array');
    }

    function change_Major($adviseeNewMajor, $advisee_id)
    {
		$data = array('major' => $adviseeNewMajor);	
		$this->db->where('advisee_id', $advisee_id);
		$this->db->update('advisee', $data); 
    }

    function list_Advisees($advisorID)
    {
        $this->db->select('u.user_id, u.user_fullname, u.CWID, a.classification, a.major');
        $this->db->from('users u');
        $this->db->join('advisee a', 'u.user_id = a.user_id', 'inner');
        $this->db->where('u.advised_by', $advisorID);

        $query = $this->db->get();
        return $query->result();
    }

    function get_Advisee_Name($adviseeID)
    {
        $this->db->select('user_fullname');
        $this->db->from('users');
        $this->db->where('CWID', $adviseeID);

        $query = $this->db->get();
        return $query->result();
    }

    function get_Advisee_ID($adviseeCWID)
    {
    	$this->db->select('advisee_id');
    	$this->db->from('advisee a, users u');
    	$this->db->where('CWID', $adviseeCWID);
    	$this->db->where('u.user_id = a.user_id');

    	$query = $this->db->get();
        return $query->result(); 
    }

    function change_Office($office, $advisorID)
    {
        $newOffice = array('office_loc' => $office);
        $this->db->from('advisor')->where('user_id', $advisorID);
        $this->db->update('advisor', $newOffice);
    }


    function saveAdvisor($user_fullname, $user_name, $email, $CWID, $password, $phone, $officeLoc, $major)
    {
        //An array of information to be inserted into the users table
        $user_data = array(
            'user_fullname' => $user_fullname,
            'user_name' => $user_name,
            'user_email' => $email,
            'CWID' => $CWID,
            'user_password' => $password,
            'user_phone' => $phone,
            'user_type' => 'advisor'
        );

        $this->db->insert('users', $user_data);

        //Gets the user id that was created alongside the insert into the users table
        $advisor_userid = $this->db->insert_id();

        //An array of information for the same user that will be inserted into the advisor table
        $advisor_data = array(
            'office_loc' => $officeLoc,
            'major' => $major,
            'user_id' => $advisor_userid
            );
        $this->db->insert('advisor', $advisor_data);
    }

    function getAll()
    {
        $query = $this->db->get('advisor');
        return $query->result();
    }

    function getAdvisorByUserId($user_id)
    {
        $this->db->where('user_id', $user_id);
        $query = $this->db->get('advisor');
        if ($query->num_rows() > 0)
            return $query->row();
        else
            return null;
    }

    function startSession($startdate, $enddate, $advisor_id)
    {
        $data = array('startdate' => $startdate,
            'enddate' => $enddate,
            'advisor_id' => $this->Advisors_model->getAdvisorByUserId($this->session->userdata('user_id'))->advisor_id,
            'type' => '1');
        $this->db->insert('active_advising_sessions', $data);
    }

    function udpateSession($session_id, $startdate, $enddate, $advisor_id)
    {
        $data = array('startdate' => $startdate,
            'enddate' => $enddate,
            'advisor_id' => $this->Advisors_model->getAdvisorByUserId($this->session->userdata('user_id'))->advisor_id,
            'type' => '1');
        $this->db->where('session_id', $session_id);
        $this->db->update('active_advising_sessions', $data);
    }

    function getActiveAdvisingSessions($advisor_id)
    {
        $this->db->where('advisor_id', $advisor_id);
        $this->db->where('type', '1');
        $query = $this->db->get('active_advising_sessions');
        return $query->row();
    }

    function deleteAdvisor($advisorID)
    {
        $this->db->where('advisor_id', $advisorID);
        $query = $this->db->get('advisor');
        $ret = $query->row();
        $this->db->delete('users', array('user_id' => $ret->user_id));
        $this->db->delete('advisor', array('advisor_id' => $ret->advisor_id));
    }

    function fillDatabase()
    {
        $x = 0;
        $username = '90';
        $password = '0291301293';
        $user_fullname = '123232323';
        $user_type = 'advisee';
        while ($x < 5000) {
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;
            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
            $data = array(
                'user_name' => $username,
                'user_password' => $password,
                'user_fullname' => $user_fullname,
                'user_type' => $user_type
            );
            $this->db->insert('users', $data);
            $username++;
            $password++;
            $user_fullname++;
            $x++;


            $this->db->insert('users', $data);
        }

    }
}
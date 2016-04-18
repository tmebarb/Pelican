<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisors_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function change_Major($adviseeNewMajor, $advisee_id) {
		$OB=array('major'=>$adviseeNewMajor);
		$this->db->from('advisee')->where('student_id', $advisee_id);
		$this->db->update('advisee', $OB); 
		
	}


	function saveAdvisor($first_name, $last_name, $email, $pic, $password, $major, $dob)
	{
		$data = array(
			'first_name' => $first_name,
			'last_name' => $last_name,
			'email' => $email,
			'pic'	=> $pic,
			'password' => $password,
			'major' => $major,
			'dob' => $dob
			);

		$this->advisors->insert('advisor', $data); 
	}

	function getAll() {
		$query = $this->db->get('advisor');
		return $query->result();
	}

	function getAdvisorByUserId($user_id) {
		$this->db->where('user_id', $user_id);
		$query = $this->db->get('advisor');
		if($query->num_rows() > 0)
			return $query->row();
		else
			return null;
	}

	function startSession($startdate, $enddate, $advisor_id) {
		$data = array('startdate' => $startdate,
						'enddate' => $enddate,
						'advisor_id'=>$this->Advisors_model->getAdvisorByUserId($this->session->userdata('id'))->advisor_id,
						'type'=>'1'  );
		$this->db->insert('active_advising_sessions', $data);
	}

	function udpateSession($session_id, $startdate, $enddate, $advisor_id) {
		$data = array('startdate' => $startdate,
						'enddate' => $enddate,
						'advisor_id'=>$this->Advisors_model->getAdvisorByUserId($this->session->userdata('id'))->advisor_id,
						'type'=>'1'  );
		$this->db->where('session_id', $session_id);
		$this->db->update('active_advising_sessions', $data);
	}

	function getActiveAdvisingSessions($advisor_id) {
		$this->db->where('advisor_id', $advisor_id);
		$this->db->where('type', '1');
		$query = $this->db->get('active_advising_sessions');
		return $query->row();
	}
	

	function fillDatabase() {
		$x=0;
		$username='90';
		$password='0291301293';
		$user_fullname='123232323';
		$user_type='advisee';
		while($x<5000){
			$data = array(
			'user_name' => $username,
			'user_password' => $password,
			'user_fullname' => $user_fullname,
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
			'user_type'	=> $user_type
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
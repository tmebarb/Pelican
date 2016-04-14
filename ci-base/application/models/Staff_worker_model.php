<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_worker_model extends CI_Model
{

	function __construct()

	{
		parent::__construct();
		$this->load->helper('array');
	}

	function assignTo($advisor_id, $advisee_id) {
		$OB=array('student_id'=>$advisee_id);
		$this->db->Where('student_id', $advisee_id);
		$this->db->update('Advisee', $OB); 
		
	}
}
?>
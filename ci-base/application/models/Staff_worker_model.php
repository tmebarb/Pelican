<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_worker_model extends CI_Model
{

	function __construct()

	{
		parent::__construct();
		$this->load->helper('array');
	}

	function assignTo($advisor_id, $advisee_id) {
		$OB=array('advisor_id'=>$advisor_id);
		//$this->db->from('advisee');
		$this->db->from('advisee')->Where('student_id', $advisee_id);
		$this->db->update('advisee', $OB); 
		
	}
}
?>
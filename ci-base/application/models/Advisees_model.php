<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisees_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAll() {
		$query = $this->db->get('advisees');
		return $query->result();
	}
	function getAllAdviseeDetails() {
		$this->db->select('u.user_id, u.user_fullname, u.CWID, a.classification, a.major');
		$this->db->from('users u');
		$this->db->join('advisee a', 'u.user_id = a.user_id', 'inner');

		$query = $this->db->get();
		return $query->result();
	}
}
?>
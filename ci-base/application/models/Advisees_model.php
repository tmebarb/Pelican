<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisees_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAll() {
		$this->db->select('*');
		$query = $this->db->get('users');
		return $query->result();
	}
}
?>
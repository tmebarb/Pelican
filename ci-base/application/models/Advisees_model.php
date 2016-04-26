<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisees_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAll() {
		$query = $this->db->get('advisses');
		return $query->result();
	}
}
?>
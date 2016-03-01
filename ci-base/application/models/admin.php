<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function getAdmin() {
		$query = $this->db->get('admin');
		return $query->result();
	}
}
?>
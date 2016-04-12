<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Staff_worker_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	function assignTo($IDData) {
		
		$this->db->insert('advises', $IDData); 
		
	}
}
?>
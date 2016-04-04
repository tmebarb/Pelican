<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisors_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
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

		$this->db->insert('advisors', $data); 
	}

}
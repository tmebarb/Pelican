<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Advisees_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	function getCalender()
{
    $result = $this->db->get('events');
	return $result;

}
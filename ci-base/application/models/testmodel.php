<?php 
class testmodel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	function getApts()
{
    $query = $this->db->get('events');
	return $query;

}
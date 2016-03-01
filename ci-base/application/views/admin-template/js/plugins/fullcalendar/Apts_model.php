<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Apts_model extends CI_Model
{
		function __construct()
	{
		parent::__construct();
	}

	function getApts()

	{
		$query = $this->db->get('apts');
		$jsonApts= array(); 


while($currentRow=$query)){

	$jsonApts[] = array(
	'id' => $allApts['apt_ID'],
	'title'=> $allApts['student_Name'],
	'start' => $allApts['apt_Time'],
	'allDay' => false;
    );                
    } 
echo json_encode($jsonApts);
exit();
	}
	?>
<?php 

class testmodel extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}
	
	$jArray=array();
    $result = $this->db->get('events');
    foreach ($testApts as $Row){
    	$jArray[]=array('id' => $row['id'],
    		'title' => $row['title'],
    		'start' => $row['start'],
    		)

    }
	return(json_encode($jArray));
}
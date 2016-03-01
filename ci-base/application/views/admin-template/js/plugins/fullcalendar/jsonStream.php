<?php
    //create an array
	$query = $this->db->get('apts');
    $emparray = array();
    while($row =mysqli_fetch_assoc($query))
    {
        $emparray[] = $row;
    }
    json_encode($emparray[])
?>
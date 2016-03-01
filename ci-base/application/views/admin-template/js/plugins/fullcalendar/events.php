<?php

$query = $this->db->get('events');
    $emparray = array();
    while($row =mysqli_fetch_assoc($query))
    {
        $emparray[] = $row;
    }
    echo json_encode($emparray[]);
	}
?>
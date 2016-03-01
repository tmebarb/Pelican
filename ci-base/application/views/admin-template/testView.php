<?php
$jsonevents = array();

while($row= mysql_fetch_assoc($dbEvents))
{
$jsonevents[]= $row;
    

}

 echo json_encode($jsonevents); 
 ?>
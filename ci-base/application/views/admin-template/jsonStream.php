<?php
$jsonevents = array();

foreach($json->result() as $entry)
{
$jsonevents[] = array(
    'id' => 1,
    'title' => $entry->title,
    'start' => $entry->start,
    'end' => $entry->end,
    'allDay' => ''
);

}

 echo json_encode($jsonevents); 
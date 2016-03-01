&lt;?php foreach($events->result() as $entry): ?&gt;
          &lt;?php $jsonevents = array(
            'id' => $entry->eventID,
            'title' => $entry->eventTitle,
            'start' => $entry->startDate,
            'allDay' => false,
            'end' => $entry->endDate
        );
        echo json_encode($jsonevents);
        ?&gt;
        
    &lt;?php endforeach; ?&gt;
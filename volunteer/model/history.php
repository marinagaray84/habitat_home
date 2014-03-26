<?php

	// TITLE: Volunteer Work History Model
	// FILE: volunteer/model/history.php
	// AUTHOR: dum5002
    
    global $person_id;
    global $event_id;

    $person_id="3";
    function getEventId(){
    	$event_id=$dbio->getEventId($person_id);
    	return $event_id;
    }

    function getEvents(){
        $dbevent= $dbio-> getEvent(getEventId());
        return $dbevent;
    }

    function getDates(){
        $dbdate= $dbio->getDate(getEventId());
        return $dbdate;
    }

    function getHours(){
        $dbHours= $dbio->getHours(getEventId());
        return $dbHours;
    }

    
?>

<?php

	// TITLE: Office Events Model
	// FILE: office/model/event.php
	// AUTHOR: sbkedia
	
	
	function readEvents() {
		global $dbio;
		$events = $dbio->readAllEvent();
		return $events;
	}

	function readEvent_Types(){
		global $dbio;
		$event_types = $dbio->readAllEvent_Type();
		return $event_types;
	}

	function countEventGuest($event_id){
		global $dbio;
		$eventNumberGuests = $dbio->countEventGuests($event_id);
		return $eventNumberGuests;	
	}

	function searchEvent($event_type_id) {
		global $dbio;
		$events = $dbio->searchEventByType($event_type_id);
		return $events;
	}
	
	function readCommittees(){
		global $dbio;
		$committees = $dbio->readAllCommittee();
		return $committees;
	}

	function readAddressByID($addressID){
		global $dbio;
		$address = $dbio->readAddress($addressID);
		return $address;
	}

	function readEventByID($event_id){
		global $dbio;
		$event= $dbio->readEvent($event_id);
		return $event;
	}
	function create() {}

	
	function update() {}
	function delete() {}
	//function list() {}

?>

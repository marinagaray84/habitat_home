<?php

	// TITLE: Office Events Controller
	// FILE: office/controller/event.php
	// AUTHOR: sbkedia


	switch ($act) {

		case 'search':
			$_SESSION['eventType'] = isset($_GET['eventType']) ? $_GET['eventType'] : '';
			include 'office/model/event.php';
			$page = $dir . '/view/searchEvent.php';
			break;

		case 'create':
			include 'office/model/event.php';
			$page = $dir . '/view/createEvent.php';
			break;

		case 'read':
			include 'office/model/event.php';
			$page = $dir . '/view/viewEvent.php';
			break;

		case 'update':
			// CODE HERE
			break;

		case 'delete':
			// CODE HERE
			break;

		case 'list':
			// CODE HERE
			break;

		case 'confirmCreate':

			$addressObj = new Address();
			$addressObj->setStreet1(isset($_GET['street1']) ? $_GET['street1'] : '');
			$addressObj->setStreet2(isset($_GET['street2']) ? $_GET['street2'] : '');
			$addressObj->setCity(isset($_GET['city']) ? $_GET['city'] : '');
			$addressObj->setState(isset($_GET['state']) ? $_GET['state'] : '');
			$addressObj->setZip(isset($_GET['zipcode']) ? $_GET['zipcode'] : '');

			$eventObj = new Event();
			$eventObj->setTitle(isset($_GET['title']) ? $_GET['title'] : '');
			$eventObj->setType(isset($_GET['type']) ? $_GET['type'] : '');
			$eventObj->setCommittee(isset($_GET['committee']) ? $_GET['committee'] : '');
			$eventObj->setSponsoredBy(isset($_GET['sponsor']) ? $_GET['sponsor'] : '');

			$dbio->createEvent($addressObj, $eventObj);

			include 'office/model/event.php';
			$page = $dir . '/view/confirmCreateEvent.php';
			break;	

		default:
			include 'office/model/event.php';
			$page = $dir . '/view/' . (($sub) ? $sub : $dir) . '.php';
			break;


	}// end switch

?>

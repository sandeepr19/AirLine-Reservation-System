<?php

/*
 This class is used to store the details relevant to a passenger.
 */

class Passenger {
	private $_passengerId;
	private $_ticketId;
	private $_fname;
	private $_lname;
	private $_age;



	function setpassengerId($passengerId) {
		$this->_passengerId = $passengerId;
	}
	function getpassengerId() {
		return $this->_passengerId;
	}


	function setticketId($ticketId) {
		$this->_ticketId = $ticketId;
	}
	function getticketId() {
		return $this->_ticketId;
	}

	function setfname($fname) {
		$this->_fname = $fname;
	}
	function getfname() {
		return $this->_fname;
	}

	function setlname($lname) {
		$this->_lname = $lname;
	}
	function getlname() {
		return $this->_lname;
	}

	function setage($age) {
		$this->_age = $age;
	}
	function getage() {
		return $this->_age;
	}


}

?>
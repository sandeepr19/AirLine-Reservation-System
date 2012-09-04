<?php

/*
 This class is used to store details relevant to a ticket.
 */

class Ticket {
	private $_ticketId;
	private $_eTicketNo;
	private $_flightClassId;
	private $_userId;
	private $_bookingDate;

	function setticketId($ticketId) {
		$this->$_ticketId = $ticketId;
	}
	function getticketId() {
		return $this->_ticketId;
	}


	function seteTicketNo($eTicketNo) {
		$this->_eTicketNo = $eTicketNo;
	}
	function geteTicketNo() {
		return $this->_eTicketNo;
	}

	function setflightClassId($flightClassId) {
		$this->_flightClassId = $flightClassId;
	}
	function getflightClassId() {
		return $this->_flightClassId;
	}

	function setuserId($userId) {
		$this->_userId = $userId;
	}
	function getuserId() {
		return $this->_userId;
	}

	function setbookingDate($bookingDate) {
		$this->_bookingDate = $bookingDate;
	}
	function getbookingDate() {
		return $this->_bookingDate;
	}

}

?>
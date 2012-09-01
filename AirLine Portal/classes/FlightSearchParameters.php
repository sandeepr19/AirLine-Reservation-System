<?php

class FlightSearchParameters {
	private $_source;
	private $_destination;
	private $_numberOfTickets;
	private $_bookingDate;

	function setSource($source) {
		$this->_source = $source;
	}
	function getSource() {
		return $this->_source;
	}

	function setDestination($destination) {
		$this->_destination = $destination;
	}
	function getDestination() {
		return $this->_destination;
	}

	function setNumberOfTickets($numberOfTickets) {
		$this->_numberOfTickets = $numberOfTickets;
	}
	function getNumberOfTickets() {
		return $this->_numberOfTickets;
	}

	function setBookingDate($bookingDate) {
		$this->_bookingDate = $bookingDate;
	}
	function getBookingDate() {
		return $this->_bookingDate;
	}


}
?>
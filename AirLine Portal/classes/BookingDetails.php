<?php

class BookingDetails {
	private $_ticketId;
	private $_flightName;
	private $_className;
	private $_bookingDate;
	private $_departureDate;
	private $_source;
	private $_destination;
	private $_fare;
	private $_ticketMiles;
	
	function getTicketMiles(){
		return $this->_ticketMiles;
	}
	
	function setTicketMiles($ticketMiles)
	{
		$this->_ticketMiles=$ticketMiles;	
	}

	function setTicketId($ticketId) {
		$this->_ticketId = $ticketId;
	}
	function getTicketId() {
		return $this->_ticketId;
	}

	function setFlightName($flightName) {
		$this->_flightName = $flightName;
	}
	function getFlightName() {
		return $this->_flightName;
	}

	function setClassName($className) {
		$this->_className = $className;
	}
	function getClassName() {
		return $this->_className;
	}

	function setBookingDate($bookingDate) {
		$this->_bookingDate = $bookingDate;
	}
	function getBookingDate() {
		return $this->_bookingDate;
	}

	function setDepartureDate($departureDate) {
		$this->_departureDate = $departureDate;
	}
	function getDepartureDate() {
		return $this->_departureDate;
	}

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

	function setFare($fare) {
		$this->_fare = $fare;
	}
	function getFare() {
		return $this->_fare;
	}
}
?>
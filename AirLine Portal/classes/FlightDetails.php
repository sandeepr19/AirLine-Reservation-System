<?php

class FlightDetails {
	private $_flightClassId;
	private $_numberOfTickets;
	private $_className;
	private $_flightName;
	private $_departureTime;
	private $_arrivalTime;
	private $_source;
	private $_destination;
	private $_fare;
	private $_seatsAvailable;
	private $_flightMiles;
	
	function setFlightMiles($flightMiles)
	{
		$this->_flightMiles=$flightMiles;
	}
	
	function getFlightMiles()
	{
		return $this->_flightMiles;
	}
	
	function setFlightClassId($flightClassId) {
		$this->_flightClassId = $flightClassId;
	}
	function getFlightClassId() {
		return $this->_flightClassId;
	}

	function setNumberOfTickets($numberOfTickets) {
		$this->_numberOfTickets = $numberOfTickets;
	}
	function getNumberOfTickets() {
		return $this->_numberOfTickets;
	}
	function setClassName($className) {
		$this->_className = $className;
	}
	function getClassName() {
		return $this->_className;
	}

	function setFlightName($flightName) {
		$this->_flightName = $flightName;
	}
	function getFlightName() {
		return $this->_flightName;
	}
	function setDepartureTime($departureTime) {
		$this->_departureTime = $departureTime;
	}
	function getDepartureTime() {
		return $this->_departureTime;
	}

	function setArrivalTime($arrivalTime) {
		$this->_arrivalTime = $arrivalTime;
	}
	function getArrivalTime() {
		return $this->_arrivalTime;
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
	function setSeatsAvailable($seatsAvailable) {
		$this->_seatsAvailable = $seatsAvailable;
	}
	function getSeatsAvailable() {
		return $this->_seatsAvailable;
	}

}

?>

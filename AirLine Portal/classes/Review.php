<?php

/*
 This class is used to store details relevant to a review
 */

class Review {
	private $_flightName;
	private $_reviewDescription;
	private $_flightDescription;
	private $_travelDate;
	private $_flightClassId;

	function setFlightId($flightId){
		$this->_flightClassId=$flightId;
	}

	function getFlightId(){
		return $this->_flightClassId;
	}

	function setFlightName($flightName) {
		$this->_flightName = $flightName;
	}
	function getFlightName() {
		return $this->_flightName;
	}

	function setReviewDescription($reviewDescription) {
		$this->_reviewDescription = $reviewDescription;
	}
	function getReviewDescription() {
		return $this->_reviewDescription;
	}

	function setFlightDescription($flightDescription) {
		$this->_flightDescription = $flightDescription;
	}
	function getFlightDescription() {
		return $this->_flightDescription;
	}

	function setTravelDate($travelDate) {
		$this->_travelDate = $travelDate;
	}
	function getTravelDate() {
		return $this->_travelDate;
	}
}

?>

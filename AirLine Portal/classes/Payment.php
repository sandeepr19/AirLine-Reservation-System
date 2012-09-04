<?php

/*
 This class is used to store details relevant to a particular payment.
 */

class Payment {
	private $_paymentId;
	private $_ticketId;
	private $_paymentDate;
	private $_paymentMode;
	private $_amount;

	function setpaymentId($paymentId) {
		$this->_paymentId = $paymentId;
	}
	function getpaymentId() {
		return $this->_paymentId;
	}


	function setticketId($ticketId) {
		$this->_ticketId = $ticketId;
	}
	function getticketId() {
		return $this->_ticketId;
	}

	function setpaymentDate($paymentDate) {
		$this->_paymentDate = $paymentDate;
	}
	function getpaymentDate() {
		return $this->_paymentDate;
	}

	function setpaymentMode($paymentMode) {
		$this->_paymentMode = $paymentMode;
	}
	function getpaymentMode() {
		return $this->_paymentMode;
	}

	function setamount($amount) {
		$this->_amount = $amount;
	}
	function getamount() {
		return $this->_amount;
	}




}

?>
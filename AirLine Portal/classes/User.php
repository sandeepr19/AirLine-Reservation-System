<?php

class User {
	private $_userId;
	private $_loginId;
	private $_password;
	private $_firstName;
	private $_lastName;
	private $_address;
	private $_emailId;
	private $_phoneNo;
	private $_securityQuestion;
	private $_securityAnswer;
	private $_miles;
	
	function setMiles($miles)
	{
		$this->_miles=$miles;
	}
	
	function getMiles()
	{
		return $this->_miles;
	}

	function setUserId($userId) {
		$this->_userId = $userId;
	}
	function getUserId() {
		return $this->_userId;
	}


	function setLoginId($loginId) {
		$this->_loginId = $loginId;
	}
	function getLoginId() {
		return $this->_loginId;
	}

	function setPassword($password) {
		$this->_password = $password;
	}
	function getPassword() {
		return $this->_password;
	}

	function setFirstName($firstName) {
		$this->_firstName = $firstName;
	}
	function getFirstName() {
		return $this->_firstName;
	}

	function setLastName($lastName) {
		$this->_lastName = $lastName;
	}
	function getLastName() {
		return $this->_lastName;
	}

	function setAddress($address) {
		$this->_address = $address;
	}
	function getAddress() {
		return $this->_address;
	}

	function setEmailId($emailId) {
		$this->_emailId = $emailId;
	}
	function getEmailId() {
		return $this->_emailId;
	}

	function setPhoneNumber($phoneNumber) {
		$this->_phoneNo = $phoneNumber;
	}
	function getPhoneNumber() {
		return $this->_phoneNo;
	}

	function setSecurityQuestion($question) {
		$this->_securityQuestion = $question;
	}
	function getSecurityQuestion() {
		return $this->_securityQuestion;
	}

	function setSecurityAnswer($answer) {
		$this->_securityAnswer = $answer;
	}
	function getSecurityAnswer() {
		return $this->_securityAnswer;
	}

}

?>
<?php

/*
 This model contains all the methods relevant to a particular user.
 */
class UserAccountModel {

	private $userPresent;
	private $num_rows;

	function isUserPresent($userName,$password){
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt = oci_parse($conn, "select count(*) as NUM_ROWS from users where login_id = '$userName' and password ='$password'");
		oci_define_by_name($stmt, 'NUM_ROWS',$this->num_rows);
		oci_execute($stmt);
		oci_fetch($stmt);
		oci_close($conn);
		if($this->num_rows>0)
		{
			return true;
		}else {
			return false;
		}
	}


	function getUserInstance($userName,$password){
		$user = new User();
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt = oci_parse($conn, "select * from users where login_id = '$userName' and password ='$password'");
		$rows = oci_execute($stmt);
		oci_close($conn);
		//var_dump($rows);
		while ( $row = oci_fetch_assoc($stmt) ) {
			$user->setUserId($row['USER_ID']);
			$user->setPassword($row['PASSWORD']);
			$user->setFirstName($row['FNAME']);
			$user->setLastName($row['LNAME']);
			$user->setLoginId($row['LOGIN_ID']);
			$user->setEmailId($row['EMAIL_ID']);
			$user->setAddress($row['ADDRESS']);
			$user->setPhoneNumber($row['PHONE_NO']);
			$user->setSecurityAnswer($row['ANSWER']);
			$user->setSecurityQuestion($row['QUESTION']);
			$user->setMiles($row['MILES']);
		}
		return $user;
	}


	function getUserForID($userId){

		$user = new User();
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt = oci_parse($conn, "select * from users where user_Id='".$userId."'");
		$rows = oci_execute($stmt);
		oci_close($conn);
		while ( $row = oci_fetch_assoc($stmt) ) {
			echo $row['LOGIN_ID'];
			$user->setUserId($row['USER_ID']);
			$user->setPassword($row['PASSWORD']);
			$user->setFirstName($row['FNAME']);
			$user->setLastName($row['LNAME']);
			$user->setLoginId($row['LOGIN_ID']);
			$user->setEmailId($row['EMAIL_ID']);
			$user->setAddress($row['ADDRESS']);
			$user->setPhoneNumber($row['PHONE_NO']);
			$user->setSecurityAnswer($row['ANSWER']);
			$user->setSecurityQuestion($row['QUESTION']);
			$user->setMiles($row['MILES']);
		}
		return $user;
	}

	function createUser($user)
	{
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$maxQuery="Select max(user_id) + 1 from users";
		$stmt1=oci_parse($conn,$maxQuery);
		$rows = oci_execute($stmt1);
		while ( $row = oci_fetch_row($stmt1)) {
			$max=$row[0];
		}
		$query = "insert into users values($max,'".$user->getLoginId()."','".$user->getPassword()."','".$user->getFirstName()."','".$user->getLastName()."','".$user->getAddress()."','".$user->getEmailId()."','".$user->getPhoneNumber()."','".$user->getSecurityQuestion()."','".$user->getSecurityAnswer()."','0')";
		$stmt2=oci_parse($conn,$query);
		$result=oci_execute($stmt2);


		if($result)
		{
			$maxQuery="Select max(user_id) from users";
			$stmt1=oci_parse($conn,$maxQuery);
			$rows = oci_execute($stmt1);
			oci_close($conn);
			while ( $row = oci_fetch_row($stmt1)) {
				$max=$row[0];
			}
			return $max;
		}else {
				
			return 0;
				

		}

	}

	function updateUser()
	{
		$user = unserialize($_SESSION['userToBeUpdated']);
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$query = "update users set fname = '".$user->getFirstName()."', lname = '".$user->getLastName()."',address = '".$user->getAddress()."',email_id = '".$user->getEmailId()."',phone_no ='".$user->getPhoneNumber()."',question = '".$user->getSecurityQuestion()."',answer = '".$user->getSecurityAnswer()."',miles = '".$_SESSION['userMiles']."' where user_id = '".$user->getUserId()."'";
		$stmt=oci_parse($conn,$query);
		$result=oci_execute($stmt);
		oci_close($conn);
		if($result)
		{
			return $result;
		}else {
			return 0;
		}

	}


}
?>

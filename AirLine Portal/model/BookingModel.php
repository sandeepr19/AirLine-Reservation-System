<?php

/*
 This model contains all the methods relevant to a particular booking.
 */

class BookingModel {

	private $userPresent;
	private $num_rows;

	function getBookings($userId){
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt = oci_parse($conn, "Select T.ticket_id, F.FLIGHT_DESC,C.CLASS_NAME,T.BOOKING_DATE,F.DEPARTURE_DATE,AA.A_NAME,A.A_NAME,FC.COST , T.TICKET_MILES from ticket t join flight_class fc on T.FLIGHT_CLASS_ID=FC.FLIGHT_CLASS_ID JOIN FLIGHT F ON FC.FLIGHT_ID = F.FLIGHT_ID
		JOIN CLASS C ON FC.CLASS_ID = C.CLASS_ID JOIN ROUTE R ON F.ROUTE_ID = R.ROUTE_ID JOIN AIRPORT A ON R.DESTINATION_AIRPORT_ID = A.AIRPORT_ID
		JOIN AIRPORT AA ON R.SOURCE_AIRPORT_ID = AA.AIRPORT_ID WHERE T.USER_ID = ".$userId);
		oci_execute($stmt);
		oci_close($conn);
		$arrayOfBookingDetails= array();
		$count = 1;

		while ( $row = oci_fetch_row($stmt)) {
			$boookingDetails = new BookingDetails();
			$boookingDetails->setTicketId($row[0]);
			$boookingDetails->setFlightName($row[1]);
			$boookingDetails->setClassName($row[2]);
			$boookingDetails->setBookingDate($row[3]);
			$boookingDetails->setDepartureDate($row[4]);
			$boookingDetails->setSource($row[5]);
			$boookingDetails->setDestination($row[6]);
			$boookingDetails->setFare($row[7]);
			$boookingDetails->setTicketMiles($row[8]);
			array_push($arrayOfBookingDetails, $boookingDetails);
			$count=$count+1;

		}

		foreach ($arrayOfBookingDetails as $value)
		{
			echo $value->getFare();
		}
		//$arrayOfBookings=
		return $arrayOfBookingDetails;
	}

	function deleteBookings($ticketId){

		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt10 ="Select ticket_miles from ticket where ticket_id='".$ticketId."'";
		$stmt11 = oci_parse($conn,$stmt10);
		$result11=oci_execute($stmt11);
		$var;
		while ( $row = oci_fetch_row($stmt11))
		{
			$var=$row[0];
		}
		$var = $_SESSION['userMiles']-$var;
		if($var<0)
		{
			$var=0;
		}
		$stmtUpdate = "update users set Miles='".$var."' where user_id='".$_SESSION['userId']."'";
		$stmtUpdate1=oci_parse($conn, $stmtUpdate);
		$result3=oci_execute($stmtUpdate1);
		$_SESSION['userMiles']=$var;
		$stmt = "Delete from Payment where ticket_id = '".$ticketId."'";
		$stmt1 = oci_parse($conn, $stmt);
		$result1=oci_execute($stmt1);
		$stmt = "Delete from passenger where ticket_id = '".$ticketId."'";
		$stmt1 = oci_parse($conn, $stmt);
		$result2=oci_execute($stmt1);
		$stmt = "Delete from ticket where ticket_id = '".$ticketId."'";
		$stmt1 = oci_parse($conn, $stmt);
		$result3=oci_execute($stmt1);
		oci_close($conn);
		if($result1 && $result2 && $result3)
		{
			return true;
		}else
		{
			echo "false";
		}

	}

	function purchaseTicket()
	{
		$passenger = unserialize($_SESSION['passengerDetails']);
		$flightDetails=unserialize($_SESSION['flightDetailsForBooking']);
		$flightDetails->setFare($_SESSION['lastPurchased']);
		$userId=$_SESSION['userId'];

		$modeOfPayment = $_SESSION['modeOfPayment'];
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$ticketid = rand();

		$stmt = "insert into ticket values('".$ticketid."','".rand()."','".$flightDetails->getFlightClassId()."','".$userId."','".date('m/d/Y')."','".$flightDetails->getFlightMiles()."')";
		$stmt1 = oci_parse($conn, $stmt);
		$result2=oci_execute($stmt1);
		$stmt2 = "insert into passenger values('".rand()."','".$ticketid."','".$passenger->getfname()."','".$passenger->getlname()."','".$passenger->getage()."')";
		$stmt3 = oci_parse($conn, $stmt2);
		$result3=oci_execute($stmt3);
		$stmt4 = "insert into payment values('".rand()."','".$ticketid."','".$modeOfPayment."','".$flightDetails->getfare()."','".date('m/d/Y')."')";
		$stmt5 = oci_parse($conn, $stmt4);
		$result2=oci_execute($stmt5);
		$stmtUpdate = "update users set Miles='".$_SESSION['userMiles']."' where user_id='".$_SESSION['userId']."'";
		$stmtUpdate1=oci_parse($conn, $stmtUpdate);
		$result3=oci_execute($stmtUpdate1);
		$stmt9="update flight_class set no_of_seats ='".($flightDetails->getSeatsAvailable()-1)."' where flight_class_id='".$flightDetails->getFlightClassId()."'";
		$stmtUpdate2=oci_parse($conn, $stmt9);
		$result4=oci_execute($stmtUpdate2);
		oci_close($conn);
		if($result2)
		{
			return 1;
		}

	}

}
?>
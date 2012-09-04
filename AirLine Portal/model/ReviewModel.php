<?php

/*
 This model contains all the methods relevant to a particular review.
 */

class ReviewModel {

	private $userPresent;
	private $num_rows;

	function getReview($flightDesc){
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt = oci_parse($conn, "Select u.fname,f.flight_desc,r.travel_date,r.description from review r join flight f on R.FLIGHT_ID = F.FLIGHT_ID join users u on R.USER_ID = u.user_id where F.FLIGHT_DESC = '".$flightDesc."'");
		oci_define_by_name($stmt, 'NUM_ROWS',$this->num_rows);
		oci_execute($stmt);
		oci_close($conn);
		$arrayOfReviewDetails= array();
		while ( $row = oci_fetch_row($stmt)) {
			$review = new Review();
			$review->setFlightName($row[0]);
			$review->setFlightDescription($row[1]);
			$review->setTravelDate($row[2]);
			$review->setReviewDescription($row[3]);
			array_push($arrayOfReviewDetails, $review);
		}
		return $arrayOfReviewDetails;
	}


	function insertReview($review){
		$userId=$_SESSION['userId'];
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt = "insert into review values('".rand()."','".$review->getReviewDescription()."','".$userId."','".$review->getFlightId()."','".$review->getTravelDate()."')";
		echo $stmt;
		$stmt1 = oci_parse($conn, $stmt);
		$result=oci_execute($stmt1);
		if($result)
		{
			return $result;
		}

	}

}
?>



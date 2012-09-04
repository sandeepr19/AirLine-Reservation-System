<?php

/*
 This model contains all the methods relevant to a particular flight.
 */

class FlightModel {

	private $userPresent;
	private $num_rows;

	function searchFlights($flightSearchParameters){
		echo "inside database"."</br>";
		echo $flightSearchParameters->getBookingDate();
		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		/*
		 echo "Select fc.flight_class_id, Flight_desc,departure_date,arrival_date,S.A_Name, D.A_Name,Total_cap,
		 No_Of_seats,cost from Airport S, Airport D, flight_class fc join Flight f on FC.FLIGHT_ID = F.FLIGHT_ID where f.Flight_id in
		 (Select schedule_id from Schedule where (To_date('".$flightSearchParameters->getBookingDate()."','MM/DD/YYYY')>= Start_date and To_date('".$flightSearchParameters->getBookingDate()."',
		 'MM/DD/YYYY') <= End_date))and route_id in (Select route_id from route r where R.DESTINATION_AIRPORT_ID =
		 '".$flightSearchParameters->getDestination()."' and R.SOURCE_AIRPORT_ID = '".$flightSearchParameters->getSource()."' ) and S.AIRPORT_ID = '".$flightSearchParameters->getSource()."'
		 and D.AIRPORT_ID = '".$flightSearchParameters->getDestination()."'";
		 */

		$stmt =  oci_parse($conn,"Select fc.flight_class_id, Flight_desc,Class_desc,departure_date,arrival_date,S.A_Name, D.A_Name,Total_cap,
		No_Of_seats,cost,flight_miles from Airport S, Airport D, flight_class fc join Flight f on FC.FLIGHT_ID = F.FLIGHT_ID join Class c on FC.CLASS_ID = C.CLASS_ID where f.Flight_id in 
		(Select schedule_id from Schedule where (To_date('".$flightSearchParameters->getBookingDate()."','DD/MM/YYYY')>= Start_date and To_date('".$flightSearchParameters->getBookingDate()."',
		'DD/MM/YYYY') <= End_date))and route_id in (Select route_id from route r where R.DESTINATION_AIRPORT_ID = 
		'".$flightSearchParameters->getDestination()."' and R.SOURCE_AIRPORT_ID = '".$flightSearchParameters->getSource()."' ) and S.AIRPORT_ID = '".$flightSearchParameters->getSource()."'
		and D.AIRPORT_ID = '".$flightSearchParameters->getDestination()."'");
		echo $stmt;
		oci_execute($stmt);
		oci_close($conn);
		$arrayOfFlights= array();
		while ( $row = oci_fetch_row($stmt)) {
			$flightDetails =  new FlightDetails();
			$flightDetails->setFlightClassId($row[0]);
			$flightDetails->setNumberOfTickets(1);
			$flightDetails->setflightName($row[1]);
			$flightDetails->setclassName($row[2]);
			$flightDetails->setsource($row[5]);
			$flightDetails->setdestination($row[6]);
			$flightDetails->setarrivalTime($row[4]);
			$flightDetails->setdepartureTime($row[3]);
			$flightDetails->setseatsAvailable($row[8]);
			$flightDetails->setfare($row[9]);
			$flightDetails->setFlightMiles($row[10]);
			array_push($arrayOfFlights, $flightDetails);
		}

		return $arrayOfFlights;
	}


	function getFlightDetails($flightClassId){


		ini_set('display_errors', 'On');
		$db = "w4111c.cs.columbia.edu:1521/adb";
		$conn = oci_connect("kpg2108", "test123", $db);
		$stmt =  oci_parse($conn,"Select F.FLIGHT_DESC,C.Class_name,F.DEPARTURE_DATE,F.ARRIVAL_DATE,A.A_NAME,A1.A_NAME,
		FC.COST , F.FLIGHT_MILES ,FC.NO_OF_SEATS from Flight_class fc join flight f on FC.FLIGHT_ID = f.flight_id join class c on fc.class_id = 
		c.class_id join Route r on F.ROUTE_ID = R.ROUTE_ID join airport a on R.DESTINATION_AIRPORT_ID = A.AIRPORT_ID 
		join airport a1 on R.SOURCE_AIRPORT_ID = A1.AIRPORT_ID where FC.FLIGHT_CLASS_ID='$flightClassId'");
		oci_execute($stmt);
		oci_close($conn);
		$flightDetails =  new FlightDetails();
		while ( $row = oci_fetch_row($stmt)) {
			$flightDetails->setFlightClassId($flightClassId);
			$flightDetails->setflightName($row[0]);
			$flightDetails->setclassName($row[1]);
			$flightDetails->setdepartureTime($row[2]);
			$flightDetails->setarrivalTime($row[3]);
			$flightDetails->setdestination($row[4]);
			$flightDetails->setsource($row[5]);
			$flightDetails->setfare($row[6]);
			$flightDetails->setFlightMiles($row[7]);
			$flightDetails->setSeatsAvailable($row[8]);
				
		}
		return $flightDetails;

	}




}
?>

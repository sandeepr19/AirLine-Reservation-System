<?php
/*
 This controller directs the control to a particular model
 depending on the action.
 */

session_start();
include ("../classes/User.php");
include ("../classes/BookingDetails.php");
include ("../classes/FlightSearchParameters.php");
include ("../classes/FlightDetails.php");
include ("../classes/Review.php");
include ("../classes/Passenger.php");
include ("../model/UserAccountModel.php");
include ("../model/BookingModel.php");
include ("../model/FlightModel.php");
include ("../model/ReviewModel.php");

$userModel = new UserAccountModel();
$bookingModel = new BookingModel();
$flightModel= new FlightModel();
$reviewModel = new ReviewModel();

if($_SESSION['action']=="login")
{
	$user = unserialize(($_SESSION['user']));
	$arrayOfBookings = array();
	if($userModel->isUserPresent($user->getLoginId(), $user->getPassword())==true)
	{
		$user = $userModel->getUserInstance($user->getLoginId(), $user->getPassword());
		$_SESSION['userId']=$user->getUserId();
		$_SESSION['userMiles']=$user->getMiles();
		$_SESSION['loginName']=$user->getLoginId();
		$arrayOfBookings=$bookingModel->getBookings($user->getUserId());
		$_SESSION['bookingsArray']=serialize($arrayOfBookings);
		header("Location: ../view/Startup.php");
	}
	else {
		$_SESSION['loginToken']= "invalid";
		header("Location: ../view/Login.php");
	}
}
else if($_SESSION['action']=="home")
{
	unset($_SESSION['lastPurchased']);
	unset($_SESSION['discount']);
	$userId=$_SESSION['userId'];
	$arrayOfBookings=$bookingModel->getBookings($userId);
	$_SESSION['bookingsArray']=serialize($arrayOfBookings);
	header("Location: ../view/Startup.php");
}
else if ($_SESSION['action']=="registerUser")
{
	$user = unserialize($_SESSION['user']);
	echo $user->getLoginId();
	$userId=$userModel->createUser($user);
	if($userId>0)
	{
		$user->setUserId($userId);
		$_SESSION['userId']=$userId;
		$_SESSION['userMiles']=0;
		$_SESSION['loginName']=$user->getLoginId();
		echo " inside controller";
		$arrayOfBookings=$bookingModel->getBookings($user->getUserId());
		$_SESSION['bookingsArray']=serialize($arrayOfBookings);
		header("Location: ../view/Startup.php");
	}else
	{
		session_destroy();
		header("Location: ../view/Error.php");
	}

}
else if ($_SESSION['action']=="displayUser")
{
	$user1=$userModel->getUserForID($_SESSION['userId']);
	$_SESSION['user']=serialize($user1);
	header("Location: ../view/Modification.php");
}
else if ($_SESSION['action']=="searchResults")
{
	$flightSearchParameters=unserialize($_SESSION['flightSearchDetails']);
	$arrayOfFlights=$flightModel->searchFlights($flightSearchParameters);
	$_SESSION['arrayOfFlights']=serialize($arrayOfFlights);
	header("Location: ../view/SearchResults.php");
}
else if ($_SESSION['action']=="cancelTicket")
{
	$isRecordDeleted = $bookingModel->DeleteBookings($_SESSION['ticketToBeCancelled']);
	if($isRecordDeleted>0)
	{
		$arrayOfBookings=$bookingModel->getBookings($_SESSION['userId']);
		$_SESSION['bookingsArray']=serialize($arrayOfBookings);
		header("Location: ../view/Startup.php");
	}else
	{
		session_destroy();
		header("Location: ../view/Error.php");
	}
}
else if ($_SESSION['action']=="bookTicket")
{
	$flightDetails = new FlightDetails();
	$flightDetails1=$flightModel->getFlightDetails($_SESSION['flightClassId']);
	$_SESSION['flightDetailsForBooking']=serialize($flightDetails1);
	header("Location: ../view/BookTicket.php");
}
else if ($_SESSION['action']=="logout")
{
	session_destroy();
	header("Location: ../view/Login.php");
}
else if ($_SESSION['action']=="readReview")
{
	unset($_SESSION['listOfReviews']);
	header("Location: ../view/ReadReviews.php");
}
else if ($_SESSION['action']=="writeReview")
{
	header("Location: ../view/WriteReviews.php");
}
else if ($_SESSION['action']=="displayReview")
{
	$review = unserialize($_SESSION['review']);
	$listOfReviews = $reviewModel->getReview($review->getFlightDescription());
	$_SESSION['listOfReviews']=serialize($listOfReviews);
	header("Location: ../view/ReadReviews.php");
}
else if ($_SESSION['action']=="insertReview")
{
	$review = unserialize($_SESSION['review']);
	$insertToken = $reviewModel->insertReview($review);
	if($insertToken>0)
	{
		$arrayOfBookings=$bookingModel->getBookings($_SESSION['userId']);
		$_SESSION['bookingsArray']=serialize($arrayOfBookings);
		header("Location: ../view/Startup.php");
	}
	else{
		session_destroy();
		header("Location: ../view/Error.php");
	}
}
else if ($_SESSION['action']=="purchaseTicket")
{

	$result=$bookingModel->purchaseTicket();
	if($result>0)
	{
		header("Location: ../view/Confirmation.php");
	}
	else {

		session_destroy();
		header("Location: ../view/Error.php");
	}

}
else if ($_SESSION['action']=="updateUser")
{
	$result=$userModel->updateUser();
	if($result>0)
	{
		$arrayOfBookings=$bookingModel->getBookings($_SESSION['userId']);
		$_SESSION['bookingsArray']=serialize($arrayOfBookings);
		header("Location: ../view/Startup.php");
	}
	else {
		session_destroy();
		header("Location: ../view/Error.php");
	}
}
else if ($_SESSION['action']=="searchFlights")
{
	header("Location: ../view/Search.php");

}
?>
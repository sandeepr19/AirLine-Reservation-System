<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>DPPT Airways</title>

<script type="text/javascript">
function homePage()
{
	document.getElementById("flagForStart").value=true;
	setTimeout("document.startupForm.submit()", 300);	
	
}
function bookTicket()
{
	document.getElementById("flagForBook").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}
function editProfile()
{
	document.getElementById("flagForEditProfile").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}

function cancelTicket()
{
	document.getElementById("flagForCancelTicket").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}


function logOut()
{
	document.getElementById("flagForLogout").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}


function searchFlights()
{
	document.getElementById("flagForSearch").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}




function readReview()
{
	document.getElementById("flagForReadReview").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}

function writeReview()
{
	document.getElementById("flagForWriteReview").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}
</script>




</head>

<?php 
session_start();
?>
<body bgcolor="#EDFBFE">

<table cellpadding="0" cellspacing="2" width="100%">
	<tr>
		<td>

		<div
			style="float: left; display: inline; padding-top: 00px; padding-left: 00px">
		<img src="DPPT.jpg" style="height: 75px; width: 200px"></div>
		<div
			style="float: left; display: inline; padding-top: 30px; padding-left: 10px">
		<div class="siteTitle"></div>
		</div>
		<div
			style="float: left; display: inline; padding-top: 45px; padding-left: 30px">
		<div class="a:link" style="float: Right;">Welcome,<?php echo $_SESSION['loginName']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="editProfile();">Edit Profile</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="homePage();" >Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="searchFlights();">Search</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="readReview();">Read Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="writeReview();">Write Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="logOut();">Log out</a>
		</div>
		</div>
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		<br />
		</td>
	</tr>
</table>
<?php
include ("../classes/FlightDetails.php");
if(array_key_exists('flagForStart', $_REQUEST) &&  $_REQUEST['flagForStart'])
{
	$_SESSION['action']="home";
	header("Location: ../controller/Controller.php");
}
else if(array_key_exists('flagForEditProfile', $_REQUEST) && $_REQUEST['flagForEditProfile'])
{
	$_SESSION['action']="displayUser";
	header("Location: ../controller/Controller.php");
}
else if(array_key_exists('flagForCancelTicket', $_REQUEST) && $_REQUEST['flagForCancelTicket'])
{
	$_SESSION['ticketToBeCancelled']=$_REQUEST['ticketId'];
	$_SESSION['action']="cancelTicket";
	header("Location: ../controller/Controller.php");
}
else if(array_key_exists('flagForLogout', $_REQUEST) && $_REQUEST['flagForLogout'])
{
	
	$_SESSION['action']="logout";
	header("Location: ../controller/Controller.php");
}
else if(array_key_exists('flagForReadReview', $_REQUEST) && $_REQUEST['flagForReadReview'])
{
	$_SESSION['action']="readReview";
	header("Location: ../controller/Controller.php");
}
else if(array_key_exists('flagForWriteReview', $_REQUEST) && $_REQUEST['flagForWriteReview'])
{
	$_SESSION['action']="writeReview";
	header("Location: ../controller/Controller.php");
}
else if(array_key_exists('flagForSearch', $_REQUEST) &&  $_REQUEST['flagForSearch'])
{
	$_SESSION['action']="searchFlights";
	header("Location: ../controller/Controller.php");
}

else if(array_key_exists('flagForBack', $_REQUEST) && $_REQUEST['flagForBack'])
{
	$_SESSION['action']="goBack";
	header("Location: ../controller/Controller.php");
	
}
else if(array_key_exists('flagForBook', $_REQUEST) && $_REQUEST['flagForBook'])
{
	if($_REQUEST['flightClassId']=='')
	{
		echo "Please select a ticket";
	}
	else
	{
		$_SESSION['action']="bookTicket";
		$_SESSION['flightClassId']=$_REQUEST['flightClassId'];
		header("Location: ../controller/Controller.php");
	}
}

?>

<center><img src="rv2.jpg"></center>

<form action="" theme="simple" method="POST" name="startupForm">
	<input type="hidden" name="flagForBook" id="flagForBook" />
	<input type="hidden" name ="flagForStart" id="flagForStart"/>
	<input type="hidden" name="flagForEditProfile" id="flagForEditProfile"/>
	<input type="hidden" name="flagForCancelTicket" id="flagForCancelTicket"/>
	<input type="hidden" name="flagForLogout" id="flagForLogout"/>
	<input type="hidden" name="flagForSearch" id="flagForSearch"/>
	<input type="hidden" name="flagForReadReview" id="flagForReadReview"/>
	<input type="hidden" name="flagForWriteReview" id="flagForWriteReview"/>
<table border="1" class="tableborder1" align="center" width="50%">

	<tr>
		<th class="topheaderbkg1" colspan="10">Booking Details</th>
	</tr>


	<tr>
		<th class="topheaderbkg1" width=10%><nobr></nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Flight Name</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Class Name</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Source</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Destination</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Arrival Time </nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Departure Time</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Fare </nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Miles to be earned</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Seats Available</nobr></th>
	</tr>

	<?php

	$arrayOfFlights = unserialize( $_SESSION['arrayOfFlights']);
	foreach($arrayOfFlights as $value)
	{
		?>
	<tr>
		<td><input type="radio" name="flightClassId"
			value='<?php echo $value->getFlightClassId(); ?>'></td>
		<td><?php echo $value->getFlightName(); ?></td>
		<td><?php echo $value->getClassName(); ?></td>
		<td><?php echo $value->getSource(); ?></td>
		<td><?php echo $value->getDestination(); ?></td>
		<td><?php echo $value->getArrivalTime(); ?></td>
		<td><?php echo $value->getDepartureTime(); ?></td>
		<td><?php echo $value->getFare(); ?></td>
		<td><?php echo $value->getFlightMiles(); ?></td>
		<td><?php echo $value->getSeatsAvailable(); ?></td>
	</tr>
	<?php
	}
	?>





	<tr>
		<td colspan="10" align="center">
		<input type="submit" name="Book "value="Book" class="inputbutton1" onclick="bookTicket()" /> 
		</td>
	</tr>

</table>



</form>

</body>

</html>

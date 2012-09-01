<html>
<head>
<link href="Style.css" rel="stylesheet" type="text/css" />
<title>Startup</title>
<script type="text/javascript">
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
	document.getElementById("flagForLogOut").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}


function searchFlights()
{
	document.getElementById("flagForSearch").value=true;
	setTimeout("document.startupForm.submit()", 300);	
}


function logout()
{
	document.getElementById("flagForLogout").value=true;
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

<body bgcolor="#EDFBFE">
<?php
session_start();
include ("../classes/User.php");
include ("../classes/BookingDetails.php");
if(array_key_exists('flagForEditProfile', $_REQUEST) && $_REQUEST['flagForEditProfile'])
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
?>


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
		<a href="#" onclick="editProfile();">Edit Profile</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="searchFlights();">Search</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="readReview();">Read Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="writeReview();">Write Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp
		<a href="Logout.php">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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

<form action="" theme="simple" method="POST" name="startupForm">
<input type="hidden" name="flagForEditProfile" id="flagForEditProfile"/>
<input type="hidden" name="flagForCancelTicket" id="flagForCancelTicket"/>
<input type="hidden" name="flagForLogout" id="flagForLogout"/>
<input type="hidden" name="flagForSearch" id="flagForSearch"/>
<input type="hidden" name="flagForReadReview" id="flagForReadReview"/>
<input type="hidden" name="flagForWriteReview" id="flagForWriteReview"/>




<table border="1" class="tableborder1" align="center">
	<tr >
	<td colspan="9">
		<b>You have <?php echo $_SESSION['userMiles'] ?> miles</b>
	</td>
	<tr>
		<th class="topheaderbkg1" colspan="9">Booking Details</th>
	</tr>
	<tr>
		<th class="topheaderbkg1" width=5%></th>
		<th class="topheaderbkg1" width=10%><nobr>Flight Name</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Journey Class Name</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Booking Date </nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Journey Date</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>From</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>To</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Ticket Price</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Ticket Miles</nobr></th>
	</tr>
<?php 
	$bookingsArray = unserialize( $_SESSION['bookingsArray']);
	foreach($bookingsArray as $value)
{
?>
	<tr>
		<td><input type="radio" name="ticketId" value='<?php echo $value->getTicketId(); ?>'></td>
		<td><?php echo $value->getFlightName(); ?></td>
		<td><?php echo $value->getClassName(); ?></td>
		<td><?php echo $value->getBookingDate(); ?></td>
		<td><?php echo $value->getDepartureDate(); ?></td>
		<td><?php echo $value->getSource(); ?></td>
		<td><?php echo $value->getDestination(); ?></td>
		<td><?php echo $value->getFare(); ?></td>
		<td><?php echo $value->getTicketMiles(); ?></td>
	</tr>
<?php 
}
?>
	<tr>
		<td colspan="9" align="center"><input type="submit" name="Cancel"
			value="Cancel Ticket" class="inputbutton1" onclick="cancelTicket();"/></td>
	</tr>
</table>
</form>
</body>
</html>

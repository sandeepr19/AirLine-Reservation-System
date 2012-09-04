<html><head><meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">

<link href="style.css" rel="stylesheet" type="text/css">
<title>Buy Ticket</title>

<script>
function cancelOperation()
{
	var r=confirm("Are you sure you want to cancel");
	if (r==true)
	  {
		document.getElementById("flagForCancel").value=true;
		setTimeout("document.startupForm.submit()", 300);	
	  }
	else
	  {
	  
	  }
	
}

</script>

</head>

<body>
<?php 
session_start();
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
		<div class="a:link" style="float: Right;">
		Welcome,<?php echo $_SESSION['loginName']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
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
<center><img src="rv3.jpg"></center>	
<form action= '' theme="simple" method="POST" name ="startupForm">
<input type="hidden" name="flagForCancel" id="flagForCancel"/>
<?PHP
		require_once "formvalidator.php";
		include ("../classes/User.php");
		include ("../classes/FlightDetails.php");
		include ("../classes/Passenger.php");
		$flightDetails=unserialize($_SESSION['flightDetailsForBooking']);
		if(array_key_exists('flagForCancel', $_REQUEST) &&  $_REQUEST['flagForCancel']==true)
			{
			$_SESSION['action']="home";
			header("Location: ../controller/Controller.php");
			}
		if(isset($_POST['Purchase']))
		{
			$validator = new FormValidator();
			$validator->addValidation("firstName","alpha","Please fill only aplphabets for first name");
			$validator->addValidation("firstName","req","Please fill in first name");
			$validator->addValidation("lastName","req","Please fill in last name");
			$validator->addValidation("lastName","alpha","Please fill only alphabets for last name");
			$validator->addValidation("age","req","Please fill in phone number");
			$validator->addValidation("age","numeric","Please fill only numeric values for phone number");
			if($validator->ValidateForm())
			{
				
	   			$_SESSION['action']="purchaseTicket";
	   			$var =$_SESSION['userMiles'] + $flightDetails->getFlightMiles();
	   			$_SESSION['userMiles']=$var;
	   			$_SESSION['modeOfPayment']=$_REQUEST['modeOfPayment'];
	   			$passenger = new Passenger();
	   			$passenger->setage($_REQUEST['age']);
	   			$passenger->setfname($_REQUEST['firstName']);
	   			$passenger->setlname($_REQUEST['lastName']);
	   			$_SESSION['passengerDetails']=serialize($passenger);
	   			header("Location: ../controller/Controller.php");
	   		}
			else
			{
				echo "<B>Validation Errors:</B>";

				$error_hash = $validator->GetErrors();
				foreach($error_hash as $inpname => $inp_err)
				{
					echo "<p>$inpname : $inp_err</p>\n";
				}
			}
		}
		$disp_firstName  = isset($_POST['firstName'])?$_POST['firstName']:'';
		$disp_lastName = isset($_POST['lastName'])?$_POST['lastName']:'';
		$disp_age = isset($_POST['age'])?$_POST['age']:'';
		
		
?>

<table class="tableborder1" align="center" width="50%" border="1">
	<tbody><tr>
		<td>
			<table align="center" width="100%" border="1">
				<tbody><tr>
					<th class="topheaderbkg1" colspan="4">
					Flight Details</th>
				</tr>
				<tr>
					<td class="tdBookTickets">Flight Name</td>
					<td><?php echo $flightDetails->getFlightName()?></td>
				</tr>
				<tr>
					<td class="tdBookTickets">Class</td>
					<td><?php echo $flightDetails->getClassName()?></td>
				</tr>
				<tr>
					<td class="tdBookTickets">Source</td>
					<td><?php echo $flightDetails->getSource()?></td>
				</tr>				
				<tr>
					<td class="tdBookTickets">Destination</td>
					<td><?php echo $flightDetails->getDestination()?></td>					
				</tr>
				<tr>
					<td class="tdBookTickets">Departure Time</td>
					<td><?php echo $flightDetails->getDepartureTime()?></td>
				</tr>
				<tr>	
					<td class="tdBookTickets">Arrival Time</td>
					<td><?php echo $flightDetails->getArrivalTime()?></td>
				</tr>
				
				<tr>	
					<td class="tdBookTickets">Flight Miles</td>
					<td><?php echo $flightDetails->getFlightMiles()?></td>
				</tr>
				
			</tbody></table>
		</td>
	</tr>
	<tr>
		<td>
			<table align="center" width="100%" border="1">
				<tbody><tr>
					<th class="topheaderbkg" colspan="4">
						Passenger Details</th>
				</tr>
				<tr>
					<td class="tdBookTickets">First Name</td>
					<td>
						<input type="text" name="firstName" maxlength="20"  '<?php echo htmlentities($disp_firstName) ?>'>
					</td>
				</tr>
				
				<tr>
					<td class="tdBookTickets">Last Name</td>
					<td>
						<input type="text" name="lastName" maxlength="20" '<?php echo htmlentities($disp_lastName) ?>'>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Age</td>
					<td>
						<input type="text" name="age" maxlength= "2" ='<?php echo htmlentities($disp_age) ?>'>
					</td>
				</tr>
				
			</tbody></table>
		</td>
	</tr>
	<tr>
		<td>
			<table align="center" width="100%" border="1">
				<tbody><tr>
					<th class="topheaderbkg" colspan="4">Fare Details</th>
				</tr>
				<tr>
					<td class="tdBookTickets">Flight Ticket Price</td>
					<td>
						<?php echo $flightDetails->getFare()?>
					</td>
				</tr>
				
				<tr>
					<td class="tdBookTickets">User Miles</td>
					<td>
						<?php echo $_SESSION['userMiles']?>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Discount</td>
					<td>
						<?php 
						
						if($_SESSION['action']!='purchaseTicket' &&$_SESSION['action']!='home')
						{
						if(($_SESSION['userMiles'])>=1000)
						{
							$_SESSION['userMiles']=$_SESSION['userMiles']-1000;
							$_SESSION['discount']=10;
						}
						else 
						{
							
							$_SESSION['discount']=0;
						}
						$_SESSION['lastPurchased']=$flightDetails->getFare()-(($flightDetails->getFare()*$_SESSION['discount'])/100);
						echo $_SESSION['discount'];
						}
						?>	%
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Discounted Flight Ticket Price</td>
					<td>
						<?php echo $_SESSION['lastPurchased']?>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Mode Of Payment</td>
					<td>
					
						<select name="modeOfPayment">
						<option value="Debit Card">Debit card</option>
						<option value="Credit Card">Credit card</option>
						</select>
					</td>
				</tr>
				
			</tbody></table>
		</td>
	</tr>
	<tr>
		<td align="center">	
			<input type="submit" name="Purchase" value="Purchase" class="inputbutton1">		
			<input type="button" name="Cancel" value="Cancel" onclick="cancelOperation();" class="inputbutton1">
		</td>
	</tr>
	</tbody></table>		
	
		
	
</form>

</body></html>
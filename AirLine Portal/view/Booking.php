<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<link href="style.css" rel="stylesheet" type="text/css" />
<title>DPPT Airways</title>
<script language="JavaScript" src="gen_validatorv31.js" type="text/javascript"></script>
</head>
<body>
<table cellpadding="0" cellspacing="2"  width="100%">
	<tr>
		<td>

		<div
			style="float: left; display: inline; padding-top: 00px; padding-left: 00px">
		<img src="DPPT.jpg" style="height: 75px; width: 200px">
		</div>
		<div
			style="float: left; display: inline; padding-top: 30px; padding-left: 10px">
		<div class="siteTitle">DPPT Airlines</div>
		</div>
		<div
			style="float: left; display: inline; padding-top: 45px; padding-left: 30px">
		<div class="a:link" style="float: Right;">
		Welcome, &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<a href="updateregistration.do">Edit Profile</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="SearchFlights.jsp">Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="logout.do">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		</div>
		</div>
		<br/><br/><br/><br/><br/><br/><br/></td>
	</tr>
	</table>
<center><img src="rv3.jpg"></center>
<form action="Booking" theme="simple" name='bookingDetails' method="POST">

<table class="tableborder1" align="center" width="50%" border="0">
	<tr>
		<td>
			<table align="center" width="100%" border="1">
				<tr>
					<th class="topheaderbkg" colspan="4">
					Flight Details</th>
				</tr>
				<tr>
					<td class="tdBookTickets">Flight Id</td>
					<td></td>
				</tr>
				<tr>
					<td class="tdBookTickets">Flight Number</td>
					<td>A-</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Journey Date</td>
					<td></td>
				</tr>				
				<tr>
					<td class="tdBookTickets">Flight Name</td>
					<td></td>					
				</tr>
				
				<tr>
					<td class="tdBookTickets">Departure Time</td>
					<td></td>
				</tr>
				<tr>	
					<td class="tdBookTickets">Arrival Time</td>
					<td></td>
				</tr>
				<tr>
					<td class="tdBookTickets">Flight Journey in miles</td>
					<td></td>
				</tr>
				<tr>
					<td class="tdBookTickets">Fare per seat(Business)</td>
					<td></td>
				</tr>
				<tr>
					<td class="tdBookTickets">Fare per seat(Economy)</td>
					<td></td>
				</tr>
				<tr>
					<td class="tdBookTickets">Travel Class</td>
					<td>
					
						<SELECT NAME="travelClass">
						<option>Business</option>
						<option>Economy</option>
						</SELECT>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Discount</td>
					<td>
						
					</td>
				</tr>
				
				<tr>
					<td class="tdBookTickets">Taxes</td>
					<td>
						
					</td>
				</tr>
				
				<tr>
				
					<td>
						<label style="font-size:15px">Redeem Points</label>&nbsp;&nbsp;<input type="checkbox" name='redeemPoints'/>							
					</td>
					
					
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>
		
			<table  align="center" width="100%" border="0">
				<tr>
					<th class="topheaderbkg" colspan="4">
						Lead Passenger Details</th>
				</tr>
				<tr>
					<td class="tdBookTickets">First Name</td>
					<td>
						<input type="text" name='passenger fname' maxlength="20"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Middle Name</td>
					<td>
						<input type="text" name='passengermname' maxlength="20"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Last Name</td>
					<td>
						<input type="text" name='passenger<%=i%>lname' maxlength="20"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				
				<tr>
					<td class="tdBookTickets">Mobile Number</td>
					<td>
						<input type="text" name='passenger<%=i%>mobileNo' maxlength="10"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Email Address</td>
					<td>
						<input type="text" name='passenger<%=i%>email' maxlength="35"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
			</table>
				
			<table  align="center" width="100%" border="0">
				<tr>
					<th class="topheaderbkg" colspan="4">
						Accompanying Passenger - <%=i %>    Details</th>
				</tr>
				<tr>
					<td class="tdBookTickets">First Name</td>
					<td>
						<input type="text" name='passenger<%=i%>fname'maxlength="20"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Middle Name</td>
					<td>
						<input type="text" name='passenger<%=i%>mname' maxlength="20"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Last Name</td>
					<td>
						<input type="text" name='passenger<%=i%>lname'maxlength="20"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				
				<tr>
					<td class="tdBookTickets">Mobile Number</td>
					<td>
						<input type="text" name='passenger<%=i%>mobileNo' maxlength="10"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
				<tr>
					<td class="tdBookTickets">Email Address</td>
					<td>
						<input type="text" name='passenger<%=i%>email' maxlength="35"/>&nbsp;&nbsp;<font color='red'>*</font>
					</td>
				</tr>
			</table>
			
			
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
	</tr>
	<tr>
		<td>	
			<table  align="center" width="100%" border="0" >
				
				<tr>
				
					<td>						
						<input type="submit"  name="proceed" value="Proceed to Purchase" onClick="return confirm('Do you want to proceed to purchase?');" class="inputbutton1"/>
					</td>
					
					<td>						
						<input type="button"  name="back" value="Back to Search" onClick="javascript:window.location='search.jsp'" class="inputbutton1"/>
					</td>
				</tr>	
			</table>
		</td>
	</tr>
	</table>		
	
		
	
</form>



</script>

</body>

</html>
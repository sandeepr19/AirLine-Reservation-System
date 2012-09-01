<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Search Flight</title>
<script>
function editProfile()
{
	document.getElementById("flagForEditProfile").value=true;
	setTimeout("document.readReviewsForm.submit()", 300);	
	
}

function logOut()
{
	document.getElementById("flagForLogOut").value=true;
	setTimeout("document.readReviewsForm.submit()", 300);	
}

function homePage()
{
	document.getElementById("flagForHome").value=true;
	setTimeout("document.readReviewsForm.submit()", 300);	
}

function searchFlights()
{
	document.getElementById("flagForSearch").value=true;
	setTimeout("document.readReviewsForm.submit()", 300);	
}

function writeReview()
{
	document.getElementById("flagForWriteReview").value=true;
	setTimeout("document.readReviewsForm.submit()", 300);	
}
</script>

</head>


<body bgcolor="#EDFBFE">

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
		Welcome,<?php echo $_SESSION['loginName']?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="editProfile();">Edit Profile</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="homePage();" >Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="searchFlights();">Search</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="writeReview();">Write Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="logOut();">Log out</a>
		<?php 


			?> </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
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
			<?PHP
			
			require_once "formvalidator.php";
			include ("../classes/Review.php");
			
			if(array_key_exists('flagForHome', $_REQUEST) &&  $_REQUEST['flagForHome'])
			{
			$_SESSION['action']="home";
			header("Location: ../controller/Controller.php");
			}else if(array_key_exists('flagForLogOut', $_REQUEST) &&  $_REQUEST['flagForLogOut'])
			{
			$_SESSION['action']="logout";
			header("Location: ../controller/Controller.php");
			}else if(array_key_exists('flagForEditProfile', $_REQUEST) &&  $_REQUEST['flagForEditProfile'])
			{
			$_SESSION['action']="displayUser";
			header("Location: ../controller/Controller.php");
			}
			else if(array_key_exists('flagForSearch', $_REQUEST) &&  $_REQUEST['flagForSearch'])
			{
			$_SESSION['action']="searchFlights";
			header("Location: ../controller/Controller.php");
			}
			
			else if(array_key_exists('flagForWriteReview', $_REQUEST) && $_REQUEST['flagForWriteReview'])
			{
			$_SESSION['action']="writeReview";
			header("Location: ../controller/Controller.php");
			}
			else 
			{
			if(isset($_POST['Search']))
			{
				$review = new Review();
				$review->setFlightDescription($_REQUEST['flightDescription']);
				$_SESSION['review']=serialize($review);
				$_SESSION['action']='displayReview';
				header("Location: ../controller/Controller.php");
			}


			?>

<form action="" theme="simple" method="POST" name="readReviewsForm">
<input type="hidden" name ="flagForHome" id="flagForHome"/>
<input type="hidden" name ="flagForLogOut" id="flagForLogOut"/>
<input type="hidden" name ="flagForSearch" id="flagForSearch"/>
<input type="hidden" name ="flagForEditProfile" id="flagForEditProfile"/>
<input type="hidden" name="flagForWriteReview" id="flagForWriteReview"/>

<table class="tableborder1" align="center">
	<tr>
		<th class="topheaderbkg" colspan="4">
		<center>Search for reviews</center>
		</th>
	</tr>
	<tr>
		<td><label>Flight </label></td>
		<td><select name="flightDescription">
			<option value="AIR INDIA">AIR INDIA</option>
			<option value="AIR CANADA">AIR CANADA</option>
			<option value="BRITISH AIRWAYS">BRITISH AIRWAYS"</option>
			<option value="US Airways">US Airways</option>
			<option value="AIR AUSTRALIA">AIR AUSTRALIA</option>
			<option value="AIR GERMANY">AIR GERMANY</option>
			<option value="AIR SRILANKA">AIR SRILANKA</option>
			<option value="AIR CHINA">AIR CHINA</option>
			<option value="US Airways">US Airways</option>
			<option value="AIR FRANCE">AIR FRANCE</option>
		</select></td>
	</tr>
	<tr>
		<td colspan="4">
		<table align="center">
			<tr>
				<td><input type="submit" name="Search" value="Search" align="center"
					class="inputbutton1" /></td>
				<td><input type="reset" value="Reset" align="center"
					class="inputbutton1" /></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

</br>
</br>
</br>
<table border="1" class="tableborder1" align="center" width="50%">


	<tr>
		<th class="topheaderbkg1" colspan="3">Review Details</th>
	</tr>


	<tr>
		<th class="topheaderbkg1" width=10%><nobr>Flight Name</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Review Description</nobr></th>
		<th class="topheaderbkg1" width=10%><nobr>Travel Date</nobr></th>

	</tr>
<?php

if(isset($_SESSION['listOfReviews']))
{
	$listOfReviews=unserialize($_SESSION['listOfReviews']);
	foreach($listOfReviews as $value)
	{
		?>
	<tr>
		<td><?php echo $value->getFlightDescription() ?></td>
		<td><?php echo $value->getReviewDescription() ?></td>
		<td><?php echo $value->getTravelDate() ?></td>

	</tr>
	<?php
	}
}
}
?>
			
</table>
</form>
		

</body>

</html>

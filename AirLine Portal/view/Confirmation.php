<html>
<head>
<link href="style.css" rel="stylesheet" type="text/css" />
<title>Confirmation</title>
<script>
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
		<a href="#" onclick="logOut();">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</div>
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
			
			if(array_key_exists('flagForHome', $_REQUEST) &&  $_REQUEST['flagForHome']==true)
			{
			if(isset($_SESSION['currentTicketCost']))
			{
				unset($_SESSION['currentTicketCost']);
			}
			$_SESSION['action']="home";
			header("Location: ../controller/Controller.php");
			}else if(array_key_exists('flagForLogOut', $_REQUEST) &&  $_REQUEST['flagForLogOut'])
			{
			$_SESSION['action']="logout";
			header("Location: ../controller/Controller.php");
			}
?>
<center><img src="rv4.jpg"></center>
<form action="" theme="simple" method="POST" name="readReviewsForm">
<input type="hidden" name ="flagForHome" id="flagForHome"/>
<input type="hidden" name ="flagForLogOut" id="flagForLogOut"/>
<table class="tableborder1" align="center">
	<tr>
		<th class="topheaderbkg" colspan="4">
		<center>Flight Confirmation</center>
		</th>
	</tr>
	<tr>
		<td><label>Your confirmation number is <?php echo rand()?> </label></td>
	</tr>
	<tr>
		<td><label>Your total amount is <?php echo $_SESSION['lastPurchased']?> </label></td>
	</tr>
		<td colspan="4">
		<table align="center">
			<tr>
				<td><input type="button" name="Home" value="Home" align="center" onclick="homePage();"
					class="inputbutton1" /></td>
			</tr>
		</table>
		</td>
	</tr>
</table>

</form>
		

</body>

</html>

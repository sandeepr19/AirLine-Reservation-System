<html>
<head>
<link href="style.css" rel="stylesheet"	type="text/css" />
<title>Search Flight</title>

<script>
function editProfile()
{
	document.getElementById("flagForEditProfile").value=true;
	setTimeout("document.searchFlightForm.submit()", 300);	
}
function logOut()
{
	document.getElementById("flagForLogOut").value=true;
	setTimeout("document.searchFlightForm.submit()", 300);	
}

function homePage()
{
	document.getElementById("flagForHome").value=true;
	setTimeout("document.searchFlightForm.submit()", 300);	
}
function searchFlights()
{
	document.getElementById("flagForSearch").value=true;
	setTimeout("document.searchFlightForm.submit()", 300);	
}
function readReview()
{
	document.getElementById("flagForReadReview").value=true;
	setTimeout("document.searchFlightForm.submit()", 300);	
}
</script>


</head>


<body bgcolor="#EDFBFE">

<?php 
session_start();
?>

<table cellpadding="0" cellspacing="2"  width="100%">
	<tr>
		<td>

		<div
			style="float: left; display: inline; padding-top: 00px; padding-left: 00px">
		<img src="DPPT.jpg" style="height: 75px; width: 200px">
		</div>
		<div
			style="float: left; display: inline; padding-top: 30px; padding-left: 10px">
		<div class="siteTitle"></div>
		</div>
		<div
			style="float: left; display: inline; padding-top: 45px; padding-left: 30px">
		<div class="a:link" style="float: Right;">
		Welcome,<?php echo $_SESSION['loginName']?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		
		<a href="#" onclick="editProfile();">Edit Profile</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="homePage();" >Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="searchFlights();">Search</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="readReview();">Read Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="logOut();">Log out
		<?php 
		
		
		?>
		</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		</div>
		</div>
		<br/><br/><br/><br/><br/><br/><br/></td>
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
		else if(array_key_exists('flagForReadReview', $_REQUEST) && $_REQUEST['flagForReadReview'])
		{
			$_SESSION['action']="readReview";
			header("Location: ../controller/Controller.php");
		}
		
		$show_form=true;
		if(isset($_POST['Write']))
		{
			$validator = new FormValidator();
			$validator->addValidation("journeyDate","req","Please select a journey date");
			$validator->addValidation("reviewDescription","req","Please enter a review description");
		
			
			if($validator->ValidateForm() )
			{
				$review = new Review();
				$review->setFlightId($_REQUEST['flightId']);
				$review->setTravelDate($_REQUEST['journeyDate']);
				$review->setReviewDescription($_REQUEST['reviewDescription']);
				$_SESSION['review']=serialize($review);
				$_SESSION['action']="insertReview";
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
		
		$disp_journeyDate = isset($_POST['journeyDate'])?$_POST['journeyDate']:'';
		$disp_reviewDescription = isset($_POST['reviewDescription'])?$_POST['reviewDescription']:'';
		
			?>

<form action="" theme="simple" method="POST" name="searchFlightForm">
<input type="hidden" name ="flagForHome" id="flagForHome"/>
<input type="hidden" name ="flagForLogOut" id="flagForLogOut"/>
<input type="hidden" name ="flagForEditProfile" id="flagForEditProfile"/>
<input type="hidden" name ="flagForSearch" id="flagForSearch"/>
<input type="hidden" name="flagForReadReview" id="flagForReadReview"/>
</div>
	<table class="tableborder1" align="center">
		<tr>
			<th class="topheaderbkg" colspan="4"><center>Write Reviews</center></th>
		</tr>
		<tr>
		<td><label>Flight </label></td>
		<td><select name="flightId">
			<option value="1">AIR INDIA</option>
			<option value="2">AIR CANADA</option>
			<option value="3">BRITISH AIRWAYS"</option>
			<option value="4">US Airways</option>
			<option value="5">AIR AUSTRALIA</option>
			<option value="6">AIR GERMANY</option>
			<option value="7">AIR SRILANKA</option>
			<option value="8">AIR CHINA</option>
			<option value="9">US Airways</option>
			<option value="10">AIR FRANCE</option>
		</select></td>
	</tr>
		<tr>
			<td>Date of Journey</td>
			<td><input type="text"	name="journeyDate" onfocus="this.blur()" value='<?php echo htmlentities($disp_journeyDate) ?>' readonly />
			&nbsp; </td>
			
	   <td>
 			<input type="hidden" class="plain" name="dc1" value="" size="12" onfocus="this.blur()" readonly><a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fStartPop(document.searchFlightForm.dc1,document.searchFlightForm.journeyDate);return false;" ></a>
			<input type="hidden" name="comparisonFlag" id="comparisonFlag"/>
	
			<a href="javascript:void(0)" onclick="if(self.gfPop)gfPop.fEndPop(document.searchFlightForm.dc1,document.searchFlightForm.journeyDate);return false;" ><img class="PopcalTrigger" align="absmiddle" src="DateRange/calbtn.gif" width="34" height="22" border="0" alt=""></a>
 			<iframe width=132 height=142 name="gToday:contrast:agenda.js" id="gToday:contrast:agenda.js" src="DateRange/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;">
			</iframe>
		</td>
		</tr>
		<tr>
		<td>Review</td>
		<td>
			<textarea name="reviewDescription" rows="6" cols="18"><?php echo htmlentities($disp_reviewDescription) ?></textarea>
		</td>
				</tr>
			</table>
			</td>
		</tr>
		<tr>
			<td colspan="4">
			<table align="center">
				<tr>
					<td><input type="submit" name="Write" value="Write" align="center" class="inputbutton1" /></td>
					<td><input type="reset" value="Reset" align="center" class="inputbutton1"/></td>
				</tr>
			</table>
			</td>
		</tr>
	</table>
	
	</form>
	
	
<?PHP
		
?>
</body>

</html>
<html>
<head>

<link href="style.css" rel="stylesheet"
	type="text/css" />
	
<script type="text/javascript">
function searchFlights()
{
	document.getElementById("flagForSearch").value=true;
	setTimeout("document.userModification.submit()", 300);	
}

function logOut()
{
	document.getElementById("flagForLogOut").value=true;
	setTimeout("document.userModification.submit()", 300);	
}

function homePage()
{
	document.getElementById("flagForHome").value=true;
	setTimeout("document.userModification.submit()", 300);	
}
function readReview()
{
	document.getElementById("flagForReadReview").value=true;
	setTimeout("document.userModification.submit()", 300);
}

function writeReview()
{
	document.getElementById("flagForWriteReview").value=true;
	setTimeout("document.userModification.submit()", 300);
}
</script>
</head>
<body>
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
		<a href="#" onclick="homePage();">Home Page</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		<a href="#" onclick="searchFlights();">Search</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="readReview();">Read Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="writeReview();">Write Reviews</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
		<a href="#" onclick="logOut();">Log out</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
		</div>
		</div>
		<br/><br/><br/><br/><br/><br/><br/></td>
	</tr>
	</table>


<table border="0" align="center">
<tr><td>
<form action="" theme="simple"  name="userModification" method="POST">
<input type="hidden" name ="flagForHome" id="flagForHome"/>
<input type="hidden" name ="flagForLogOut" id="flagForLogOut"/>
<input type="hidden" name ="flagForSearch" id="flagForSearch"/>
<input type="hidden" name="flagForReadReview" id="flagForReadReview"/>
<input type="hidden" name="flagForWriteReview" id="flagForWriteReview"/>
		<?PHP
		
		require_once "formvalidator.php";
		include ("../classes/User.php");
		$user1=unserialize($_SESSION['user']);
		$show_form=true;
		if(array_key_exists('flagForHome', $_REQUEST) &&  $_REQUEST['flagForHome']==true)
			{
			$_SESSION['action']="home";
			header("Location: ../controller/Controller.php");
			}else if(array_key_exists('flagForLogOut', $_REQUEST) &&  $_REQUEST['flagForLogOut'])
			{
			$_SESSION['action']="logout";
			header("Location: ../controller/Controller.php");
			}else if(array_key_exists('flagForSearch', $_REQUEST) &&  $_REQUEST['flagForSearch'])
			{
			$_SESSION['action']="searchFlights";
			header("Location: ../controller/Controller.php");
			}else if(array_key_exists('flagForReadReview', $_REQUEST) && $_REQUEST['flagForReadReview'])
			{
			$_SESSION['action']="readReview";
			header("Location: ../controller/Controller.php");
			}
			else if(array_key_exists('flagForWriteReview', $_REQUEST) && $_REQUEST['flagForWriteReview'])
			{
			$_SESSION['action']="writeReview";
			header("Location: ../controller/Controller.php");
			}
		if(isset($_POST['Update']))
		{
			$validator = new FormValidator();
			$validator->addValidation("loginName","req","Please fill in login name");
			$validator->addValidation("loginName","alnum","Please fill only alphanumeric characters for login name.");
			$validator->addValidation("firstName","req","Please fill in first name");
			$validator->addValidation("firstName","alpha","Please fill only aplphabets for first name");
			$validator->addValidation("lastName","req","Please fill in last name");
			$validator->addValidation("lastName","alpha","Please fill only alphabets for last name");
			$validator->addValidation("address","req","Please fill in address");
			$validator->addValidation("phoneNo","req","Please fill in phone number");
			$validator->addValidation("phoneNo","numeric","Please fill only numeric values for phone number");
			$validator->addValidation("passwordRecoveryQues","req","Please fill in password recovery question");
			$validator->addValidation("passwordRecoveryAns","req","Please fill in password recovery answer");
			$validator->addValidation("email","email","The input for email should be a valid email value");
			$validator->addValidation("email","req","Please fill in email");
			if($validator->ValidateForm())
			{
				
	   			$_SESSION['action']="updateUser";
	   			$user = new User();
	   			$user->setUserId($_SESSION['userId']);
				$user->setLoginId($user1->getLoginId());
				$user->setPassword($_REQUEST["password"]);
				$user->setFirstName($_REQUEST["firstName"]);
				$user->setLastName($_REQUEST["lastName"]);
				$user->setEmailId($_REQUEST["email"]);
				$user->setAddress($_REQUEST["address"]);
				$user->setPhoneNumber($_REQUEST["phoneNo"]);
				$user->setSecurityAnswer($_REQUEST["passwordRecoveryQues"]);
				$user->setSecurityQuestion($_REQUEST["passwordRecoveryAns"]);
				$_SESSION['userToBeUpdated']=serialize($user);
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
		
		$disp_loginName  = isset($_POST['loginName'])?$_POST['loginName']:$user1->getLoginId();
		$disp_password = isset($_POST['password'])?$_POST['password']:$user1->getPassword();
		$disp_firstName = isset($_POST['firstName'])?$_POST['firstName']:$user1->getFirstName();
		$disp_lastName  = isset($_POST['lastName'])?$_POST['lastName']:$user1->getLastName();
		$disp_email = isset($_POST['email'])?$_POST['email']:$user1->getEmailId();
		$disp_address = isset($_POST['address'])?$_POST['address']:$user1->getAddress();
		$disp_phoneNo  = isset($_POST['phoneNo'])?$_POST['phoneNo']:$user1->getPhoneNumber();
		$disp_securityQuestion = isset($_POST['passwordRecoveryQues'])?$_POST['passwordRecoveryQues']:$user1->getSecurityQuestion();
		$disp_securityAnswer = isset($_POST['passwordRecoveryAns'])?$_POST['passwordRecoveryAns']:$user1->getSecurityAnswer();
		
	?>
	
	
	<table class="tableborder" align="center" colspacing="50" cellspacing="20">
		<th class="topheaderbkg" colspan="4">User Modification</th>
		<tr>
			<td colspan="4"></td>
		</tr>

		<tr>
			<td><label>Login Name </label></td>
			<td><input type="text" readonly="readonly" name="loginName" maxlength="20"
					value='<?php echo htmlentities($disp_loginName) ?>' /><font
					color='red'>*</font></td>
			
		</tr>


			<tr>
				<td><label>First Name </label></td>
				<td><input type="text" name="firstName" maxlength="20"
					value='<?php echo htmlentities($disp_firstName) ?>' /><font
					color='red'>*</font></td>

				<td><label>Last Name</label></td>
				<td><input type="text" name="lastName" maxlength="20"
					value='<?php echo htmlentities($disp_lastName) ?>' /> <font
					color='red'>*</font></td>
			</tr>


			<tr>
				<td><label>Phone Number </label></td>
				<td><input type="text" name="phoneNo" maxlength="10"
					value='<?php echo htmlentities($disp_phoneNo) ?>' maxlength="10" />
				<font color='red'>*</font></td>


				<td><label>Address</label></td>
				<td><input type="text" name="address"
					value='<?php echo htmlentities($disp_address) ?>' maxlength="100" /><font
					color='red'>*</font></td>
			</tr>

			<tr>
				<td><label>Email ID </label></td>
				<td><input type="text" name="email" maxlength="35"
					value='<?php echo htmlentities($disp_email) ?>' /><font color='red'>*</font>
				</td>

				<td><label> Reminder Answer </label></td>
				<td><input type="text" name="passwordRecoveryAns" maxlength="20"
					value='<?php echo htmlentities($disp_securityAnswer) ?>' /><font
					color='red'>*</font></td>
					
				

			</tr>
			<tr>
				
				<td><label> Reminder Question</label></td>
				<td><select  name="passwordRecoveryQues" >
					<option value="What is your mothers maiden name?">What is your
					mothers name?</option>
					<option value="Which is your favorite pet?">Which is your favorite
					pet?</option>
					<option value="What is your favorite book?">What is your favorite
					book?</option>
					<option value="What is your fathers birth date?">What is your
					fathers birth date?</option>
				</select></td>
				
			</tr>
			
		

	</table>

	<table align="center">
		<tr>
			<td><input type="submit" name ="Update" value="Update" align="left"
				Class="inputbutton1" /></td>
				<td><input type="reset" value="Reset" align="left"
					Class="inputbutton1" /></td>
			
		
				</tr>
	</table>
</form>
<?PHP
	
?>
</td>
</tr>
</table>

</body>
</html>
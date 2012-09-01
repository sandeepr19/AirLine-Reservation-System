<html>
<head>
<script language="JavaScript" src="gen_validatorv31.js"
	type="text/javascript"></script>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>

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
		
		<a href="Login.php">Log in</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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


<table border="0" align="center">
	<tr>
		<td>
		<form action='' theme="simple" name="userRegistration" method="POST">

		<?PHP
		require_once "formvalidator.php";
		include ("../classes/User.php");
		include ("../model/UserAccountModel.php");
		$show_form=true;
		if(isset($_POST['Submit']))
		{
			$validator = new FormValidator();
			$validator->addValidation("loginName","req","Please fill in login name");
			$validator->addValidation("loginName","alnum","Please fill only alphanumeric characters for login name.");
			$validator->addValidation("password","req","Please fill in password");
			$validator->addValidation("password","alnum","Please fill only alphanumeric characters for password.");
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
				$userAccountModel = new UserAccountModel();
				if($userAccountModel->isUserPresent($_REQUEST["loginName"], $_REQUEST["password"]))
				{
					echo "<B>Validation Errors:</B>";
					echo "<p>"."Username and password combiantion unavailable"."</p>\n";
				}else 
				{
				session_start();
	   			$_SESSION['action']="registerUser";
	   			$user = new User();
				$user->setLoginId($_REQUEST["loginName"]);
				$user->setPassword($_REQUEST["password"]);
				$user->setFirstName($_REQUEST["firstName"]);
				$user->setLastName($_REQUEST["lastName"]);
				$user->setEmailId($_REQUEST["email"]);
				$user->setAddress($_REQUEST["address"]);
				$user->setPhoneNumber($_REQUEST["phoneNo"]);
				$user->setSecurityAnswer($_REQUEST["passwordRecoveryQues"]);
				$user->setSecurityQuestion($_REQUEST["passwordRecoveryAns"]);
				$_SESSION['user']=serialize($user);
	   			header("Location: ../controller/Controller.php");
				}
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
		$disp_loginName  = isset($_POST['loginName'])?$_POST['loginName']:'';
		$disp_password = isset($_POST['password'])?$_POST['password']:'';
		$disp_firstName = isset($_POST['firstName'])?$_POST['firstName']:'';
		$disp_lastName  = isset($_POST['lastName'])?$_POST['lastName']:'';
		$disp_email = isset($_POST['email'])?$_POST['email']:'';
		$disp_address = isset($_POST['address'])?$_POST['address']:'';
		$disp_phoneNo  = isset($_POST['phoneNo'])?$_POST['phoneNo']:'';
		$disp_securityQuestion = isset($_POST['passwordRecoveryQues'])?$_POST['passwordRecoveryQues']:'';
		$disp_securityAnswer = isset($_POST['passwordRecoveryAns'])?$_POST['passwordRecoveryAns']:'';
		if(true == $show_form)
		{
			?>

		<table class="tableborder" align="center" colspacing="50"
			cellspacing="20">
			<th class="topheaderbkg" colspan="4">User Registration</th>
			<tr>
				<td colspan="4"></td>
			</tr>

			<tr>
				<td><label>Login Name </label></td>
				<td><input type="text" name="loginName" maxlength="20"
					value='<?php echo htmlentities($disp_loginName) ?>' /><font
					color='red'>*</font></td>

				<td><label> Password </label></td>
				<td><input type="password" name="password" maxlength="20"
					value='<?php echo htmlentities($disp_password) ?>' /><font
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
				<td><input type="text" name="email" maxlength="20"
					value='<?php echo htmlentities($disp_email) ?>' /><font color='red'>*</font>
				</td>

				<td><label> Reminder Answer </label></td>
				<td><input type="text" name="passwordRecoveryAns" maxlength="20"
					value='<?php echo htmlentities($disp_securityAnswer) ?>' /><font
					color='red'>*</font></td>
					
				

			</tr>
			<tr>
				
				<td><label> Reminder Question</label></td>
				<td><select name="passwordRecoveryQues">
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
				<td><input type="submit" name='Submit' value="Submit" align="left"
					Class="inputbutton1" /></td>
				<td><input type="reset" value="Reset" align="left"
					Class="inputbutton1" /></td>


			</tr>
		</table>
		</form>
		<?PHP
		}//true == $show_form
?></td>
	</tr>
</table>

</body>
</html>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1">
<title>Login Page</title>
<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body  >
<br>
<br>
<br>
<?php
session_start();
require_once "formvalidator.php";
include ("../classes/User.php");
if(isset($_POST['Submit']))
{
	$validator = new FormValidator();
	$validator->addValidation("userName","req","Please fill in username");
	$validator->addValidation("password","req","Please fill in password");
	$validator->addValidation("userName","alnum","Please fill only alphanumeric characters for username.");
	$validator->addValidation("password","alnum","Please fill only alphanumeric characters for password.");
	if($validator->ValidateForm())
	{
		$_SESSION['action']="login";
		$user = new User();
		$user->setLoginId($_REQUEST["userName"]);
		$user->setPassword($_REQUEST["password"]);
		$_SESSION['user']=serialize($user);
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


if(isset($_SESSION['loginToken']) && $_SESSION['loginToken']=="invalid")
{
	session_destroy();
	echo "<B>Validation Errors:</B>";
	echo "<p>"."invalid username"."</p>";
}
$disp_loginName  = isset($_POST['userName'])?$_POST['userName']:'';
$disp_password = isset($_POST['password'])?$_POST['password']:'';
?>
<form name="Login" action="" method="post"theme="simple">
<table class="topheader" align="center" width="40%">
	<tr>
		<th class="topheaderbkg" colspan="2" align="center">Login Page</th>
	</tr>

	<tr class="FontProperty">
		<td class="tdLogin" align="right"><label>User Name</label></td>
		<td class="tdLogin"><input type="text" name="userName"
			value='<?php echo htmlentities($disp_loginName) ?>' /></td>
	</tr>
	<tr class="FontProperty">
		<td class="tdLogin" align="right"><label>Password</label></td>
		<td class="tdLogin"><input type="password" name="password"
			value='<?php echo htmlentities($disp_password) ?>' /></td>
	</tr>
	<tr>
		<td>&nbsp;</td>
	</tr>

	<tr class="trLogin">
		<td class="contentButtonArea" colspan="2" align="center"><input
			type="submit" name="Submit"value="LOGIN" align="center" theme="simple"
			Class="inputbutton1" /> <input type="reset" value="RESET"
			align="center" theme="simple" Class="inputbutton1" /></td>
	</tr>
	<tr>
		<td colspan="2" align="center"><a href="UserRegistration.php">New User
		</a>&nbsp;</td>

	</tr>
	<tr>
		<td colspan="2" align="center"></td>
	</tr>
</table>

</form>
</body>
</html>

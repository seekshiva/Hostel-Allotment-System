<?php
if(!file_exists("./config.inc.php"))
{
header("Location: ./install.php");
}
session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Hostel Allotment</title>
	<link rel="stylesheet" href="main.css" type="text/css" media="screen" />
	<script language="javascript" src="script.js" type="text/javascript" ></script>
	<style type="text/css">
		* {
			font-size:18pt;
			font-family:Lucida;
		}
		input{
			padding:8px;
			margin-bottom:10px;
		}
	</style>
</head>
<body>
<div align="center">
<div style="width:320px; margin-top:120px; background-color:#ffe9e2; border:#e99 5px solid; padding:10px; z-index:8;"><strong>Login</strong></div>

<div style="width:300px; margin-top:-5px; background-color:#FFF; border:5px #e99 solid; padding:20px; z-index:1;">
	<?php if(isset($_SESSION['admin'])) {
		echo "You have already logged in as administrator. Click <a href=\"index.php\">here</a> to go to the home page.<hr /> Click <a href=\"logout.php\">here</a> to log out.";
	} else { ?>
	<form action="./index.php" name="loginForm" method="post">
		<label align="left" for="username">User Name:</label>
		<input type="text" name="username" id="username" />
		<label align="left" for="password">Password:</label>
		<input type="password" name="password" id="password" />
		<input type="button" value="Login" onclick="if(validate()) window.location = './index.php';" />
		<div id="displayXML" style="font-family:Geneva, Arial, Helvetica, sans-serif; color:#aa3333; font-size:12px; font-weight:bold; ">For now the username is 'admin' and password is 'admin123'</div>
		</form>
	<?php } ?>
</div></div>
</body>
</html>

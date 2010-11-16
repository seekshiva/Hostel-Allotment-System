<?php
session_start();
if(file_exists("./config.inc.php")) { header('Location: index.php');}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Installation - Hostel Allotment</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script language="javascript" type="text/javascript" src="script.js"></script>
	<link href="main.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<p>You need to configure the app before you can use it.</p>
	<p>The following details are required to complete the installation. This is a one time process. Contact your site administrator if you are not sure of any of these details.</p>
	<form name="installationForm">
		<table style="padding:20px; ">
			<tr>
				<td><label for="host">Host : </label></td>
				<td><input name="host" type="text" value="localhost" />This is usually 'localhost'. Change it if its different for your server.</td></tr>
			<tr>
				<td><label for="username">Username : </label></td>
				<td><input name="username" type="text" value="root" />The default value is 'root'. Change it if its different for your server.</td></tr>
			<tr>
				<td><label for="password">Password : </label></td>
				<td><input name="password" type="password" />For security reasons, it is recommended that you have a password.</td></tr>
			<tr>
				<td><label for="database">Database : </label></td>
				<td><input name="database" type="text" />The name of the database in which the files will be stored.</td></tr>
			<tr>
				<td><label for="tablepref">Table prefix : </label></td>
			  <td><input name="tablepref" type="text" value="hostel_" />The header with which the tables must be prefixed. Change it only if you are installing multiple instances of this app.</td>
			</tr>
			<tr>
				<td><label for="institute">Name of the Institution : </label></td>
				<td><input name="institute" type="text" value="National Institute of Technology, Tiruchirappalli" />The name of the Institution which uses this app. This will appear on all pages during Hostel Allotment.</td></tr>
			<tr>
				<td></td>
				<td><input type="button" value="Install" onclick="loadXMLDoc('cinstall.php','install');" /></td></tr></table></form>
		<div id="displayXML"></div>

<hr />
To know about the app click <a href="./about.php">here</a>.
</body>
</html>

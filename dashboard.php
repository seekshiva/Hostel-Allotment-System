<?php
if(!isset($_GET['v']))
header("Location: ./dashboard.php?v=courses");
session_start();
if(!file_exists("./config.inc.php"))
{
header("Location: ./install.php");
}
require "config.inc.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<?php if(!isset($_SESSION['admin'])) { ?>
	<meta http-equiv="refresh" content="0;url=./login.php">
	<?php } ?>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Admin Dashboard - Hostel Allotment - <?php echo $glInstitute; ?></title>
	<link rel="stylesheet" href="main.css" type="text/css" media="screen" />
	<script language="javascript" src="script.js" type="text/javascript" ></script>
	
</head>
<body>
<div id="header" class="hideP">
<?php include "./includes/header.php"; ?>
</div>
<div align="center">
<h2 class="hideP" id="instituteName"><?php
echo $glInstitute; ?></h2>
<h2 class="hideP">Hostel Allotment</h2>
<?php if(isset($_GET['v']) && $_GET['v'] == 'hostel') {
?>
<div id="doubleWrapper">
<?php
}
else {
echo "<div id=\"wrapper\">";
}
 ?>
<h2 align="center">Admin Dashboard</h2>
<?php
switch($_GET['v']) {
case 'courses';
	include "./pages/dashCourses.php"; 
	break;
case 'hostel';
	include "./pages/dashHostel.php"; 
	break;
}
?>
</div>
</div></body></html>
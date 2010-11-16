<?php session_start();
if(!file_exists("./config.inc.php"))
{
header("Location: ./install.php");
}
if(!isset($_SESSION['admin'])) { 
//header("Location: ./login.php");
}
require "config.inc.php";
require "functions.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<title>Hostel Allotment - <?php echo $glInstitute; ?></title>
	<link rel="stylesheet" href="mainp.css" type="text/css" media="print" />
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
<div align="left" id="wrapper">
<?php
if(isset($_GET['v'])) {
	switch($_GET['v'])
	{
		case "hostel":
			displayHTInfo();
			//include "hostel.php";
			break;
		case "list":
			include "list.php";
			break;
		case "application":
			include "register.php";
			break;
		case "register":
			include "record.php";
			break;
		case "dashboard":
			header("Location: dashboard.php");
			break;
		case "about":
			include "about.php";
			break;
	}
}
else {
	displayCourseList();
}
?>
</div></div>
</body>
</html>

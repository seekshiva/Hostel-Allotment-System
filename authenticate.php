<?php
session_start();
require "config.inc.php";
$Uname = $_POST['username'];
$Pword = $_POST['password'];
$Pword = MD5($Pword);
/*echo "Authenticating on progress";
echo "<br />Username : " . $Uname;
echo "<br />Password : " . $Pword;*/
$con = mysql_connect($glHost, $glUsername, $glPassword) or die("Could not connect to database.");
mysql_select_db($glDatabase);
$query = "SELECT * FROM " . $glTablePref . "logindb WHERE username='$Uname'AND password='$Pword'";
$result = mysql_query($query,$con) or die("Could not perform the operation that was requested.");
$myrow = mysql_fetch_array($result);
if($myrow) {
echo "Login successful";
$_SESSION['admin'] = 1;
}
else {
echo "The username password combination do not match. Please try again.";
}

?>
<h2>Select hostel</h2>
<?php 
//require_once("config.inc.php");
$con = mysql_connect($glHost, $glUsername, $glPassword);
mysql_select_db($glDatabase, $con);
$query = "SELECT * FROM " . $glTablePref . "list";
if(isset($_GET['type']))
$query .= " WHERE year = '" . $_GET['type'] . "'";
$result = mysql_query($query,$con);
echo "<p>The following is the list of hostels in which the student can opt to stay. Click on any one of the to check for availability</p>\n<div  align='center'><ul id='hostelList'>";
while($myrow = mysql_fetch_array($result)) {
echo "<li><a onClick=\"showRList('";
echo $myrow['hname'];
echo "');\" >";
echo $myrow['hname'];
echo "</a></li>";
}
echo "</ul></div>";
?>

<a href="./">Go Back</a>
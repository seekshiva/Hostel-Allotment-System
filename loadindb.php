<?php
require "config.inc.php";
$g = $_POST;

$sName = $g['sName'];
$sRelation = $g['sRelation'];
$sTitle = $g['sTitle'];
$sFName = $g['sFName'];
$sSex = $g['sSex'];
$sRollno = $g['sRollno'];
$sClass = $g['sClass'];
$sHostel = $g['sHostel'];
$sRoom = $g['sRoom'];
$sDate = $g['sDate'];



$con = mysql_connect($glHost, $glUsername, $glPassword);
mysql_select_db($glDatabase, $con);
$query = "INSERT INTO " . $glTablePref . "namelist 
(rollno, name, hostel, roomno, pgrelation, pgtitle, pgname, sex, class, date_of_joining)
VALUES 
('$sRollno', '$sName', '$sHostel', '$sRoom', '$sRelation', '$sTitle', '$sFName', '$sSex', '$sClass', '$sDate')";
$result = mysql_query($query, $con) or die("Insertion failed");
echo "<div>Data successfully inserted into the database.<br /><br /> Click <a href=\"./index.php\">here</a> to go back to the main page.</div>";

$query = "SELECT name FROM " . $glTablePref . "namelist WHERE roomno='$sRoom'";
$result = mysql_query($query, $con) or die("Failed to extract the list of students.");
echo "<hr />The following students have registered to stay in $sHostel hostel, room no $sRoom.<ul>";
while($myrow = mysql_fetch_array($result)) {
echo "<li>" . $myrow['name'] . "</li>";
}
echo "</ul>";

?>
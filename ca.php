<?php
	require "config.inc.php";
	
	$con = mysql_connect($glHost, $glUsername, $glPassword);
	mysql_select_db($glDatabase,$con);
	$sHostel = $_GET['hostel'];
	$sRoom = (int)$_GET['room'];
	if($sRoom == 0)
	die("Room does not exist");

$xml = new DOMDocument();
$xml -> load("hostelList.xml");
$hostels = $xml -> getElementsByTagName('hostel');
foreach($hostels as $hostel)
if($hostel -> getAttribute('name') == $sHostel) {
foreach($hostel -> getElementsByTagName('maxperroom') as $max) {
$maxpr = $max -> nodeValue;
}
foreach($hostel -> getElementsByTagName('noofrooms') as $nor) {
$maxRooms = $nor -> nodeValue;
}
}
	/*$query = "SELECT nperroom, totalrooms FROM " . $glTablePref . "list WHERE hname = '$sHostel'";
	$result = mysql_query($query, $con);
	$myrow = mysql_fetch_array($result);
	$maxpr = $myrow['nperroom'];
	$maxRooms = $myrow['totalrooms'];*/
	if($sRoom > $maxRooms)
	die("Room does not exist");
	
		$query = "SELECT rollno, name FROM " . $glTablePref . "namelist WHERE hostel = '$sHostel' AND roomno = '$sRoom'";
		$result = mysql_query($query, $con);
		$sNum = mysql_num_rows($result);
	
		echo "Maximum of " . $maxpr . " students can stay in each room in " . $sHostel . " hostel<br />";
		echo "Currently " . $sNum . " student(s) have registered to stay in " . $sHostel . " room number " . $sRoom . ".<br />";
	if($sNum == $maxpr) {
		die("So you need to choose another room");
	}
	else if($sNum > 0) {
		echo "<hr />The following students have registered to stay in the room so far:<br><ul align='left'>";
		while($myrow = mysql_fetch_array($result)) {
		echo "<li>" . $myrow['rollno'] . " : " . $myrow['name'] . "</li>";
		}
		echo "</ul><hr />";
	}
		echo "You can opt to stay in this room.";
		echo '<form method="post" action="./?v=application">';
		echo "<input type='hidden' name='roomno' value='". $sRoom . "' />";
		echo "<input type='submit' name='msg' value='Register to stay in $sHostel hostel, room number $sRoom' /></form>";
	mysql_close($con);
?>
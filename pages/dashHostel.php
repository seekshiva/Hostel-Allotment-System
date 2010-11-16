<?php include "./includes/dashmenu.php"; ?>
<p>The following is the list of hostels in your Institution. Add a new one or edit the previous values if required.</p>
<?php
	$xml = new DOMDocument();
	$xml -> load("hostelList.xml");
	$hostelL = $xml -> getElementsByTagName("hostel");
	echo "<div align='center'><table border='0' cellspacing='2' class=\"TList\">";
	echo "<thead><tr><th>Name</th><th>no of rooms</th><th>max per room</th><th>Gender</th><th>Students</th></tr></thead><tbody>";
	foreach($hostelL as $hostel) {
	$str = 'loadXMLDoc("edithostel.php?t=' . Rand() . '&hostel=' . $hostel -> getAttribute('name') . '&nor=' . $hostel -> getElementsByTagName('noofrooms') -> item(0) -> nodeValue . '&maxpr=' . $hostel -> getElementsByTagName('maxperroom') -> item(0) -> nodeValue . '&gender=' . $hostel -> getElementsByTagName('gender') -> item(0) -> nodeValue . '");';
		$string = "";
		foreach($hostel -> getElementsByTagName('student') as $student) {
			if(strlen($string) == 0) {
				$string = $student -> nodeValue;
				}
				else {
				$string .= ", " . $student -> nodeValue;
				}
			}
		if(strlen($string) == 0) $string = " --:: No students assigned ::-- ";
		echo "<tr onClick='$str window.location=\"./dashboard.php?v=hostel#end\";'></td><td>" . $hostel -> getAttribute("name") . "</td><td>" . $hostel -> getElementsByTagname("noofrooms") -> item(0) -> nodeValue . "</td><td>" . $hostel -> getElementsByTagname("maxperroom") -> item(0) -> nodeValue . "</td><td>" . $hostel -> getElementsByTagname("gender") -> item(0) -> nodeValue . "</td><td>" . $string . "</td></tr>";
	
	}
	$str = 'loadXMLDoc("edithostel.php?t=' . Rand() . '");';
	echo "</tbody></table>";
	echo "<input type=\"button\" onClick='$str window.location=\"./dashboard.php?v=hostel#end\";' value=\"Add New\" />";
?><hr />
<div id="displayXML"></div>
<div id="end"></div>
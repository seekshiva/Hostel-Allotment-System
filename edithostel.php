<?php
	$add = 0;
	if(!isset($_GET['hostel'])) {
		$hostel = "";
		$nor = "";
		$maxpr = "";
		$gender = "";
		$add = 1;
	}
		else {
		$hostel = $_GET['hostel'];
		$nor = $_GET['nor'];
		$maxpr = $_GET['maxpr'];
		$gender = $_GET['gender'];
	}
	echo "<h2>";
	echo ($add == 1)?"Add new hostel":"Edit hostel info";
	echo "</h2><form action='updthostel.php?redirectto=dashboard.php?v=hostel' method='post' name='formH'><table>";
	echo "<tr><td>Hostel (*):</td><td><input type='text' name='hostel' value='" . $hostel . "' /><input type='hidden' name='oldhostel' value='" . $hostel . "' /></td></tr>";
	echo "<tr><td>No of rooms:</td><td><input type='text' name='nor' value='" . $nor . "' /></td><td></td></tr>";
	echo "<tr><td>Max per room:</td><td><input type='text' name='maxpr' value='" . $maxpr . "' /></td><td></td></tr>";
	echo "<tr><td>Gender:</td><td><select name='gender'><option";
	if(strcmp($gender, "Male") == 0) echo " selected";
	echo " value='Male'>Male</option><option ";
	if(strcmp($gender, "Female") == 0) echo " selected";
	echo " value='Female'>Female</option></select></td><td></td></tr>";
	echo "<tr><td>Students:</td><td>";
	
	$studentList = array();
	$xmlH = new DOMDocument();
	$xmlH -> load("hostelList.xml");
	foreach($xmlH -> getElementsByTagName('hostel') as $hostelL)
		if($hostelL -> getAttribute('name') == $hostel) {
			foreach($hostelL -> getElementsByTagName('student') as $studentInHostel)
			$studentList[] = $studentInHostel -> nodeValue;
		}
	$xmlC = new DOMDocument();
	$xmlC -> load("courseList.xml");
	foreach($xmlC -> getElementsByTagName('course') as $course) {
	for($i = 1; $i <= $course -> getAttribute('period'); $i+=1) {
		echo "<input type=\"checkbox\" name=\"student[]\"";
		echo " value =\"" . $i . $course -> getAttribute('short') . "\"";
		foreach($studentList as $asd) {
		$shor = $i . $course -> getAttribute('short');
		if(strcmp($asd, $shor) == 0)
		echo " checked";
		}
		echo " >" . $i . " " . $course -> getAttribute('name') . "</input><br />";}
	}
	
	echo "</td><td></td></tr>";
	echo "<tr><td></td><td><input type='submit' name='period' value='";
	echo ($add == 1)?"Add":"Edit";
	echo "' onClick=\"return validateH();\" /></td><td></td></tr>";
	echo "</table></form>";
	echo "<hr /><strong>(*) - </strong> To delete a hostel from the list, set the value of the 'Hostel' to null '' value.";
?>
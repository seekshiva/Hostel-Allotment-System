<?php include "./includes/dashmenu.php"; ?>
<p>The following is the list of courses offered in your Institution. Add a new one or edit the previous values if required.</p>
<?php
	$xml = new DOMDocument();
	$xml -> load("courseList.xml");
	$courseL = $xml -> getElementsByTagName("course");
	echo "<div align='center'><table border='0' cellspacing='2' class=\"TList\">";
	echo "<thead><tr><th>Course short form</th><th>Course name</th><th>Time period of the course</th></tr></thead><tbody>";
	foreach($courseL as $course) {
	$name = $course -> getAttribute("name");
	$str = 'loadXMLDoc("editcourse.php?t=' . Rand() . '&short=' . $course -> getAttribute("short") .'&name=' . $course -> getAttribute("name") . '&tenure=' . $course -> getAttribute("period") . '");';
	echo "<tr onClick='$str'><td>" . $course -> getAttribute("short") . "</td><td>" . $course -> getAttribute("name") . "</td><td>" . $course -> getAttribute("period") . "</td></tr>";
	
	}
	$str = 'loadXMLDoc("editcourse.php?t=' . Rand() . '");';
	echo "</tbody></table><input type=\"button\" onClick='$str' value=\"Add New\" />";
?><br />
<div id="displayXML"></div>
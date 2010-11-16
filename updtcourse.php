<?php
	$oldshort = $_POST['oldshort'];
	$short = $_POST['short'];
	$name = $_POST['name'];
	$tenure = $_POST['tenure'];
	$var = 1;

	$xml = new DOMDocument();
	$xml -> load("courseList.xml");
	$courseL = $xml -> getElementsByTagName("course");
	if($short == "") {
		foreach($courseL as $course) {
			if($course -> getAttribute('short') == $oldshort) {
				$course -> parentNode -> removeChild($course);
				}
			}
		}
	else {
		$var = 0;
		foreach($courseL as $course) {
			if($course -> getAttribute('short') == $oldshort) {
				$course -> setAttribute('short', $short);
				$course -> setAttribute('name', $name);
				$course -> setAttribute('period', $tenure);
				$var = 1;
				}
			}
		}
		if($var == 0) { //if course doesn't previously exist
			foreach($xml -> getElementsByTagName("courseList") as $courseL) {
				$course = $xml -> createElement('course');
				$course -> setAttribute('short', $short);
				$course -> setAttribute('name', $name);
				$course -> setAttribute('period', $tenure);
				$courseL -> appendChild($course);
				}
			}
		
		print $xml -> save("courseList.xml");
		
	if(isset($_GET['redirectto'])) $redirect = $_GET['redirectto']; else $redirect = "dashboard.php";
	header('Location:' . $redirect);
?>
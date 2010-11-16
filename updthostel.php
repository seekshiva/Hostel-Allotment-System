<?php
	$oldhostel = $_POST['oldhostel'];
	$hostelname = $_POST['hostel'];
	$nor = $_POST['nor'];
	$maxpr = $_POST['maxpr'];
	$gender = $_POST['gender'];
	$var = 1;
	
	$xml = new DOMDocument();
	$xml -> load("hostelList.xml");
	$hostelML = $xml -> getElementsByTagName("hostelList") -> item(0);
	$hostelL = $xml -> getElementsByTagName("hostel");
	if($hostelname == "") {
		foreach($hostelL as $hostel) {
			if($hostel -> getAttribute('name') == $oldhostel) {
				$hostelML -> removeChild($hostel);
				}
			}
		}
	else {
			$var = 0;
		foreach($hostelL as $hostel) {
			if($hostel -> getAttribute('name') == $oldhostel) {
				$hostel -> setAttribute('name', $hostelname);
				$hostel -> getElementsByTagName('noofrooms') -> item(0) -> nodeValue = $nor;
				$hostel -> getElementsByTagName('maxperroom') -> item(0) -> nodeValue = $maxpr;
				$hostel -> getElementsByTagName('gender') -> item(0) -> nodeValue = $gender;
				$list = $hostel -> getElementsByTagName('students') -> item(0);
				$length = $list -> childNodes -> length;
				echo $length;
				for($i = 0; $i < $length; $i += 1) {
					$tag = $list -> getElementsByTagName('student') -> item(0);
					$list -> removeChild($tag);
					}
				if(isset($_POST['student']))
				foreach($_POST['student'] as $student) {
					$log = $list -> appendChild(new domelement('student'));
					//$log -> setAttribute('name', 'Shiva');
					$log -> appendChild($xml -> createTextNode($student));
					}
				$var = 1;
				}
			}
		}
		if($var == 0) { //if hostel doesn't previously exist
			//$hostel = $xml -> createElement('hostel');
			$hostel = $hostelML -> appendChild(new domelement('hostel'));
			$hostel -> setAttribute('name', $hostelname);
			$hostel -> appendChild(new domelement('noofrooms', $nor));
			$hostel -> appendChild(new domelement('maxperroom', $maxpr));
			$hostel -> appendChild(new domelement('gender', $gender));
			$list = $hostel -> appendChild(new domelement('students'));
			foreach($_POST['student'] as $student) {
				$list -> appendChild(new domelement('student', $student));
				}
			}
		
		$xml -> save("hostelList.xml");
		
	if(isset($_GET['redirectto'])) $redirect = $_GET['redirectto']; else $redirect = "dashboard.php";
	header('Location: ' .$redirect);
?>
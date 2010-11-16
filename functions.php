<?php
	function displayHInfo()
	{
		$xml = new DOMDocument();
		$xml -> load('hostelList.xml');
		$hnames = array();
		foreach($xml -> getElementsByTagName('hostel') as $hostel) {
			$hname[] = array('url' => $hostel->getAttribute('name'));
			echo "<h3>" . $hostel -> getAttribute('name') . "</h3>";
			foreach($hostel -> getElementsByTagName('noofrooms') as $noroom) {
			echo "Maximum number of rooms: " . $noroom->nodeValue;
			}
			foreach($hostel -> getElementsByTagName('maxperroom') as $noroom) {
			echo "<br />Maximum students per room: " . $noroom->nodeValue;
			}
			echo "<br />Students permissible: <ul>";
			
			foreach($hostel -> getElementsByTagName('student') as $noroom) {
			echo "<li>" . $noroom->nodeValue . "</li>";
			}
			echo "</ul>";
		}
	}
	function displayHTInfo()
	{
		$type = $_GET['type'];
		$xml = new DOMDocument();
		$xml -> load('hostelList.xml');
		echo "<h2>Select hostels</h2>";
		echo "<p>The following is the list of hostels in which the student can opt to stay. 
		Click on any one of the to check for availability</p>\n<div  align='center'><ul id='hostelList'>";
		foreach($xml -> getElementsByTagName('students') as $students) {
		foreach($students -> getElementsByTagName('student') as $student) {
			if($student -> nodeValue == $type)
			echo "<li><a onClick='showHostelCAOption(\"" . $student -> parentNode -> parentNode -> getAttribute('name') . "\");'>" . $student -> parentNode -> parentNode -> getAttribute('name') . "</a></li>";
		}}
		echo "</ul><div align=\"left\"><a href=\"./index.php\">Go back</a></div>";
	}
	function displayCourseList()
	{
		$xml = new DOMDocument();
		$xml -> load('courseList.xml');
		echo "<h2>Select the course and year in which the student belongs to:</h2>\n<ul>";
		foreach($xml -> getElementsByTagName('course') as $course)
		{
			$period = $course -> getAttribute('period');
			echo "<li>" . $course -> getAttribute('name') . "<ul>";
			for($i = 1; $i <= $period; $i+=1)
			{
				echo "<li><a href=\"./index.php?v=hostel&type=" . $i . $course -> getAttribute('short') ."\">Year : " . $i . "</a></li>";
			}
			echo "</ul></li>";
		}
		echo "</ul>";
	}

function escape($query) 
{ 
        if (!get_magic_quotes_gpc()) { 
            $query = addslashes($query); 
        } 
        return $query; 
} 

?>
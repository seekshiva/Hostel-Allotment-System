<?php
	require "config.inc.php";
	$rRoom = $_POST['roomno'];
	$text = $_POST['msg'];
	$con = mysql_connect($glHost, $glUsername, $glPassword);
	mysql_select_db($glDatabase, $con);


$xml = new DOMDocument();
$xml -> load("hostelList.xml");
$hostels = $xml -> getElementsByTagName('hostel');
foreach($hostels as $hostel) {
$name = $hostel -> getAttribute('name');
if(strlen(strstr($text, $name)) !== 0) {
	foreach($hostel -> getElementsByTagName('gender') as $gender) {
	$rSex = $gender -> nodeValue;
	}
$rHostel = $name;
}
}

	/*$query = "SELECT hname, gender FROM " . $glTablePref . "list";
	$result = mysql_query($query, $con);
	while($myrow = mysql_fetch_array($result))
	if(strlen(strstr($text, $myrow['hname'])) !== 0) {
	$rHostel = $myrow['hname'];
	$rSex = $myrow['gender'];
	}*/
?>
<div id="register_1">
	<h2>Enter details:</h2>
	<p>You need to furnish with the informations required. Few of them have already been filled for you based your response in the previous pages.</p>
	<form action="./index.php?v=register" method="post">
		<table>
			<tr>
				<td>Name:</td>
				<td><input type="text" id="sName" name="sName" /></td></tr>
			<tr>
				<td>
					<select id="sRelation" name="sRelation">
						<option value="--select--">Select relation</option>
						<option value="Father">Father</option>
						<option value="Mother">Mother</option>
						<option value="Guardian">Guardian</option></select>'s Name:</td>
				<td>
					<select id="sTitle" name="sTitle">
						<option value="Mr">Mr.</option>
						<option value="Mrs">Mrs.</option>
						<option value="Ms">Ms.</option>
						<option value="Dr">Dr.</option>
						<option value="Capt">Capt.</option></select>
					<input type="text" id="sFName" name="sFName" /></td></tr>
			<tr>
				<td>Gender:</td>
				<td>
				<?php echo $rSex; ?>
				<input type="hidden" id="sSex" name="sSex" value="<?php echo $rSex; ?>" /></td></tr></td></tr>
			<tr>
			  <td>Roll No :</td>
			  <td><input type="text" id="sRollno" name="sRollno" /></td></tr>
			<tr>
			  <td>Class:</td>
			  <td><input type="text" id="sClass" name="sClass" /></td></tr>
			<tr>
			  <td>Hostel:</td>
			  <td>
				<?php echo $rHostel; ?>
				<input type="hidden" id="sHostel" name="sHostel" value="<?php echo $rHostel; ?>" /></td></tr>
			<tr>
			  <td>Room No :</td>
			  <td>
				<?php echo $rRoom; ?>
				<input type="hidden" id="sRoom" name="sRoom" value="<?php echo $rRoom; ?>" /></td></tr>
			<tr>
			  <td>Date of Allotment :</td>
			  <td>
				<?php
					$time = time();
					$arr = getdate($time);
					echo $arr['mday'] . " - " . $arr['mon'] . " - " . $arr['year']; ?>
				<input type="hidden" id="sDate" name="sDate" value="<?php echo $time; ?>" />
				<?php
					/*	while(current($arr)) {
					echo key($arr) . " : ";
					echo current($arr) . " ----- "; 
					next($arr);
					}*/?></td></tr>
			<tr>
			  <td></td>
			  <td><input type="submit" /></td></tr></table></form>
	<a href="./index.php">Go back</a></div>
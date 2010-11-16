<?php
require "config.inc.php";
$g = $_POST;
$count = 0;

while(current($g)) {
//echo key($g) . " : " . current($g) . "<br />";
next($g);
$count += 1;
}
if($count != 10)
die("Some fields have been left blank. Go <a href=\"index.php\">back</a> and reenter the details.");

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

$query = "SELECT * FROM " . $glTablePref . "namelist WHERE rollno = '$sRollno'";
$result = mysql_query($query, $con) or die("failed to execute command.");

$myrow = mysql_fetch_array($result);

if($myrow) die("roll number has already registered. Click <a href=\"./index.php\">here</a> to go back.");

 ?>
<div id="finalWrapper">
<p class="hideP">Take 2 copies of print-out of this page and get signature from the student and parent / guardian. One copy is to be taken back and the other copy is to be given to the student.</p>
	
<div id="tocDiv">
<div id="printContainer">
	<div class="hideP" type="button" onClick="alert('This service is not yet activated Press Ctrl + P  or click on File -> Print in the menu bar to print the page.');">Print</div>
</div>
	<div id="register_1">
		<h2>Room Allotment Slip</h2>
		<table>
			<tr>
				<td>Name:</td>
				<td><?php echo $g['sName']; ?></td></tr>
			<tr class="hideP">
				<td><?php echo $g['sRelation']; ?>'s Name:</td>
				<td><?php echo $g['sTitle']; ?>
					<?php echo $g['sFName']; ?></td></tr>
			<tr class="hideP">
				<td>Gender:</td>
				<td><?php echo $g['sSex']; ?></td></tr>
			<tr>
			  <td>Roll No :</td>
			  <td><?php echo $g['sRollno']; ?></td></tr>
			<tr>
			  <td>Class:</td>
			  <td><?php echo $g['sClass']; ?></td></tr>
			<tr>
			  <td>Hostel:</td>
			  <td><?php echo $g['sHostel']; ?></td></tr>
			<tr>
			  <td>Room No :</td>
			  <td><?php echo $g['sRoom']; ?></td></tr>
			<tr>
			  <td>Date of Allotment :</td>
			  <td>
				<?php
					$date = getdate($g['sDate']);
					$datestr = $date['mday'] . " - " . $date['mon'] . " - " . $date['year'];
					echo $datestr; ?></td></tr></table>
		<div class="hideS signature">
			<span style="float:right; margin-right:30pt; ">Signature of Deputy Warden</span>
			<span>Signature of Student</span></div></div>
	<div id="register_2">
		<h2>Undertaking by the Candidate/ Student</h2>
		<ol>
		  <li>I, <?php echo $g['sName']; ?> <?php if($g['sRelation'] == "Guardian") echo "C/O"; else if($g['sSex'] == "Male") echo "S/O"; else echo "D/O"; ?> of <?php echo $g['sTitle']; ?>. <?php echo $g['sFName']; ?> have carefully read and fully understood the law prohibiting ragging and the directions of the Supreme Court and the Central/State Government in this regard.</li>
		  <li>I have received a copy of the MHRD Regulations on Curbing the Menace of ragging in higher educational institutions, 2009 and have carefully gone through it.</li>
		  <li>I hereby undertake that
			  <ul>
				<li>I will not indulge in any behavior or act that may come under the definition of ragging .</li>
				<li>I will not participate in or abet or propagate ragging in any form.</li>
				<li>I will not hurt anyone physically or psychologically or cause any other harm.</li>
			  </ul>
		  </li>
		  <li>I hereby agree that if found guilty of any aspect of ragging, I may be punished as per the provisions of the MHRD regulations mentioned above and /or as per the law in force.</li>
		  <li>I hereby affirm that I have not been expelled or debarred from admission by any institution.</li>
		</ol>
		<div class="hideS">Signed this <?php echo $date['mday']; ?> day of <?php echo $date['month']; ?> month of <?php echo $date['year']; ?> year.</div>
		<div class="hideS signature">
			<span style="float:right; margin-right:30pt; ">Signature</span>
			<span>Name: <?php echo $sName; ?></span></div></div>
	<div id="register_3">
		<h2>Undertaking by the Parent / Gaurdian </h2>
		<ol>
		  <li>I, <?php echo $g['sFName']; ?>, <?php if($g['sRelation'] == "Father") echo "F/O"; else if($g['sRelation'] == "Mother") echo "M/O"; else echo "G/O"; ?> <?php echo $g['sName']; ?> have carefully read and fully understood the law prohibiting ragging and the directions of the Supreme Court and the Central/State Government in this regard.</li>
		  <li>I assure you that my <?php if($g['sRelation'] == "Guardian") echo "ward"; else if($g['sSex'] == "Male") echo "son"; else echo "daughter"; ?> <?php echo $g['sName']; ?> will not indulge in any  act of ragging .</li>
		  <li>I hereby agree that if <?php if($g['sSex'] == "Male") echo "he"; else echo "she"; ?> is found guilty of any aspect of ragging, <?php if($g['sSex'] == "Male") echo "he"; else echo "she"; ?> may be punished as per the provisions of the MHRD regulations mentioned above and /or as per the law in force.</li></ol>
		<div class="hideS">Signed this <?php echo $date['mday']; ?> day of <?php echo $date['month']; ?> month of <?php echo $date['year']; ?> year.</div>
		<div class="hideS signature">
			<span style="float:right; ">Signature</span>
			<span>Name: <?php echo $sFName; ?></span></div></div>
	<div id="register_4">
		<h2>Hostel Upkeep Undertaking for the year 2010-11 </h2>
		<p>I, <?php echo $g['sName']; ?> Roll No <?php echo $g['sRollno']; ?> inmate of <?php echo $g['sRoom']; ?> <?php echo $g['sHostel']; ?> Hostel hereby take responsibility for the upkeep of my room along with table, cot, electricalfittings, etc. If any damage occurs, I agree for the deduction of teh repair / replacement / white washing charges fom my deposit / advance.</p>
		<p>I also undertake responsibility for the common walls, fittings in the corridors, bathrooms, quadrangles, etc. If any damage occurs, the amount towards the cost of repairs / replacement shall be shared equally by all the inmates of the hostel and the same shall be deducted from my deposit / advance.</p>
		<div class="hideS signature">
			<span style="float:right; margin-right:30pt; ">Signature</span>
			<span>Date: <?php echo $datestr; ?></span>
			<div align="right" style="margin-right:100pt; ">Name:</div></div></div></div>
<hr class="hideP" />
	<div id="displayXML">
	<div>Do you agree to the terms and conditions mentioned above?</div>
		<form name="sForm" id="sForm" method="POST" action="./loadindb.php">
			<input type="hidden" name="sName" value="<?php echo $g['sName'];?>">
			<input type="hidden" name="sFName" value="<?php echo $g['sFName'];?>">
			<input type="hidden" name="sRelation" value="<?php echo $g['sRelation'];?>">
			<input type="hidden" name="sTitle" value="<?php echo $g['sTitle'];?>">
			<input type="hidden" name="sSex" value="<?php echo $g['sSex'];?>">
			<input type="hidden" name="sRollno" value="<?php echo $g['sRollno'];?>">
			<input type="hidden" name="sClass" value="<?php echo $g['sClass'];?>">
			<input type="hidden" name="sHostel" value="<?php echo $g['sHostel'];?>">
			<input type="hidden" name="sRoom" value="<?php echo $g['sRoom'];?>">
			<input type="hidden" name="sDate" value="<?php echo $g['sDate'];?>">
			<input type="button" value="Agree" onClick="loadXMLDoc('loadindb.php','register')" />
			<input type="button" value="Disagree" onClick="window.location = './index.php';" />
			</form></div>
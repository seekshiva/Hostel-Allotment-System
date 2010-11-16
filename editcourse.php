<?php
$add = 0;
if(!isset($_GET['short'])) {
$short = "";
$name = "";
$tenure = "";
$add = 1;
}
else {
$short = $_GET['short'];
$name = $_GET['name'];
$tenure = $_GET['tenure'];
}
echo "<form action='updtcourse.php?redirectto=dashboard.php' method='post' name='formC'><table>";
echo "<tr><td>Course Short:</td><td><input type='text' maxlength='2' name='short' value='" . $short . "' /><input type='hidden' maxlength='2' name='oldshort' value='" . $short . "' /></td><td>Maximum of two charecters. Set the value to NULL[empty] to remove the course from the list.</td></tr>";
echo "<tr><td>Course Name:</td><td><input type='text' name='name' value='" . $name . "' /></td><td></td></tr>";
echo "<tr><td>Course Period:</td><td><input type='text' name='tenure' value='" . $tenure . "' /></td><td></td></tr>";
echo "<tr><td></td><td><input type='submit' name='period' value='";
echo ($add == 1)?"Add":"Edit";
echo "' onClick=\"return validateC();\" /></td><td></td></tr>";
echo "</table></form>";
?>
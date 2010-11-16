Checking...<br />
<?php
	echo "<br />Host : " . $_POST['host'];
	echo "<br />Username : " . $_POST['username'];
	echo "<br />Password : YES";
	echo "<br />Database : " . $_POST['database'];
	echo "<br />Table Prefix : " . $_POST['tablepref'];
	echo "<br />Institution : " . $_POST['institute'] . "<br />";
	$con = mysql_connect($_POST['host'], $_POST['username'], $_POST['password']) or die("<br />Coul not connect to derver. Please make sure the host, username and password values are correct.");
	mysql_select_db($_POST['database'],$con) or die("Could not establish connection with the database. Make sure the database name is right");
	/*$query = "CREATE TABLE  `" . $_POST['tablepref'] . "list` (
		`sno` INT( 3 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
		`hname` VARCHAR( 20 ) NOT NULL ,
		`nperroom` INT( 2 ) NOT NULL ,
		`totalrooms` INT( 4 ) NOT NULL ,
		`year` VARCHAR( 10 ) NOT NULL ,
		`gender` VARCHAR( 6 ) NOT NULL
	) ENGINE = MYISAM ";
	$result = mysql_query($query,$con) or die("Could not create table _list.");*/
	
	$query = "CREATE TABLE  `" . $_POST['tablepref'] . "logindb` (
		`username` VARCHAR( 32 ) NOT NULL ,
		`password` VARCHAR( 32 ) NOT NULL ,
		PRIMARY KEY (  `username` )
		) ENGINE = MYISAM";
	$result = mysql_query($query,$con) or die("Could not create table _logindb.");
	
	$query = "CREATE TABLE  `" . $_POST['tablepref'] . "namelist` (
		`rollno` INT( 9 ) NOT NULL ,
		`name` VARCHAR( 30 ) NOT NULL ,
		`hostel` VARCHAR( 20 ) NOT NULL ,
		`roomno` INT( 3 ) NOT NULL ,
		`pgrelation` VARCHAR( 10 ) NOT NULL ,
		`pgtitle` VARCHAR( 4 ) NOT NULL ,
		`pgname` VARCHAR( 30 ) NOT NULL ,
		`sex` VARCHAR( 6 ) NOT NULL ,
		`class` VARCHAR( 10 ) NOT NULL ,
		`date_of_joining` INT( 11 ) NOT NULL ,
		PRIMARY KEY (  `rollno` )
		) ENGINE = MYISAM";
	$result = mysql_query($query,$con) or die("Could not create table _namelist.");

	$query = "INSERT INTO  `" . $_POST['tablepref'] . "logindb` (`username` , `password`) VALUES ('admin',  '0192023a7bbd73250516f069df18b500')";	
$result = mysql_query($query, $con) or die("could not insert");

		
	$str = "<?php\n";
	$str .= "$" . "glHost = '" . $_POST['host'] . "';\n";
	$str .= "$" . "glUsername = '" . $_POST['username'] . "';\n";
	$str .= "$" . "glPassword = '" . $_POST['password'] . "';\n";
	$str .= "$" . "glDatabase = '" . $_POST['database'] . "';\n";
	$str .= "$" . "glTablePref = '" . $_POST['tablepref'] . "';\n";
	$str .= "$" . "glInstitute = '" . $_POST['institute'] . "';\n";
	$str .= "?>";
	file_put_contents("./config.inc.php",$str) or die("Failed to write the configuration file");
	
	echo "The app has now been configured to run on your server.";
	echo "<br /><br />Hurray!!!<br />Your settings have successfully been configured. Click <a href=\"index.php\">here</a> to start using the app.";
?>
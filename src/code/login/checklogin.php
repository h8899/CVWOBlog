<?php

session_start();
ob_start();
include '../dbconfig.php';

// Define $myusername and $mypassword
$myusername = $_POST['myusername'];
$mypassword = md5($_POST['mypassword']);
$sql = "SELECT * FROM $tbl_name WHERE username = '$myusername' AND password = '$mypassword'";
$result = mysql_query($sql);
$count = mysql_num_rows($result);
if ($count > 0) {
	$_SESSION['username'] = $myusername;
	header("location: ../../index.php");
} else {
	header("location: main_login.php");
	echo '<script> alert("Wrong username or password"); </script>';
}


<?php
session_start();
include '../dbconfig.php'; 
if (isset($_SESSION['username'])) {
	$id = $_SESSION['id'];
	$author = $_SESSION['author'];
	$user = $_SESSION['username'];
	if ($user != $author) {
		echo ' Only the author can delete the post';
	} else {
		$sql = "DELETE FROM posts WHERE id = '$id'";
		$result = mysql_query($sql);
		echo ' You have deleted the post';
	}
} else {
	header('Location: ../../index.php');
	echo '<script> alert("You must sign in to delete"); </script>';
}
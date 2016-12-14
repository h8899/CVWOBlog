<?php

include_once '../dbconfig.php';

//Pull username, generate new ID and hash password
$newid = uniqid(rand(), false);
$newuser = htmlspecialchars($_POST['newuser']);
$pw1 = htmlspecialchars($_POST['password1']);
$pw = md5($pw1);
$pw2 = htmlspecialchars($_POST['password2']);
$newemail = $_POST['email'];

//Validation rules
if ($pw1 != $pw2) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password fields must match</div><div id="returnVal" style="display:none;">false</div>';

} elseif (strlen($pw1) < 4) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Password must be at least 4 characters</div><div id="returnVal" style="display:none;">false</div>';

} elseif (!filter_var($newemail, FILTER_VALIDATE_EMAIL) == true) {

    echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Must provide a valid email address</div><div id="returnVal" style="display:none;">false</div>';

} else {
    //Validation passed
    if (isset($_POST['newuser']) && !empty(str_replace(' ', '', $_POST['newuser'])) && isset($_POST['password1']) && !empty(str_replace(' ', '', $_POST['password1']))) {

        //Tries inserting into database and add response to variable
		$sql = "INSERT INTO $tbl_name (id, username, password, email) VALUES ('$newid', '$newuser', '$pw', '$newemail');";
		$result = mysql_query($sql);
		echo 'You have succesfully signed up';
		header('Location: main_login.php');
        //Success
    } else {
        //Validation error from empty form variables
        echo 'An error occurred on the form... try again';
    }
};

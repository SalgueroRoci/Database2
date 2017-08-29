<?php 
/* Main page with links */

session_start();
require_once('../connect.php');

/* User login process, checks if user exists and password is correct */

// Escape email to protect against SQL injections
$userNam = $mysqli->escape_string($_POST['username']);
$result = $mysqli->query("SELECT * FROM USERS WHERE Username='$userNam'");

if ( $result->num_rows == 0 ){ // User doesn't exist
    $_SESSION['message'] = "User with that username doesn't exist!";
    header("location: error.php");
}
else { // User exists
    $user = $result->fetch_assoc();

	$pswd = md5($_POST['password']); 
    if ($pswd == $user['Password'] ) {
        
        $_SESSION['username'] = $user['Username'];
        $_SESSION['fullname'] = $user['UserFullName'];
        
        // This is how we'll know the user is logged in
        $_SESSION['logged_in'] = true;

        header("location: email/profile.php");
    }
    else {
        $_SESSION['message'] = "You have entered wrong password, try again!";
        header("location: error.php");
    }
}
?>
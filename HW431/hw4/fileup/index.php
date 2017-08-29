<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: ../error.php");    
}
else {
    // Makes it easier to read
    $username = $_SESSION['username'];
    $first_name = $_SESSION['fullname'];
}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome <?php $first_name ?></title>
  <style>
	
</style>
</head>

<body>
  
	<a href="submit.php">Submit Photos</a>
	<a href="search.php">Search Photos</a>
	</br><a href="index.php"><button class="button button-block" name="logout"/>Home</button></a> 
	<a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

</body>
</html>

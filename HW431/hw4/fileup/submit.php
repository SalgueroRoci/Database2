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
  <title>Welcome <?php $username ?></title>
  <style>
	
</style>
</head>

<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload"> </br>
	<input type="text" placeholder="Add Title Here" name="title" maxlength="25" required /> </br>
	<input type="text" placeholder="Add Caption here" name="caption" maxlength="100" required /> </br>
    <input type="submit" value="Upload Image" name="submit">
</form>
	</br><a href="index.php"><button class="button button-block" name="logout"/>Home</button></a> 
	<a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

</body>
</html>

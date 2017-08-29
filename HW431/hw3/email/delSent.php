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

			require_once('../../connect.php');
			$id = $_GET['msgID'];
			
			//update as read 
			$sql = "UPDATE Mailbox SET StatusSent='Deleted' WHERE MessageID='$id'";

			if ($mysqli->query($sql) === TRUE) {
				//echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $mysqli->error;
			}
			
			$mysqli->close(); 
			header("location: profile.php");
          ?>
    
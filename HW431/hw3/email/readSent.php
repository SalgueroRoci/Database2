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
  
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>
          
          <p>
		  <a href="../logout.php"><button class="button-block" name="logout"/>Log Out</button></a>
		  <a href="profile.php"><button class="button-block" name="send"/>Inbox</button></a>
		   <a href="send.php"><button class="button-block" name="send"/>Send</button></a>           
		   
          </p>        
		                      
          <?php 
			require_once('../../connect.php');
			$id = $_GET['msgID']; 
			
			//update as read 
			$sql = "UPDATE Mailbox SET StatusSent='Read' WHERE MessageID='$id'";

			if ($mysqli->query($sql) === TRUE) {
				//echo "Record updated successfully";
			} else {
				echo "Error updating record: " . $mysqli->error;
			}
			
			$sql = $mysqli->query("SELECT * FROM Mailbox WHERE MessageID='$id'");
			$msg = $sql->fetch_assoc();
						
			echo "<p>Subject: ". $msg['Subject']. "</br>Time: ". $msg['MsgTime']. "</p><p>From: ".
				$msg['Sender']. "</p><p>Mail: " .$msg['MsgText']."</p>";		
			
			echo '<a href="delSent.php?msgID='.$id.'"><button class="button-block" name="delete"/>Delete</button></a>';
			$mysqli->close(); 
          ?>
    </div>


</body>
</html>

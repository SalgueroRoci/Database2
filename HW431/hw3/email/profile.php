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
	a {
		text-decoration:none;
		color:black; 
		
	}
	a:hover {
		text-decoration:underline;
		color:blue; 
	}
</style>
</head>

<body>
  <div class="form">

          <h1>Welcome</h1>
          
          <p>
		   <a href="send.php"><button class="button button-block" name="send"/>Send</button></a>
		   <a href="sentMail.php"><button class="button button-block" name="send"/>Sent Mail</button></a>
           <a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
          </p>        
		                      
          <?php 
			require_once('../../connect.php');
			$user = strtolower($username); 
			$sql = $mysqli->query("SELECT * FROM Mailbox WHERE Receiver='$user'");
			while($messages = $sql->fetch_assoc()) {
				if($messages['StatMain'] == "Deleted") {
					
				}
				else if($messages['StatMain'] == "Unread") {
					echo '<p><a style="font-weight:bold;" href="read.php?msgID='.$messages['MessageID'].'"> Sender: ' . 
					$messages['Sender'] . "	&nbsp;&nbsp; Subject: " .  $messages['Subject'] . "</a></p>";
				}
				else if($messages['StatMain'] == "Read") {
					echo '<p><a style="font-weight:normal;" href="read.php?msgID='.$messages['MessageID'].
					'"> Sender: ' . $messages['Sender'] . "	&nbsp;&nbsp; Subject: " .  $messages['Subject'] . "</a></p>";
				}
			}		
			
			$mysqli->close(); 
          ?>
    </div>


</body>
</html>

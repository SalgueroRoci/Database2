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
		   <a href="profile.php"><button class="button button-block" name="send"/>Inbox</button></a>
           <a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>
          </p>        
		                      
          <?php 
			require_once('../../connect.php');
			$user = strtolower($username); 
			$sql = $mysqli->query("SELECT * FROM Mailbox WHERE Sender='$user'");
			while($messages = $sql->fetch_assoc()) {
				if($messages['StatusSent'] == "Deleted") {
					
				}
				else {
					echo '<p><a style="font-weight:normal;" href="readSent.php?msgID='.$messages['MessageID'].
					'"> Sender: ' . $messages['Receiver'] . "	&nbsp;&nbsp; Subject: " .  $messages['Subject'] . "</a></p>";
				}
			}		
			
			$mysqli->close(); 
          ?>
    </div>


</body>
</html>

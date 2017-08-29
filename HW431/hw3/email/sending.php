<?php
/* Displays user information and some useful messages */
session_start();
$_SESSION['message'] = "";
require_once('../../connect.php');

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

			//get number of mail and add one to create id
			$data = $mysqli->query("SELECT count(*) as total FROM Mailbox");
			$info = $data->fetch_assoc();			
			$id = $info['total'] + 1; 
			$sub = $_POST['subject']; 
			$msgtxt = $_POST['message']; 
			$reciever = strtolower($_POST['reciever']);
			
			//check if user exists
			$check = $mysqli->query("SELECT * FROM USERS WHERE Username='$reciever'"); 
			if ( $check->num_rows == 0 ){ // User doesn't exist
				$_SESSION['message'] = "User with that username doesn't exist! Cannot send message.";
			}
			else { 
				//insert new message 
				$sql = "INSERT INTO Mailbox (MessageID, Subject, MsgTime, MsgText, Sender, Receiver, StatMain, StatusSent)
						VALUES ('$id', '$sub', NOW(), '$msgtxt', '$username', '$reciever', 'Unread', 'Sent');";
					
				//if the query is successsful, message sent
				if ($mysqli->query($sql) === true){
					$_SESSION['message'] = "Message sent!";
				}
				else {
					$_SESSION['message'] = 'Failed to send message!';
					echo $mysqli->error; 
				}
			}
            $mysqli->close();     

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome <?php $username ?></title>
  
</head>

<body>
  <div class="form">

          <h1>Send Mail</h1>
         
		  <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
			  
		  <a href="profile.php"><button class="button button-block" name="home"/>Inbox</button></a>
          <a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>


</body>
</html>
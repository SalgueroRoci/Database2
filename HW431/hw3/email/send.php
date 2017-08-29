<?php
/* Displays user information and some useful messages */
session_start();
$_SESSION['message'] = "";

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

          <h1>Send Mail</h1>
          <form class="form" action="sending.php" method="post" enctype="multipart/form-data" autocomplete="off">
			  <input type="text" placeholder="Send to" name="reciever" required />
			  <input type="text" placeholder="Subject" name="subject" required />
			  <textarea rows="4" cols="50" placeholder="Message" name="message" required></textarea>
			  <input type="submit" value="Send" name="sending" />
		  </form>     
		  <a href="profile.php"><button class="button button-block" name="home"/>Inbox</button></a>
          <a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

    </div>


</body>
</html>
<?php
/* Displays all error messages */
session_start();

    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: home.php" );
    endif;
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
</head>
<body>

    <h1>Error</h1>
    <p>
    
    </p>     
    <a href="home.php"><button class="button button-block"/>Home</button></a>
</body>
</html>

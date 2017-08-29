<?php
session_start();
$_SESSION['message'] = '';
require_once('../connect.php');

//the form has been submitted with post
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    //two passwords are equal to each other
    if ($_POST['password'] == $_POST['confirmpassword']) {
        
        //set all the post variables
        $username = $mysqli->real_escape_string($_POST['username']);
		$username = strtolower($username);
        $fName = $mysqli->real_escape_string($_POST['fullName']);
        $password = md5($_POST['password']); //md5 has password for security
        
        
                //set session variables
                $_SESSION['username'] = $username;
               
			    //insert user data into database
                $sql = "INSERT INTO USERS (UserFullName, Username, Password)
						VALUES ('$fName', '$username', '$password');";
                
                //if the query is successsful, redirect to welcome.php page, done!
                if ($mysqli->query($sql) === true){
                    $_SESSION['message'] = "Registration succesful! Added $username to the database!";
                    header("location: login.php");
                }
                else {
                    $_SESSION['message'] = 'User already exists!';
                }
                $mysqli->close();          
            
    }
    else {
        $_SESSION['message'] = 'Two passwords do not match!';
    }
}
?>
<!DOCTYPE html>
<html>
<head>
  <title>Sign up!</title>
</head>


<body>
    <h1>Create an account</h1>
    <form class="form" action="signup.php" method="post" enctype="multipart/form-data" autocomplete="off">
      <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
      <input type="text" placeholder="User Name" name="username" required />
      <input type="fullName" placeholder="Full Name" name="fullName" required />
      <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
      <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
      <input type="submit" value="Register" name="register" />
    </form>
</body>
</html>

	
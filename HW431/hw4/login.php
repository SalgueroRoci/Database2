
<!DOCTYPE html>
<html>
<head>
  <title>Welcome to email system!</title>
</head>


<body>       
               
          <form action="userAuth.php" method="post" autocomplete="off">
          
            <label>
              User Name<span class="req">*</span>
            </label>
            <input type="text" required autocomplete="off" name="username"/> 
           
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password"/>
                              
          <button name="login" />Log In</button>
          
          </form>
</body>
</html>

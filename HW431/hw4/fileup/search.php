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
  <title>Welcome <?php echo $username; ?></title>
  <style>
	.dis_img {
		display: block; 
		background-color:rgba(0,0,0,0.05);
		border-radius:15px; 
		margins: 15px; 
		padding:5px; 
		width:250px; height:300px; 
	}
</style>
</head>

<body>
	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" >
		<input type="text" placeholder="Search Through Photos" name="searchVal" maxlength="100" required /> </br>
		<input type="submit" value="Search Images" name="searchsubmit">
	</form>
	<?php 
		//Open database and get an array of titles and captions
		require_once('../../connect.php');
		
		$value = $_POST['searchVal']; 
		
		$sql = $mysqli->query("SELECT * FROM PHOTOS WHERE caption LIKE '%" . $value . 
					"%' OR PhotoName LIKE '%". $value . "%';");
		
					
		if(isset($_POST['searchsubmit'])) {
			//echo "SELECT * FROM PHOTOS WHERE caption LIKE '%" . $value . 
					//"%' OR PhotoName LIKE '%". $value . "%';";
					
			while($image = $sql->fetch_assoc()) {
				$imgurl = $image['photodata'];
				echo '<div class="dis_img">';
				echo "<p>Title:" . $image['PhotoName'] . "</p>"; 
				echo '<img src="'.$imgurl.'" alt="'.$image['PhotoName'].
					'-not found" style="width:128px;height:128px;">';
				echo "<p>Caption: " . $image['caption'] . "</p>"; 
				echo "<p>Upload By: " . $image['Username'] . "</p>"; 
				echo "</div>"; 				
			}
			
				
		}
		$mysqli->close(); 
	?>
	
	</br></br><a href="submit.php">Submit Photos</a>
	</br><a href="index.php"><button class="button button-block" name="logout"/>Home</button></a> 
	<a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

</body>
</html>


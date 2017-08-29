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

//---------------------------------------------------------
		//Folder to place items
		$target_dir = 'images/'; 
		
		//Make a unique file name 
		$fn = str_replace(' ','',trim($_POST["title"])); //take out all whitespace 
		$temp = explode(".", $_FILES["fileToUpload"]["name"]);
		$id = round(microtime(true)) . '.' . end($temp);
		
		$target_file = $target_dir . $fn . $id;
				
		$uploadOk = 1;
		//find the file extension
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
		
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				echo "</br>File is an image - " . $check["mime"] . ".";
				$uploadOk = 1; 
			} else {
				echo "</br>File is not an image.";
				$uploadOk = 0;
			}
		}
		
		// Check if file already exists
		if (file_exists($target_file)) {
			echo "</br>Sorry, file already exists.";
			$uploadOk = 0;
		}
		
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo "</br>Sorry, your file is too large.";
			$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
			echo "</br>Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
			$uploadOk = 0;
		}
		
		
//add to Database=========================================
		require_once('../../connect.php');

		//the form has been submitted with post
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			
			//set all the post variables, username, title, file location, and caption
			//file location $target_file
			//username $username
			$title = $mysqli->real_escape_string($_POST['title']);
			$caption = $mysqli->real_escape_string($_POST['caption']);
			
			//insert user data into database
			$sql = "INSERT INTO PHOTOS (PhotoName, caption, photodata, Username)
						VALUES ('$title', '$caption', '$target_file', '$username');";		

			
			
			//if the query is successsful, redirect to welcome.php page, done!
			if ($mysqli->query($sql) === true){
			
				// Then upload file to directory 
				if ($uploadOk == 0) {
					echo "</br>Sorry, your file was not uploaded.";
				// if everything is ok, try to upload file
				} else {
					if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
						$test = true; 
					} else {
						$test = false; 
					}
				}
				
				//check if upload successful 
				if($test == true) {
					echo "</br>The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
					echo "</br>Upload successful!";
				}
				else {
					$sql = "DELETE FROM PHOTOS
								WHERE photodata = $target_file;";	
					$mysqli->query($sql);			
					echo "</br>Sorry, there was an error uploading your file.";
				}
			}
			else {
				echo '</br>Something went wrong with database!';
			}
				$mysqli->close();          
					
		}
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Welcome <?php echo $username; ?></title>
  <style>
	
</style>
</head>

<body>
	</br></br><a href="submit.php">Submit More Photos</a>
	</br><a href="index.php"><button class="button button-block" name="logout"/>Home</button></a> 
	<a href="../logout.php"><button class="button button-block" name="logout"/>Log Out</button></a>

</body>
</html>


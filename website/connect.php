<?php 
$servername = "ecsmysql";
$us= "cs431s29";
$password = "aingohye";
$db="cs431s29";
$conn = mysqli_connect($servername,$us,$password,$db); 

 if(!$conn) {
    die("Connection failed: " .mysqli_connect_error());
}
//echo "Connected successfully";

?>
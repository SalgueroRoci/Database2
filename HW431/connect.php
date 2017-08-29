<?php 
	$servername = "ecsmysql";
	$us = "cs431s29";
	$password = "aingohye";
	$servername = "ecsmysql";
	$dbname = "cs431s29";

// Create connection
$mysqli = new mysqli($servername, $us, $password, $dbname);

// Check connection
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
} 
//echo "Connected successfully";

?>
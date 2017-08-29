<?php
$conn = mysqli_connect("ecsmysql","cs431s29","aingohye");
if (!$conn)
  {
  die('Could not connect: ' . mysql_error());
  }

mysqli_select_db($conn,"cs431s29");
if(isset($_GET['roomID']) ) {
	   $room = $_GET['roomID'];
}

$result = mysqli_query($conn,"SELECT * FROM chat_messages WHERE RoomNo=$room ORDER BY id ASC");


while($row = mysqli_fetch_array($result))
  {
  echo '<p>'.'<span>'.$row['sender'].'</span>'. '&nbsp;&nbsp;' . $row['message'].'</p>';
  }


mysqli_close($conn);
?>

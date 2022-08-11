<?php
// handle_form.php
$data = substr($_GET['movement'],0,1);

echo $data;

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sm_robot_move";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
date_default_timezone_set("Asia/Riyadh");
$timeStamp= " at " . date("h:i  -  Y/m/d");

$sql = "INSERT INTO robot_control_panel (robot_move,time_stamp)
VALUES ('$data','$timeStamp')";

if ($conn->query($sql) === TRUE) {
  echo "   ".$timeStamp;
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
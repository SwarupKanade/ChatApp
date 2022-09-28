<?php
  $hostname = "localhost";
  $username = "chatapp";
  $password = "chatapp";
  $dbname = "chatapp";

  $conn = mysqli_connect($hostname, $username, $password, $dbname);
  if(!$conn){
    echo "Database connection error".mysqli_connect_error();
  }

  date_default_timezone_set("Asia/Kolkata");
?>

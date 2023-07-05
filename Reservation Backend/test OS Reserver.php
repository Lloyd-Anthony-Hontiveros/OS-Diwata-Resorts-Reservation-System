<?php

  $date = $_GET['Date'];
  $name = $_GET['Name'];

  $serverName = "localhost";
  $username = "root";
  $password = "";
  $DBname = "ostest_connectdb";
  $con = mysqli_connect($serverName, $username, $password, $DBname);

  //Check if Date is valid

  $check = mysqli_query($con, "SELECT * FROM booking_status WHERE Date = '$date'");

  //Check if Duplicate Entries exist
  if (mysqli_num_rows($check) > 0) {
    echo "Date Already Booked";
    header("location: test OS HTML.php");
    exit();
  }
  else {
    //Insert DATA
    $sql = "INSERT INTO `booking_status`(`Date`, `Payment Status`, `Booking Client`) VALUES ('$date','Paid','$name')";
    $result = mysqli_query($con, $sql);

    header("location: test OS HTML.php");
    exit();
  }




?>

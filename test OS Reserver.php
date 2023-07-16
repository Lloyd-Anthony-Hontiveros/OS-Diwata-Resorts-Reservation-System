<?php

  $date = $_POST['Date'];
  $name = $_POST['Name'];
  $headcount = $_POST["Head-Count"];
  $paidprice = (int)$_POST["Total-Price"];

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
    header("location: reservations.php");
    exit();
  }
  else {
    //Insert DATA
    $sql = "INSERT INTO `booking_status`(`Date`, `Booking Client`, `Head Count`, `Paid Price`) VALUES ('$date', '$name', '$headcount', '$paidprice')";
    $result = mysqli_query($con, $sql);

    header("location: reservations.php");
    exit();
  }




?>

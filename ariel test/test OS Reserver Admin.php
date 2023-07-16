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
    header("location: test OS HTML Admin.php");
    exit();
  }
  else {
    //Update DATA
    $sql = "UPDATE `booking_status` SET `Date`='$date',`Head Count`='$headcount',`Paid Price`='$paidprice' WHERE Name = '$name'";
    $result = mysqli_query($con, $sql);

    header("location: test OS HTML Admin.php");
    exit();
  }




?>

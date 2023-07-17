<?php

$date = $_POST['Date'];
$name = $_POST['Name'];
$headcount = $_POST["Head-Count"];
$paidprice = (int) $_POST['Total-Price'];

$serverName = "localhost";
$username = "root";
$password = "";
$DBname = "ostest_connectdb";
$con = mysqli_connect($serverName, $username, $password, $DBname);

//Update DATA
$sql = "UPDATE `booking_status` SET `Date`='$date',`Head Count`='$headcount',`Paid Price`='$paidprice' WHERE `booking_status`.`Booking Client` = \"" . $name . "\"";
$result = mysqli_query($con, $sql);

header("location: test OS HTML Admin.php");
exit();




?>
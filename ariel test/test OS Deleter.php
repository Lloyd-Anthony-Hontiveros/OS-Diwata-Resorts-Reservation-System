<?php
 $servername = "localhost";
 $username="root";
 $password="";
 $database="ostest_connectdb";

 $con = mysqli_connect($servername,$username,$password,$database);

 $name = $_GET['Name'];

 $sql = "DELETE FROM `booking_status` WHERE 'Booking Client' = '$name'";
 $result = mysqli_query($con, $sql);

 header("location: test OS HTML Admin.php");

 ?>
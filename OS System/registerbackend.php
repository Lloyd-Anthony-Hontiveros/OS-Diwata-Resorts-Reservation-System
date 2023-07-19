<?php
require "database.php";

if (isset($_POST["submit"])) {
    if (is_nan($_POST["contact number"])) {
        echo "<div class='alert alert-danger'>Please Enter an Actual Number</div>";
    }
}
$username = $_POST["user"];
$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
$FullName = $_POST["FullName"];
$surname = $_POST["surname"];
$firstname = $_POST["firstname"];
$email_address = $_POST["email_address"];
$contact_number = $_POST["contact_number"];

$sql = "INSERT INTO `users`(`username`, `password`, `FullName`, `surname`, `firstname`, `email address`, `contact number`)
VALUES ('" . $username . "', '" . $password . "', '" . $FullName . "', '" . $surname . "', '" . $firstname . "', '" . $email_address . "','+63" . $contact_number . "')";
$result = mysqli_query($con, $sql);
if ($result) {
    header("location: loginUser.php?message=Registration Successful!");
}
?>
<?php

//Connection Code Block
$serverName = "localhost";
$username = "root";
$password = "";
$DBname = "ostest_connectdb";
$con = mysqli_connect($serverName, $username, $password, $DBname);

?>

<!DOCTYPE html>
<html>
<head>
  <title>My Profile</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f5f5f5;
    }

    h1 {
      color: #333;
    }

    .profile {
      background-color: #fff;
      padding: 20px;
      border-radius: 5px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    }

    .profile img {
      width: 150px;
      border-radius: 50%;
    }

    .profile h2 {
      margin-top: 0;
    }

    .profile p {
      margin-bottom: 10px;
    }
  </style>
</head>
<body>
  <div class="profile">
    <img src="your-profile-picture.jpg" alt="Profile Picture">
    <h2>Your Name</h2>
    <p>Email: yourname@example.com</p>
    <p>Location: Your City, Country</p>
    <p>About Me: Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tristique mauris a massa vestibulum, vitae tempus libero facilisis.</p>
  </div>
</body>

</html>

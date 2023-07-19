<?php
session_start();

require_once "database.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../Referenced Frameworks/Bootstrap/bootstrap.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../Referenced Frameworks/Font Awesome/css/fontawesome.css">
    <link rel="stylesheet" href="../Referenced Frameworks/Font Awesome/css/solid.css">

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const togglePassword = document.querySelector('.toggle-password');
            const passwordInput = document.querySelector('input[name="password"]');

            togglePassword.addEventListener('click', function () {
                const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
                passwordInput.setAttribute('type', type);
                this.querySelector('i').classList.toggle('fa-eye-slash');
                this.querySelector('i').classList.toggle('fa-eye');
            });
        });
    </script>
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center vh-100">
        <form action="login.php" method="post">
            <div class="form-group">
                <label for="user" class="col-form-label">Username</label>
                <input type="text" placeholder="Enter Username: " name="user" class="form-control">
                <br>
            </div>
            <label for="password" class="col-form-label">Password</label>
            <div class="form-group input-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary toggle-password" type="button" data-toggle="tooltip"
                        data-placement="top" title="Show Password"> <i class="fa-solid fa-eye-slash"></i>
                </div>
            </div>
            <div class="form-group">
                <label for="fullname" class="col-form-label">Full Name</label>
                <input type="text" placeholder="Enter Full Name: " name="FullName" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label for="surname" class="col-form-label">Surname</label>
                <input type="text" placeholder="Enter Surname: " name="surname" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label for="firstname" class="col-form-label">First Name</label>
                <input type="text" placeholder="Enter First Name: " name="firstname" class="form-control">
                <br>
            </div>
            <div class="form-group">
                <label for="email address" class="col-form-label">Email Address</label>
                <input type="email" placeholder="Enter Email Address: " name="email address" class="form-control">
                <br>
            </div>
            <label for="contact number" class="col-form-label">Contact Number</label>
            <div class="form-group input-group">
                <input type="text" placeholder="Enter Contact Number: " name="contact number" class="form-control">
                <div class="input-group-prepend">
                    <span class="btn btn-secondary">+63</span>
                </div>
                <br>
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
                <!-- <span style="display: inline-block; width: 300px"></span> -->

                <a type="button" class="btn btn-light position-relative end-0" href="homepage.php">Home</a>
            </div>
            <?php
            if (isset($_POST["login"])) {
                $email = $_POST["user"];
                $password = $_POST["password"];
                $sql = "SELECT * FROM admin WHERE username = '$email'";
                $result = mysqli_query($con, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                if ($user) {
                    if ($password == $user["password"]) {
                        header("location: test OS HTML Admin.php");
                    } else {
                        echo "<div class='alert alert-danger'>Password does not match</div>";
                    }
                } else {
                    echo "<div class='alert alert-danger'>Username does not match</div>";
                }
            }
            ?>
        </form>
        <br>
    </div>

    <script src="../Referenced Frameworks/Bootstrap/bootstrap.js"></script>
</body>

</html>
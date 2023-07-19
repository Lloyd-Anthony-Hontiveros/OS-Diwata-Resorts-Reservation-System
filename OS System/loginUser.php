<?php
session_start();

require_once "database.php";

function console_log($output, $with_script_tags = true) {
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

$message = "nein";
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
        <form action="loginUser.php" method="post">
            <h1 type="text" color="black" class="btn btn-light position-relative end-0 fs-1 disabled">User Log-in</h1>
            <div>
                <?php
                if ($_POST) {
                    if (strcmp($message, "nein") != 0) {
                        $message = $_GET["message"];
                        echo "<div class='alert alert-success'>$message</div>";
                    }
                }
                ?>
            </div>
            <div class="form-group">
                <label for="user" class="col-form-label">Username</label>
                <input type="text" placeholder="Enter Username: " name="user" class="form-control">
                <br>
            </div>
            <label for="password" class="col-form-label">Password</label>
            <div class="form-group input-group">
                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
                <div class="input-group-append">
                    <button class="btn btn-secondary toggle-password" type="button" data-toggle="tooltip"
                        data-placement="top" title="Show Password"> <i class="fa-solid fa-eye-slash"></i>
                </div>
            </div>
            <div class="form-btn">
                <input type="submit" value="Login" name="login" class="btn btn-primary">
                <span style="display: inline-block; width: 50px"></span>
                <a type="button" class="btn btn-secondary position-relative end-0" href="registerUser.php">Register</a>
                <span style="display: inline-block; width: 50px"></span>
                <a type="button" class="btn btn-light position-relative end-0" href="homepage.php">Home</a>
            </div>
            <?php
            if (isset($_POST["login"])) {
                $username = $_POST["user"];
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $result = mysqli_query($con, $sql);
                $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $password = password_verify($_POST["password"], $user["password"]);
                if ($user) {
                    if ($password) {
                        $_SESSION['username'] = $user['username'];
                        $_SESSION['FullName'] = $user['FullName'];
                        $_SESSION['surname'] = $user['surname'];
                        $_SESSION['firstname'] = $user['firstname'];
                        $_SESSION['email address'] = $user['email address'];
                        $_SESSION['contact number'] = $user['contact number'];

                        header("location: homepage.php?");
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
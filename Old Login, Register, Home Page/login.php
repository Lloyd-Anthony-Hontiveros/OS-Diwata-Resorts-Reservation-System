<?php
session_start();
//  if (isset($_SESSION["user"])) {
//     header("Location: almazan/Homepage.php");
// }
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
    <link rel="stylesheet" href="../Referenced Frameworks/Font Awesome/css/solid.css">
</head>
<body>
    <div class="container">
        <?php
        if (isset($_POST["login"])) {
           $email = $_POST["email"];
           $password = $_POST["password"];
            require_once "database.php";
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($conn, $sql);
            $user = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if ($user) {
                if (password_verify($password, $user["password"])) {
                    // session_start();
                    $_SESSION["user"] = "yes";
                    header("Location: almazan/Homepage.php");
                    // die();
                }else{
                    echo "<div class='alert alert-danger'>Password does not match</div>";
                }
            }else{
                echo "<div class='alert alert-danger'>Email does not match</div>";
            }
        }

        if (isset($_POST["home"])) {
            header("Location: almazan/Homepage.php");
        }
        ?>
      <form action="login.php" method="post" class="position-relative">
        <div class="form-group">
            <input type="email" placeholder="Enter Email:" name="email" class="form-control">
        </div>
        <div class="form-group input-group">
            <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary toggle-password" type="button" data-toggle="tooltip" data-placement="top" title="Show Password"> <i class="fa-solid fa-eye-slash"></i>
            </div>
        </div>
        <div class="form-btn">
            <input type="submit" value="Login" name="login" class="btn btn-primary">
            <!-- <span style="display: inline-block; width: 300px"></span> -->
            <input type="submit" class="btn btn-light position-absolute end-0" value="Home" name="home">
        </div>
      </form>
      <br>
     <div><p>Not registered yet? <a href="registration.php">Register Here</a></p></div>
    </div>
</body>
</html>
<?php
    session_start();

    unset($_SESSION['username']);
    unset($_SESSION['FullName']);
    unset($_SESSION['surname']);
    unset($_SESSION['firstname']);
    unset($_SESSION['email address']);
    unset($_SESSION['contact number']);

    session_destroy();

    header("location: homepage.php");

?>
<?php

    //Connection Code Block
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $DBname = "ostest_connectdb";
    $con = mysqli_connect($serverName, $username, $password, $DBname);

    //Connection Check Block
    if ($con) {
        echo "Test Sucessful";
    }
    else {
        mysqli_connect_error();
    }
?>
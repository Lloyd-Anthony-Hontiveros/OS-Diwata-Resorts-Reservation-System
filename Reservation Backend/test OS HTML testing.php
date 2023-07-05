<?php

require 'test OS HTML MonthStuff.php';

//Connection Code Block
$serverName = "localhost";
$username = "root";
$password = "";
$DBname = "ostest_connectdb";
$con = mysqli_connect($serverName, $username, $password, $DBname);

//Connection Check Block
if ($con) {
    echo "Test Sucessful <br> <br> <br>";
}
else {
    mysqli_connect_error();
}

function checkStatus($date) {
    global $con;

    error_reporting(0);
    $result = mysqli_query($con, "SELECT * FROM booking_status WHERE Date = '$date'");

    $row = $result->fetch_assoc();
    if (strtolower($row["Payment Status"]) === "paid") {
        return "<div class='d-flex justify-content-center align-items-center' style='width: 100px; height: 70px; background-color: red; margin: 20px'>Booked</div>";
    } else {
        $link = "test OS HTML Entry.php?date=" . urlencode($date); // Generate link with the date parameter
        return "<a href='$link'><div class='d-flex justify-content-center align-items-center text-light' style='width: 100px; height: 70px; background-color: green; margin: 20px'>Available</div></a>";
    }
}


function generateCalendarDates($startDay, $numDays, $monthNumber) {
    $html = '<div class="container">
    <div class="row">
        <span class="col text-center align-content-center" style="display: inline">
            <button type="button" class="btn btn-primary"><-  </button><span style="font-size: 32px">  May 2023  </span><button type="button" class="btn btn-primary">  -></button>
            <br>
            <br>
        </span>
    </div>
    <div class="row">
        <div class="col text-center">Sunday</div>
        <div class="col text-center">Monday</div>
        <div class="col text-center">Tuesday</div>
        <div class="col text-center">Wednesday</div>
        <div class="col text-center">Thursday</div>
        <div class="col text-center">Friday</div>
        <div class="col text-center">Saturday</div>
    </div>';
    $currentDay = 1;
    $skipDays = $startDay - 1; // Number of days to skip at the beginning

    for ($row = 1; $row <= 6; $row++) {
        $html .= "<div class='row' div id='table$monthNumber'>";
        for ($col = 1; $col <= 7; $col++) {
            if ($skipDays > 0) {
                $html .= "<div class='col text-center'></div>";
                $skipDays--;
            } elseif ($currentDay > $numDays) {
                $html .= "<div class='col text-center'></div>";
            } else {
                $date = date('Y-m-d', strtotime("2023-".$monthNumber."-$currentDay")); // Date Formatting for SQL
                $status = checkStatus($date); // SQL Query in checkStatus
                $html .= "<div class='col text-center'><span class='date'>$currentDay</span><span>$status</span></div>";
                $currentDay++;
            }
        }
        $html .= "</div>";
    }
    $html .= "</div>";

    return $html;
}

?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <script>
        function showPrev(monthNumber) {
            if (monthNumber - 1 > 0) {
                document.getElementById("table" + (monthNumber - 1)).style.display = "block";
            }
            else {
                document.getElementById("table" + 12).style.display = "block";
            }
            return null;
        }
        function showNext(monthNumber) {
            if (monthNumber + 1 < 13) {
                document.getElementById("table" + (monthNumber + 1)).style.display = "block";
            }
            else {
                document.getElementById("table" + 1).style.display = "block";
            }
            return null;
        }
        function currentDate() {
            date = new Date();
            year = date.getFullYear();
            month = date.getMonth() + 1;
            day = date.getDate();
            return strtotime(sprintf("%d-%d-%d"), year, month, day);
        }
    </script>
</head>

<body>
    <!-- <div class="container">
        <div class="row">
            <div class="col-8 text-center">
                <button type="button" class="btn btn-light"><-</button><h2>May 2023</h2><button type="button" class="btn btn-light">-></button>
            </div>
        </div>
    <div class="row">
        <div class="col text-center">Sunday</div>
        <div class="col text-center">Monday</div>
        <div class="col text-center">Tuesday</div>
        <div class="col text-center">Wednesday</div>
        <div class="col text-center">Thursday</div>
        <div class="col text-center">Friday</div>
        <div class="col text-center">Saturday</div>
    </div> -->
    <?php echo generateCalendarDates(5, 31, 5); ?>
    <!-- </div> -->
</body>

</html>
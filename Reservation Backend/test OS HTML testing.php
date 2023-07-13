<?php

require_once 'test OS HTML MonthStuff.php';
require_once 'database.php';

function isDatePast($givenDate) {
    $currentDate = new DateTime();
    $currentDate->setTime(0, 0, 0); // Set time to midnight

    $givenDateTime = new DateTime($givenDate);
    $givenDateTime->setTime(0, 0, 0); // Set time to midnight

    return $givenDateTime < $currentDate;
}


//Check if the date is found within the Reservation database. Displays Red "Booked" Box if true, Green "Available" Box if false
function checkStatus($date) {
    global $con;

    error_reporting(0);
    $result = mysqli_query($con, "SELECT * FROM booking_status WHERE Date = '$date'");

    $row = $result->fetch_assoc();
    if (isDatePast($date)) {
        return "<div class='d-flex justify-content-center align-items-center' style='width: 100px; height: 70px; background-color: orange; margin: 20px'>Unavailable</div>";
    }
    else if (strtolower($row["Payment Status"]) === "paid") {
        return "<div class='d-flex justify-content-center align-items-center' style='width: 100px; height: 70px; background-color: red; margin: 20px'>Booked</div>";
    }
    else {
        // $link = "test OS HTML Entry.php?date=" . urlencode($date); // Generate link with the date parameter
        // return "<a href='$link'><div class='d-flex justify-content-center align-items-center text-light' style='width: 100px; height: 70px; background-color: green; margin: 20px'>Available</div></a>";
        $clickedDate = urlencode($date);
        return "<button type=\"button\" class=\"btn btn-success d-flex justify-content-center align-items-center text-light\" style=\"width: 100px; height: 70px; background-color: green; margin: 20px\" data-bs-toggle=\"modal\" data-bs-target=\"#exampleModal\" data-bs-date=\"$clickedDate\">Available</button>";
    }
}


function generateCalendarDates($startDay, $numDays, $monthNumber) {
    $html = '';
    $currentDay = 1;
    $skipDays = $startDay - 1; // Number of days to skip at the beginning

    $html .= "<div class='row calendar-table' id='table$monthNumber' style='display: none'>"; // Add the calendar-table class to the main div

    for ($row = 1; $row <= 6; $row++) {
        $html .= "<div class='row'>"; // Create a new row for each iteration
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
        $html .= "</div>"; // Close the row div
    }

    $html .= "</div>"; // Close the main div
    return $html;
}


?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../Referenced Frameworks/Bootstrap/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../Referenced Frameworks/Font Awesome/css/solid.css">

    <script>

    //Shameful Date Array
    const dates = new Array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");

    //Show Previous Month in the Calendar
    function showPrev(stringMonth) {
        monthNumber = parseInt(stringMonth);
        var prevMonthNumber = monthNumber - 1;
        if (prevMonthNumber < 1) {
            prevMonthNumber = 12;
        }
        document.getElementById("dateHeader").innerHTML = dates[prevMonthNumber - 1] + " 2023";

        var tables = document.getElementsByClassName("calendar-table");
        for (var i = 0; i < tables.length; i++) {
        tables[i].style.display = 'none';
        }

        document.getElementById("table" + prevMonthNumber).style.display = '';
        sessionStorage.setItem("monthNumber", prevMonthNumber);
    }

    //Show Next Month in the Calendar
    function showNext(stringMonth) {
        monthNumber = parseInt(stringMonth);
        var nextMonthNumber = monthNumber + 1;
        if (nextMonthNumber > 12) {
            nextMonthNumber = 1;
        }
        document.getElementById("dateHeader").innerHTML = dates[nextMonthNumber - 1] + " 2023";

        var tables = document.getElementsByClassName("calendar-table");
        for (var i = 0; i < tables.length; i++) {
        tables[i].style.display = 'none';
        }

        document.getElementById("table" + nextMonthNumber).style.display = '';
        sessionStorage.setItem("monthNumber", nextMonthNumber);
    }

    //Sets Initial Date Month (July)
    sessionStorage.setItem("monthNumber", "7");


    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <button type="button" class="btn btn-primary" onclick="showPrev(sessionStorage.getItem('monthNumber'))"><-</button><span style="font-size: 32px" id="dateHeader">  <script>document.write(dates[sessionStorage.getItem("monthNumber") - 1] + " 2023")</script>  </span><button type="button" class="btn btn-primary" onclick="showNext(sessionStorage.getItem('monthNumber'))">-></button>
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
        </div>

        <?php echo generateCalendarDates($Jan->startDay, $Jan->endDay, $Jan->monthNumber); ?>
        <?php echo generateCalendarDates($Feb->startDay, $Feb->endDay, $Feb->monthNumber); ?>
        <?php echo generateCalendarDates($Mar->startDay, $Mar->endDay, $Mar->monthNumber); ?>
        <?php echo generateCalendarDates($Apr->startDay, $Apr->endDay, $Apr->monthNumber); ?>
        <?php echo generateCalendarDates($May->startDay, $May->endDay, $May->monthNumber); ?>
        <?php echo generateCalendarDates($Jun->startDay, $Jun->endDay, $Jun->monthNumber); ?>
        <?php echo generateCalendarDates($Jul->startDay, $Jul->endDay, $Jul->monthNumber); ?>
        <?php echo generateCalendarDates($Aug->startDay, $Aug->endDay, $Aug->monthNumber); ?>
        <?php echo generateCalendarDates($Sep->startDay, $Sep->endDay, $Sep->monthNumber); ?>
        <?php echo generateCalendarDates($Oct->startDay, $Oct->endDay, $Oct->monthNumber); ?>
        <?php echo generateCalendarDates($Nov->startDay, $Nov->endDay, $Nov->monthNumber); ?>
        <?php echo generateCalendarDates($Dec->startDay, $Dec->endDay, $Dec->monthNumber); ?>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <form action="test OS Reserver.php" method="GET">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Reservation Entry</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-8 m-auto">
                                        <div class="mb-3">
                                            <label for="dateInput" class="col-form-label">Date:</label>
                                            <input type="date" class="form-control" id="dateInput">
                                        </div>
                                        <div class="mb-3">
                                            <label for="dateInput" class="col-form-label">Name:</label>
                                            <input type="text" class="form-control" id="name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="amenities-group" class="col-form-label">Addons: </label>
                                                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off">
                                                <br>
                                                <label class="btn btn-outline-primary" for="btncheck1">Checkbox 1</label>

                                                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck2">Checkbox 2</label>

                                                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck3">Checkbox 3</label>
                                                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck4">Checkbox 4</label>

                                                <input type="checkbox" class="btn-check" id="btncheck5" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck5">Checkbox 5</label>

                                                <input type="checkbox" class="btn-check" id="btncheck6" autocomplete="off">
                                                <label class="btn btn-outline-primary" for="btncheck6">Checkbox 6</label>
                                        </div>
                                        <div class="mb-3">
                                            <label for="head-count" class="col-form-label">Price per Person: &#8369;250</label>
                                            <label for="head-count" class="col-form-label">Number of People: </label>
                                            <input type="number" name="head-count" id="head-count" min="1" max="10">
                                        </div>
                                        <div class="mb-3">
                                            <input type="text" class="form-control-plaintext fw-bold" id="total-price" value="Total Price: 0">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><i class="fa-solid fa-xmark"></i> Close</button>
                            <button type="button" class="btn btn-danger" onclick="clearForm()"><i class="fa-solid fa-xmark"></i> Clear</button>
                            <input type="submit" class="btn btn-primary" value="Reserve"><i class="fa-solid fa-check"></i></input>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            document.getElementById("table7").style.display = "";
        </script>
    </div>
    <script src="../Referenced Frameworks/Bootstrap/bootstrap.js"></script>
    <script src="../Referenced Frameworks/jquery-3.7.0.min.js"></script>
    <script>

        //Clear Function
        function clearForm() {
        document.getElementById("dateInput").value = ""; // Clear the Date input field
        document.getElementById("head-count").value = ""; // Clear the Name input field
        }

        //Modal Overlay Script
        const exampleModal = document.getElementById('exampleModal')
        if (exampleModal) {
            exampleModal.addEventListener('show.bs.modal', event => {
            // Button that triggered the modal
            const button = event.relatedTarget
            // Extract info from data-bs-* attributes
            const recipient = button.getAttribute('data-bs-date')

            // Update the modal's content.
            const modalBodyInput = exampleModal.querySelector('.modal-body input')
            modalBodyInput.value = recipient
            })
        }

        //Detect Changes in Input and Update Price in Real Time
        $(document).ready(function() {
            $("#head-count").on('input', function() {
                var headcount = document.getElementById("head-count").value;
                document.getElementById("total-price").value = "Total Price: " + (headcount * 250);
            });
        });


    </script>
</body>

</html>
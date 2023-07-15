<?php

    require_once 'database.php';

?>

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry</title>
    <link rel="stylesheet" type="text/css" href="../Referenced Frameworks/Bootstrap/bootstrap.css">
    <script src="../Referenced Frameworks/Bootstrap/bootstrap.js"></script>


    <script>
    function clearForm() {
        document.getElementById("Date").value = ""; // Clear the Date input field
        document.getElementById("Name").value = ""; // Clear the Name input field
    }

    function reserve() {

    }
    </script>

</head>

<body>
    <!-- Form Action -> Link to PHP File -->
    <form name="entryform" action="test OS Reserver.php" method="get" class="position-absolute start-50" style="top: 200px; right: 150px">
        <p><strong>Date:</strong>    </p>
        <input type="date" name="Date" id="Date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>">
        <p><strong>Name:</strong> </p>
        <input type="text" name="Name" id="Name">
        <p><strong>Price:</strong> </p>
        <p>$250 / 1 Night</p>
        <p><strong>Payment Method:</strong></p>
        <div class="col-4">
            <div class="list-group list-group-horizontal" id="payment-options" role="tablist">
                <a class="list-group-item list-group-item-action active" id="option-credit-cards" data-bs-toggle="list"
                    href="#list-home" role="tab" aria-controls="list-home">Credit Card</a>
                <a class="list-group-item list-group-item-action" id="option-gcash" data-bs-toggle="list"
                    href="#list-profile" role="tab" aria-controls="list-profile">GCash</a>
                <a class="list-group-item list-group-item-action" id="option-paypal" data-bs-toggle="list"
                    href="#list-messages" role="tab" aria-controls="list-messages">Paypal</a>
            </div>
            <br>
            <div class="list-group list-group-horizontal" id="buttons-tab" role="tablist">
                <input type="submit" class="list-group-item btn-danger" id="btn-book" value="Book"></input>
                <input type="button" class="list-group-item btn-danger" id="btn-clear" value="Clear" onclick="clearForm()">
            </div>
        </div>

</form>

</html>
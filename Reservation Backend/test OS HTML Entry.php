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

<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Entry</title>
    <link rel="stylesheet" type="text/css" href="bootstrap.css">
    <script src="bootstrap.js"></script>

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
    <form name="entryform" action="test OS Reserver.php" method="get">
        <p>Date: </p>
        <input type="date" name="Date" id="Date" value="<?php echo isset($_GET['date']) ? $_GET['date'] : ''; ?>">
        <p>Name: </p>
        <input type="text" name="Name" id="Name">
        <p>Price: </p>
        <p>$250 / 1 Night</p>
        <p>Payment Method: </p>
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
                <input type="submit" class="list-group-item btn-danger" id="btn-clear" value="Book"></input>
                <input type="button" class="list-group-item btn-danger" id="btn-clear" value="Clear" onclick="clearForm()"></input>
            </div>
        </div>

    </form>
</body>

</html>
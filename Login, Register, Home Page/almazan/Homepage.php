<?php




?>

<!DOCTYPE html>
<html>
    <head>
        <Title> DIWATA VILLA </Title>
        <link rel="stylesheet" type="text/css" href="homestyle.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    </head>
    <body>
        <div class="container">
            <div class="slides">
                <div class="image-container">
                    <img src="1.jpg">
                    <h1>DIWATA VILLA</h1>
                </div>
            </div>
            <div class="list">
                <ul>
                    <li><a href="#"><strong>Home</strong></a></li>
                    <li><a href="../../Amenities Page/amenities.html"><strong>Ameneties</strong></a></li>
                    <li><a href="http://localhost:8080/cart/index.php"><strong>Add-ons</strong></a></li>
                    <li><a href="#"><strong>Reservation</strong></a></li>
                    <?php
                        //NOT WORKING
                        if(!isset($_SESSION["user"])) {
                            echo "<li><a href='../logout.php'><strong>Log out</strong></a></li>";
                        }
                        else {
                            echo "<li><a href='../login.php'><strong>Log in</strong></a></li>";
                        }
                    ?>

                </ul>
            </div>
        </div>
        </div>
    <div class="hey">
         <h2> ABOUT US </h2>

    </div>
        <div class="container">

            <div class="image2">
            <img src="2.jpg" width="300px">
            </div>

            <div class="introduction">
                <h4>Introducing Diwata Villa Resort - Where Enchantment Meets Luxury!</h4><br>

                <h5>Escape to a world of unparalleled beauty and immerse yourself in a truly enchanting experience at Diwata Villa Resort.
                Nestled amidst lush greenery and overlooking breathtaking vistas,
                our resort is a sanctuary designed to transport you to a realm of relaxation and indulgence.</h>
            </div>
        </div>
<br>
        <div class="table">
        <table style="width:100%">
            <tr>
              <th>CONTACT US</th>
              <th>ADDRESS</th>
              <th>OPERATOR</th>
            </tr>

            <tr>
                <td> <i class="fa fa-phone" style="font-size:20px"></i> +639308584580 <br><i class="fa fa-envelope" style="font-size:24px"></i> diwatavilla@gmail.com</td>
                <td> <i class="fa fa-map-marker" style="font-size:24px"></i> Pansol, Calamba City, Laguna</td>
                <td><i class="fa fa-user" style="font-size:20px"></i> Christian Almazan <br> <i class="fa fa-user" style="font-size:20px"></i> Lloyd Hontiveros <br> <i class="fa fa-user" style="font-size:20px"></i> Ariel Nazareno
                </td>
            </tr>






          </table>
        </div>
    </body>
    </html>
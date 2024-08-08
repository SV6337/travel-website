<?php
session_start();
include("connect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TOURSCAPE</title>
    <link rel="stylesheet" href="homepage.css">
    <script src="https://kit.fontawesome.com/936d7d915d.js" crossorigin="anonymous"></script>
    <style>
        /* Add necessary CSS styles for the display and disappearance of the user's name */
        .user-greeting {
            text-align: center;
            padding: 15%;
            display: none;
        }
        .user-greeting p {
            font-size: 50px;
            font-weight: bold;
        }
    </style>
    <script>
        // JavaScript to toggle the display of the user's name
        function toggleGreeting() {
            var greeting = document.getElementById('user-greeting');
            if (greeting.style.display === 'none') {
                greeting.style.display = 'block';
            } else {
                greeting.style.display = 'none';
            }
        }

        window.onload = function() {
            <?php if(isset($_SESSION['email'])): ?>
                toggleGreeting();
            <?php endif; ?>
        };
    </script>
</head>
<body>
    <div id="header">
        <div class="container">
            <nav>
                <img src="logo.png" alt="" class="logo">
                <ul id="sidemenu">
                    <li><a href="#">Trips</a></li>
                    <li><a href="#about">Restaurants</a></li>
                    <li><a href="logout.php" >Logout</a></li>
                    <li><a href="#contact">Contact us</a></li>
                    <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSf27dWc8kX9ixnXsJC0dGsdb1b6q7hAlxUrnlT8Haqm9nt9jQ/viewform?usp=sf_link">BOOK A TOUR</a></li>
                    <i class="fa-sharp fa-solid fa-xmark"></i>
                </ul>
                <i class="fa-solid fa-bars"></i>
            </nav>
            
            <div class="header-text">
                <h1>TOURSCAPE</h1>
                <h2 style="color: white;">YOUR TRIP, <span style="color: rgb(254, 60, 60);">OUR PLAN</span></h2>
            </div>
        </div>
    </div>

    <div id="about">
        <div class="container">
            <div class="row">
                <div class="about-col-1">
                    <img src="logo.jpg" alt="">
                </div>

                <div class="about-col-2">
                    <h1 class="sub-title">
                        About us 
                    </h1>
                    <p>
                        At TOURSCAPE, we simplify travel planning by addressing the common challenges travelers face. Our integrated platform consolidates hotel bookings, local attractions, and reliable guides into one seamless experience. We aim to make every trip easy to plan and unforgettable.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div id="portfolio">
        <div class="container">
            <h1 class="sub-title">DESTINATION</h1>
            <div class="work-list">
                <div class="work">
                    <img src="beach.jpg" alt="">
                    <div class="layer">
                        <h3>BEACHES</h3>
                        <p>Discover India's Coastal Gems: Serenity, Adventure, and Stunning Sunsets Await!</p>
                        <a href="beach.html"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="forest.jpg" alt="">
                    <div class="layer">
                        <h3>FORESTS</h3>
                        <p>Enter the Realm of Nature's Majesty: Where Every Tree Tells a Story.</p>
                        <a href="forest.html"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="hill.jpeg" alt="">
                    <div class="layer">
                        <h3>HILL STATIONS</h3>
                        <p>Elevate Your Senses: Hill Stations, Where Serenity Meets Adventure.</p>
                        <a href="hill station.html"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                </div>
                <div class="work">
                    <img src="history.jpg" alt="">
                    <div class="layer">
                        <h3>HISTORIC PLACES</h3>
                        <p>Step into the Past, Embrace the Legacy: Historic Places, Where Time Unfolds Its Secrets.</p>
                        <a href="hack.html"><i class="fa-solid fa-arrow-up-right-from-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="user-greeting" class="user-greeting">
        <p>Hello
        <?php 
        if(isset($_SESSION['email'])){
            $email=$_SESSION['email'];
            $query=mysqli_query($conn, "SELECT users.* FROM users WHERE users.email='$email'");
            while($row=mysqli_fetch_array($query)){
                echo $row['firstName'].' '.$row['lastName'];
            }
        }
        ?> :)
        </p>
      <p style="color: black;"> </p>
    </div>
</body>
</html>

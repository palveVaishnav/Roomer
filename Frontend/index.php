<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="Assets/css/reusable.css">
    <link rel="stylesheet" href="Assets/css/style.css">
</head>

<body>
    <!-- Left Menu Section -->
    <div class="left-menu">
        <!-- Logo and Tagline  -->
        <div class="logo_container" id="logoContainer">
            <div class="logo" id="logo">
                _RooMER.
            </div>
            <div class="tagline_container" id="taglineContainer">
                <p class="tagline">YOUR NEW HOME !</p>
            </div>
        </div>

        <div class="index" id="index">
            <ul class="menu-items">
                <li class="menu-item">
                    <a href="tennent.html">PROFILE</a>
                </li>
                <li class="menu-item">YOUR BOOKINGS</li>
                <hr>
                <li class="menu-item">
                    <a href="index.html">HOME</a>
                </li>
                <li class="menu-item">
                    <a href="booking.html">BOOK NOW </a>
                </li>
                <li class="menu-item">
                    <a href="offers.html">SPECIAL OFFERS</a>
                </li>
                <li class="menu-item">
                    <a href="rooms.html">ROOMS AND FLATS</a>
                </li>
                <li class="menu-item">
                    <a href="rooms.html">REVIEWS AND TESTIMONALS</a>
                </li>
                <li class="menu-item">
                    <a href="rooms.html">SPECIAL OFFERS</a>
                </li>
                <li class="menu-item">
                    <a href="rooms.html">CONTACT US</a>
                </li>
                <li class="menu-item">
                    <a href="rooms.html">ABOUT US</a>
                </li>
                <!-- Add more menu items as needed -->
            </ul>
        </div>

        <div class="login_container" id="loginContainer">
            <button class="home_button">
                <a href="login.html">Login</a>
            </button>
            <button class="home_button">
                <a href="signup.html">Sign Up</a>
            </button>
        </div>
        <a href="#landlord" class="landlord_link">Are You a Property Owner ?</a>
    </div>

    <!-- Right Hero Section -->
    <div class="main_page">

        <!-- <h1>Welcome to Our Website</h1> -->
        <div class="hero_lander">

            <div class="brand_intro" id="brandIntro">
                <img class="brand_image" src="Assets/Images/flower.jpg" alt="">
                <div class="brand_lander">
                    <h3>_RooMER.</h3>
                    <hr>
                    <h1>BOOK SMILES, NOT JUST ROOMS !</h1>
                </div>
            </div>

            <!-- Filters and Other search options   -->
            <div class="room_search" id="roomSearch">
                <div class="hero_search" id="heroSearch">
                    <!-- <p></p> -->
                    <div class="search_by">
                        <input class="search_item" type="text" placeholder="Enter City" name="City" required>
                        <input class="search_item" type="text" placeholder="Enter Area" name="Area" required>
                        <p>or</p>
                        <input class="search_item" type="text" placeholder="Enter PinCode" name="pinCode" required>
                    </div>

                    <form method="POST" action="filter.php" name="filters">
                        <div class="filter_by">
                            <p>Filter by : </p>

                            <select name="FLATS" id="FLATS" class="filter_item">
                                <option value="flat">Flats</option>
                                <option value="room">Rooms</option>
                                <option value="hostel">Hostels</option>
                                <option value="pg">PG's</option>

                            </select>
                            <!-- </article> -->
                            <article class="filter_item" id="filterItem">Prize</article>
                            <!-- Ratings -->
                            <select name="ratings" id="ratings" class="filter_item">
                                <option value="4"> Ratings : 4+</option>
                                <option value="3"> Ratings : 3+</option>
                                <option value="2"> Ratings : 2+</option>
                                <option value="1"> Ratings : 1+</option>
                            </select>

                            <select name="availability" id="availability" class="filter_item">
                                <option value="NOW">Immediate</option>
                                <option value="7">Within 7 Days</option>
                                <option value="15">Within 15 Days</option>
                                <option value="30">Within 30 Days</option>
                            </select>
                        </div> <!-- flter_by -->
                    </form>

                </div> <!-- hero_search -->
            </div>
        </div>
        <!--  End Lander Section -->
        <?php
        $conn = pg_connect('host=localhost dbname=roomer user=postgres password=123456789');
        if (!$conn) {
            echo "<h1>Not Connected</h1>";
        } else {
            $query = "SELECT * FROM property";
            $result = pg_query($conn, $query);
            if (!$result) {
                echo "<h1> Connected but unable to render the data </h1>";
            }
            while ($row = pg_fetch_assoc($result)) {
                $p_id = $row['p_id'];
                $p_city = $row['p_city'];
                $p_area = $row['p_area'];
                $p_description = $row['p_description'];
                $p_type = $row['p_type'];
                $p_rating = $row['p_rating'];
                $p_gender = $row['p_gender'];
                $p_food = ($row['p_food'] == 'yes') ? 'Available' : 'Not Available';
                $p_parking = ($row['p_parking'] == 'yes') ? 'Available' : 'Not Available';
                $p_wifi = ($row['p_wifi'] == 'yes') ? 'Available' : 'Not Available';
                $p_availability = $row['p_availability'];
                $p_owner = $row['p_owner'];
                $p_image = $row['p_image'];

                echo '
        <div class="rooms_container" id="roomsContainer">
            <div class="rooms" id="rooms">
                <!-- Room Card 1-->
                <div class="room_card " id="roomCard">
                    <!-- Room Image  -->
                    <section class="image_section">
                        <img class="room_image" src="' . $p_image . '" alt="Room-01">
                    </section>
                    <!-- Room Details  -->
                    <section class="text_section">
                        <!-- Details of the room  -->
                        <div class="room_location">
                            <h5 class="area" id="area">' . $p_city . ' > ' . $p_area . '</h5>
                        </div>
                        <div class="room_details">
                            <h2 class="room_prize" id="roomPrize">' . $p_description . '</h2>
                            <h3 class="room_type" id="roomType">' . $p_type . '</h3>
                        </div>
                        <div class="room_facilities">
                            <article class="facility">Ratings : ' . $p_rating . '/5</article>
                            <article class="facility" id="roomGender"> Gender : ' . $p_gender . '</article>
                            <article class="facility" id="roomType">Type : ' . $p_type . '</article>
                            <article class="facility"> Food : ' . $p_food . '</article>
                            <article class="facility">Parking : ' . $p_parking . '</article>
                            <article class="facility">Wifi : ' . $p_wifi . '</article>
                            <article class="facility" id="availability"> With in : ' . $p_availability . ' days</article>
                        </div>
                        <hr class="white">
                        <div class="more_details">
                            <button class="home_button"><a href="property.html">More Details</a></button>
                            <button class="home_button"><a href="property.html">Book now </a> </button>
                            <button class="home_button"><a href="chat.html">' . $p_owner . '</a></button>
                        </div>
                    </section>
                </div>
            </div>
        </div>';
            }





        }





        ?>
        <!-- Room Cards and Details  -->

        <footer>
            <div class="footer_about">
                <h2>ABOUT US</h2>
                <p> f snsfsjfsfjsab;lks sakfhdsakfjhdfd fdasufa
                    fasigf f dsafgsdifu fdsffodsfydsf sofsydf f dsofdysf ds
                </p>
            </div>

            <div class="footer_nav">
                <h2>Quick Links</h2>
                <section class="footer_links">
                    <a href="#">Home</a>
                    <a href="#">Book now</a>
                    <a href="#">Special Offers</a>
                    <a href="#">Rooms and Flats</a>
                    <a href="#">Reviews</a>
                    <a href="#">Testimonals</a>
                </section>
                <br><br><br>
                <p>@Copyright 2023 all rights reserved</p>
            </div>

            <div class="footer_contact">
                <h2>Connect</h2>
                <section class="footer_links">
                    <a href="#">Email : writeto@roomers.org</a>
                    <a href="#"> +91 9080706050</a>

                </section>

                <h2>Social Media</h2>
                <section class="footer_links">
                    <a href="#">Instagram</a>
                    <a href="#">Twitter</a>
                    <a href="#">Fackbook</a>
                </section>
            </div>
        </footer>

    </div> <!-- Right Scrollable section -->

    <!-- JavaScript File  -->
    <script src="Assets/script.js"></script>
</body>

</html>
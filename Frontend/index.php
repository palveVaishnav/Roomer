<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="Assets/css/reusable.css">
    <link rel="stylesheet" href="Assets/css/style.css">
</head>

<body>
    <!-- Left Menu Section -->
    <div class="left-menu" id="leftMenu"></div>
    <script>
        // Fetch and inject the component into the container
        fetch('./components/leftIndex.html')
            .then(response => response.text())
            .then(menubar => {
                document.getElementById('leftMenu').innerHTML = menubar;
            });
    </script>

    <!-- Right Hero Section -->
    <div class="main_page">

        <!-- <h1>Welcome to Our Website</h1> -->
        <div class="hero_lander">
            <div class="brand_intro" id="brandIntro">
                <img class="brand_image" src="./Assets/images/lander1.webp" alt="">
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
        require_once('pgConfig.php');
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

            $secondQuery = "SELECT lord_name FROM LANDLORD WHERE lord_id = $p_owner";
            $secondResult = pg_query($conn, $secondQuery);
            $name = '';
            if ($row = pg_fetch_assoc($secondResult)) {
                $name = $row['lord_name'];
            }

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
                            <button class="home_button"><a href="property.php">More Details</a></button>
                            <button class="home_button"><a href="property.php">Book now </a> </button>
                            <button class="home_button"><a href="chat.php" id="' . $p_owner . '"> Talk to ' . $name . '</a></button>
                        </div>
                    </section>
                </div>
            </div>
        </div>';
        }
        ?>
        <!-- Room Cards and Details  -->

        <footer id="footerPage"></footer>
        <script>
            fetch('./components/footer.html')
                .then(res => res.text())
                .then(footer => {
                    document.getElementById('footerPage').innerHTML = footer;
                })
        </script>

    </div> <!-- Right Scrollable section -->

    <!-- JavaScript File  -->

</body>

</html>
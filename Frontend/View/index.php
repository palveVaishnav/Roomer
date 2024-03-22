<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/roomCards.css">
    <style>
        .error {
            color: #333;
            font-size: 2em;
        }
    </style>
</head>

<body>
    <?php
    require_once ('../components/leftIndex.php');
    require_once ('./roomCard.php');
    ?>

    <!-- Right Hero Section -->
    <div class="main_page">

        <!-- <h1>Welcome to Our Website</h1> -->
        <div class="hero_lander">
            <div class="brand_intro" id="brandIntro">
                <img class="brand_image" src="../Assets/images/lander1.webp" alt="">
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
                    <br><br>
                    <form method="POST" name="filters" id="filterForm">
                        <div class="search_by">
                            <input class="search_item" type="text" placeholder="Enter City" name="City" id="cityInput"
                                required>
                            <input class="search_item" type="text" placeholder="Enter Area" name="Area">
                            <input type="Submit" class="search_item searchButton" value="Search" />
                            <!-- <p>or</p> -->
                            <!-- <input class="search_item" type="text" placeholder="Enter PinCode" name="pinCode" required> -->
                        </div>
                    </form>
                    <br>

                    <div class="filter_by">
                        <h3>Filter By</h3>

                        <select name="FLATS" id="FLATS" class="filter_item">
                            <option value="flat">Flats</option>
                            <option value="room">Rooms</option>
                            <option value="hostel">Hostels</option>
                            <option value="pg">PG's</option>

                        </select>
                        <article class="filter_item" id="filterItem">Prize</article>
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
                            <div>
                                Note :Working on more Filters
                            </div>
                            <!-- this Filters arre Not Working Now  -->
                        </select>
                    </div>
                    <!-- flter_by -->

                </div> <!-- hero_search -->
            </div>
        </div>



        <!--  End Lander Section -->
        <?php
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            require_once ('./pgConfig.php');
            $city = $_POST['City'];
            $city = ucwords(strtolower($city));

            $area = $_POST['Area'];
            $area = ucwords(strtolower($area));

            $query = "SELECT * FROM property WHERE p_city = '$city' AND p_area = $area ";
            // ignore the warning for area
            @$result = pg_query($conn, $query);


            if ($result) {
                // here means that we have result for both the entered parameters area and city.
                while ($row = pg_fetch_assoc($result)) {
                    $p_booked = $row['p_booked'];
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
                    // $p_image = $row['p_image'];
                    // $images=explode(',',$p_image);
                    $p_image_string = $row['p_image'];
                    // Remove the surrounding braces
                    $p_image_string = trim($p_image_string, '{}');
                    // Split the string into an array using the comma as a delimiter
                    $p_image_array = explode(',', $p_image_string);
                    // Now $p_image_array contains the individual elements
                    // Accessing the first element
                    $firstimage = $p_image_array[0];

                    $secondQuery = "SELECT lord_name FROM LANDLORD WHERE lord_id = $p_owner";
                    $secondResult = pg_query($conn, $secondQuery);
                    $name = '';
                    if ($row = pg_fetch_assoc($secondResult)) {
                        $name = $row['lord_name'];
                    }
                    if ($p_booked != 'yes') {
                        available($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name);
                    } else {
                        notAvailable($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name);
                    }
                }
            } else {
                // something is not available -> city is compulsory 
                // if area is not available, give different areas of the same city , 
                /// if area is inputed yet not room available
                if ($area) {
                    echo "<div class='error'> Oops !! Rooms Not Available for $area !! <br> Here are Rooms from Different areas of $city </div>";
                }

                $query = "SELECT * FROM property WHERE p_city = '$city'";
                $result = pg_query($conn, $query);
                // WE have no data of the given ciity
                if (!$result) {
                    echo "<div class='error' > Sorry !! We have Nothing for Your City $city  </div>";
                }
                // WE have some rooms in other areas of the city
                else {
                    while ($row = pg_fetch_assoc($result)) {
                        $p_booked = $row['p_booked'];
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
                        // $p_image = $row['p_image'];
                        // $images=explode(',',$p_image);
                        $p_image_string = $row['p_image'];
                        // Remove the surrounding braces
                        $p_image_string = trim($p_image_string, '{}');
                        // Split the string into an array using the comma as a delimiter
                        $p_image_array = explode(',', $p_image_string);
                        // Now $p_image_array contains the individual elements
                        // Accessing the first element
                        $firstimage = $p_image_array[0];

                        $secondQuery = "SELECT lord_name FROM LANDLORD WHERE lord_id = $p_owner";
                        $secondResult = pg_query($conn, $secondQuery);
                        $name = '';
                        if ($row = pg_fetch_assoc($secondResult)) {
                            $name = $row['lord_name'];
                        }
                        if ($p_booked != 'yes') {
                            available($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name);
                        } else {
                            notAvailable($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name);
                        }
                    }

                }

            }

            // initaily load all the data 
        } else {
            require_once ('./homeRender.php');
        }
        ?>

        <!-- Room Cards and Details  -->

        <footer id="footerPage"></footer>
        <script>
            window.onload = function () {
                document.getElementById("cityInput").focus();
            };
            function submitForm() {
                document.getElementById("filterForm").reset();
            }
            fetch('../components/footer.html')
                .then(res => res.text())
                .then(footer => {
                    document.getElementById('footerPage').innerHTML = footer;
                })
        </script>

    </div> <!-- Right Scrollable section -->

    <!-- JavaScript File  -->

</body>

</html>
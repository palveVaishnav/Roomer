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
                <img class="room_image" src="../' . $p_image . '" alt="Room-01">
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
                    <button class="home_button">
                        <a href="./property.php?id=' . $p_id . '">More Details</a>
                    </button>
                    <button class="home_button">
                        <a href="./checkout.php?id='.$p_id.'">Book now </a> 
                    </button>
                    <button class="home_button">
                        <a href="./chat.php" id="' . $p_owner . '"> Talk to ' . $name . '</a>
                    </button>
                </div>
            </section>
        </div>
    </div>
</div>';
}

?>
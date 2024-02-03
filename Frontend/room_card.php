while ($row = pg_fetch_assoc($result)) {
$p_id = $row['p_id'];
$p_address = $row['p_address'];
$room_type = "flat"; // You might want to fetch this value from the database
$p_description = $row['p_description'];
$p_prize = $row['p_prize'];
$ratings = "****"; // You might want to fetch this value from the database
$girl_boy = "girl"; // You might want to fetch this value from the database
$bhk = "1bhk"; // You might want to fetch this value from the database
$meals_mes = "available"; // You might want to fetch this value from the database
$parking = "available"; // You might want to fetch this value from the database
$wifi = "available"; // You might want to fetch this value from the database
$immediate = $row['p_availability']; // You might want to fetch this value from the database
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
                // need to divide the address in two parts , city and area -> for searching ..
                <div class="room_location">
                    <h5 class="area" id="area"> ' . $p_address . '</h5>
                </div>
                <div class="room_details">
                    <h2 class="room_type" id="roomType">' . $room_type . '</h2>
                    <h3 class="room_prize" id="roomPrize">' . $p_prize . '</h3>
                </div>
                <div class="room_facilities">
                    <article class="facility">Ratings : ' . $ratings . '</article>
                    <article class="facility" id="roomGender"> Gender : ' . $girl_boy . '</article>
                    <article class="facility" id="roomType">Type : ' . $bhk . '</article>
                    <article class="facility"> Food : ' . $meals_mes . '</article>
                    <article class="facility">Parking : ' . $parking . '</article>
                    <article class="facility">Wifi ' . $wifi . '</article>
                    <article class="facility" id="availability"> Availability : ' . $immediate . '</article>
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
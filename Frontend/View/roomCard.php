<?php
function available($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name) {
    echo '
        <div class="rooms_container" id="roomsContainer">
            <div class="rooms" id="rooms">
                <!-- Room Card 1-->
                <div class="room_card " id="roomCard">
                    <!-- Room Image  -->
                    <section class="image_section">
                        <img class="room_image" src="../' . $firstimage . '" alt="Room-01">
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
                                <a href="./checkout.php?id=' . $p_id . '">Book now </a> 
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

function notAvailable($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name) {
    echo '
        <div class="rooms_container" id="roomsContainer">
            <div class="rooms" id="rooms">
                <!-- Room Card 1-->
                <div class="room_card " id="roomCard">
                    <!-- Room Image  -->
                    <section class="image_section">
                        <div class="image_container" style="display:grid;place-items:center">
                            <!--<img class="room_image" src="../' . $firstimage . '" alt="Room-01">-->
                            <h1 class="image_text">Already Booked</h1>
                        </div>
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
                                <a href="./checkout.php?id=' . $p_id . '">Book now </a> 
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

function profileCard($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name) {
    echo '
        <div class="rooms_container" id="roomsContainer">
            <div class="rooms" id="rooms">
                <!-- Room Card 1-->
                <div class="room_card " id="roomCard">
                    <!-- Room Image  -->
                    <section class="image_section">
                        <img class="room_image" src="../' . $firstimage . '" alt="Room-01">
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
                    </section>
                </div>
            </div>
        </div>';
}


?>
<?php
require_once('propRender.php');
echo '
        
<div class="propLander">
    <div class="propImages" style="text-align:center;">
        <img src="../' . $p_image . '" alt="property-image" id="myimage">
    </div>
    <div class="propLocation">
        <div class="city">
            <img src="../Assets/icons/city.png" alt="city-image" class="iconSize">
            <p>City :' . $p_city . ' </p>
        </div>
        <div class="area">
            <img src="../Assets/icons/area.png" alt="city-image" class="iconSize">
            <p> Area :' . $p_area . ' </p>
        </div>
        <div class="money">
            <img src="../Assets/icons/money.png" alt="city-image" class="iconSize">
            <p>' . $p_prize . '</p>
        </div>
        <div class="propQuicks">
            <div class="propPageBtn" 
                style="border:2px solid black;padding: 20px 30px;border-radius:10px;"
            >
                <a href="./checkout.php"> Book Now</a>
            </div>
            <div class="propPageBtn"
                style="border:2px solid black;padding: 20px 30px;border-radius:10px;"
            >
                <a href="./chat.php"> Talk to ' . $l_name . '</a>
            </div>
        </div>
    </div>
</div>
<!-- Prop Lander -->

<div class="facilities">
    <div class="facility card">
        <img src="../Assets/icons/rating.png" alt="" class="facIcon">
        <h3 class="facName">' . $p_rating . '/5</h3>

    </div>
    <div class="facility card">
        <!-- Not in database -->
        <img src="../Assets/icons/ac.png" alt="" class="facIcon">
        <h3 class="facName">yes</h3>
    </div>
    <div class="facility card">
        <img src="../Assets/icons/food.png" alt="" class="facIcon">
        <h3 class="facName">' . $p_food . '</h3>
    </div>
    <div class="facility card">
        <img src="../Assets/icons/parking.png" alt="" class="facIcon">
        <h3 class="facName">' . $p_parking . '</h3>
    </div>
    <div class="facility card">
        <!-- Not in database -->
        <img src="../Assets/icons/type.png" alt="" class="facIcon">
        <h3 class="facName">' . $p_type . '</h3>
    </div>
    <div class="facility card">
        <img src="../Assets/icons/wifi.png" alt="" class="facIcon">
        <h3 class="facName">' . $p_wifi . '</h3>
    </div>
    <div class="facility card">
        <img src="../Assets/icons/gender.png" alt="" class="facIcon">
        <h3 class="facName">' . $p_gender . '</h3>
    </div>
    <div class="facility card">
        <img src="../Assets/icons/furniture.png" alt="" class="facIcon">
        <h3 class="facName">Furnished</h3>
    </div>
</div>


<div class="detContainer">
    <h2>About the Property :</h2>
    <div class="details">' . $p_details . '</div>
</div>



<div class="mapContainer">
    <iframe class="map" src=' . $embed_url . ' width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
    </iframe>
</div>
    
    ';
?>
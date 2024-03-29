<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Property-Page </title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/propPage.css">
</head>

<body>
    <!-- Left Menu Section -->
    <?php
    require_once ('../components/leftIndex.php');
    // Get all the dada 
    // get the id from the index.php page
    require_once ('propRender.php');

    ?>


    <!-- Right Hero Section -->
    <div class="main_page">
        <div class="propLander">
            <?php require_once ('lander.php'); ?>
        </div>

        <!-- Prop Lander -->
        <div class="propText">
            <?php
            echo '
                    <div class="address">

                        <div style="display:flex;justify-content:left;text-align:left;margin:0 1em;padding:10px;">
                            <img src="../Assets/icons/amount.png" alt="" style="height:1.5em;margin:0 10px;" />
                            
                            <div>  Rent:   ' . $p_prize . ' </div>
                        </div>

                        <div style="display:flex;justify-content:left;margin:0 1em;padding:10px;">
                            <img src="../Assets/icons/city.png" alt="" style="height:1.5em;margin:0 10px;" />
                            <div> Location :   ' . $p_area . ' , ' . $p_city . '. </div>
                        </div>
                     
                     </div>
                    <div class="quickLinks">
                        <a href="https://earth.google.com/web/search/' . $p_area . '/' . $p_city . '" target="_blank">
                            <button>
                                Live Location
                            </button>
                        </a>
                        <a href="./checkout.php?id=' . $id . '">
                            <button>
                                Book Now
                            </button>
                        </a>
                        <a href="./chat.php">
                            <button>
                                Talk to ' . $l_name . '
                            </button>
                        </a>

                    </div>

                ';
            ?>

        </div>
        <p class="facTitle">
            Facilities Provided :
        </p>
        <div class="facilities">
            <div class="facility card">
                <img src="../Assets/icons/rating.png" alt="" class="facIcon">
                <h3 class="facName">'
                    <?php echo $p_rating; ?> /5
                </h3>
            </div>
            <div class="facility card">
                <!-- Not in database -->
                <img src="../Assets/icons/ac.png" alt="" class="facIcon">
                <h3 class="facName">
                    <?php echo $p_ac; ?>
                </h3>
            </div>
            <div class="facility card">
                <img src="../Assets/icons/food.png" alt="" class="facIcon">
                <h3 class="facName">
                    <?php echo $p_food ?>
                </h3>
            </div>
            <div class="facility card">
                <img src="../Assets/icons/parking.png" alt="" class="facIcon">
                <h3 class="facName">
                    <?php echo $p_parking ?>
                </h3>
            </div>
            <div class="facility card">
                <!-- Not in database -->
                <img src="../Assets/icons/type.png" alt="" class="facIcon">
                <h3 class="facName">
                    <?php echo $p_type ?>
                </h3>
            </div>
            <div class="facility card">
                <img src="../Assets/icons/wifi.png" alt="" class="facIcon">
                <h3 class="facName">
                    <?php echo $p_wifi ?>
                </h3>
            </div>
            <div class="facility card">
                <img src="../Assets/icons/gender.png" alt="" class="facIcon">
                <h3 class="facName">
                    <?php echo $p_gender ?>
                </h3>
            </div>
            <div class="facility card">
                <img src="../Assets/icons/furniture.png" alt="" class="facIcon">
                <h3 class="facName">
                    <?php echo $p_furnished ?>
                </h3>
            </div>
        </div>

        <div class="detContainer">
            <h2>About the Property :</h2>
            <div class="details">
                <?php echo $p_details ?>
            </div>
        </div>
        <div class="history">
            <div class="previousDataTitle">Reviews</div>
            <hr>
            <div class="previousDataContent">
                <div class="reviewContainer">
                    <div class="reviewCard">
                        <div class="roomDetails">
                            <h2>Aman Gandhi</h2>
                            <h3>January 15, 2024</h3>
                        </div>
                        <hr>
                        <div class="theReview">
                            <h3>The room was amazing. The bed was comfortable, and the view from the window was
                                breathtaking. </h3>
                        </div>
                    </div>
                    <!-- Review 1 -->
                    <div class="reviewCard">
                        <div class="roomDetails">
                            <h2>Radhika Gupta</h2>
                            <h3>March 10, 2023</h3>
                        </div>
                        <hr>
                        <div class="theReview">
                            <h3>I had a fantastic stay at this property. The room was spacious and well-appointed,
                                offering all the amenities I needed. The staff was friendly and attentive, ensuring
                                that my needs were met throughout my stay. The property's location was convenient,
                                with easy access to nearby attractions. I would definitely recommend this property
                                to anyone looking for a comfortable and enjoyable stay.</h3>
                        </div>
                    </div>

                    <!-- Review 2 -->
                    <div class="reviewCard">
                        <div class="roomDetails">
                            <h2>Govind Sharma</h2>
                            <h3>April 5, 2022</h3>
                        </div>
                        <hr>
                        <div class="theReview">
                            <h3>This property exceeded my expectations. The room was beautifully decorated and
                                spotlessly clean. The staff was incredibly courteous and went out of their way
                                to make my stay memorable. I particularly enjoyed the delicious breakfast served
                                at the property's restaurant. The property's amenities, including the swimming pool
                                and fitness center, were also top-notch. I would highly recommend this property
                                to anyone visiting the area.</h3>
                        </div>
                    </div>

                    <!-- Review 3 -->
                    <div class="reviewCard">
                        <div class="roomDetails">
                            <h2>Gopal Jadhav</h2>
                            <h3>May 20, 2022</h3>
                        </div>
                        <hr>
                        <div class="theReview">
                            <h3>I had a wonderful experience staying at this property. The room was cozy and
                                comfortable, providing a perfect retreat after a long day of exploring the city.
                                The staff was warm and welcoming, always ready to assist with any requests. I
                                also appreciated the property's attention to detail, from the complimentary
                                refreshments to the thoughtful amenities provided in the room. Overall, it was
                                a delightful stay, and I would definitely choose this property again for my
                                next visit.</h3>
                        </div>
                    </div>

                </div>

            </div>
        </div>

        <br><br><br><br>
    </div>
    <!-- main_page -->


</body>

</html>
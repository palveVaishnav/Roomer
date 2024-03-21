<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/propPage.css">
</head>

<body>
    <!-- Left Menu Section -->
    <?php
    require_once('../components/leftIndex.php');
    // Get all the dada 
    // get the id from the index.php page
    require_once('propRender.php');

    ?>


    <!-- Right Hero Section -->
    <div class="main_page">
        <div class="propLander">
            <?php require_once('lander.php'); ?>
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
                        <a href="https://earth.google.com/web/search/'.$p_area.'/'.$p_city.'" target="_blank">
                            <button>
                                Live Location
                            </button>
                        </a>
                        <a href="./checkout.php?id='.$id.'">
                            <button>
                                Book Now
                            </button>
                        </a>
                        <a href="./chat.php">
                            <button>
                                Talk to '.$l_name.'
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
                <h3 class="facName"> <?php echo $p_ac; ?> </h3>
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
                <h3 class="facName"> <?php echo $p_furnished ?> </h3>
            </div>
        </div>

        <div class="detContainer">
            <h2>About the Property :</h2>
            <div class="details">
                <?php echo $p_details ?>
            </div>
        </div>
    </div>
    <!-- main_page -->


</body>

</html>
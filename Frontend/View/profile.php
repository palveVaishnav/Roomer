<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/profile.css">
    <title>Profile</title>
    <style>
        .reviewContainer {
            display: grid;
            grid-template-columns: 1fr 1fr;
        }

        .reviewCard {
            border: 2px solid white;
            margin: 10px;
            border-radius: 20px;
            padding: 10px;

        }
    </style>
</head>

<body>
    <?php
    require_once ('../components/leftIndex.php');
    ?>
    <?php

    // session_start();
    // $userId = "";
    
    if (isset ($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        require_once ("./pgConfig.php");
        $query = "SELECT * FROM tenant WHERE t_id=$1";
        $result = pg_query_params($conn, $query, array($userId));
        if (!$result) {
            echo "<h1> Connected but unable to render the data </h1>";
            exit;
        }
        // get all values and store them in variables 
        while ($row = pg_fetch_assoc($result)) {
            //  t_id |      t_email       |  t_name  | t_pass | t_history | t_verified
            $id = $row['t_id'];
            $name = $row['t_name'];
            $email = $row['t_email'];
            $verified = $row['t_verified'];

        }
        echo '
            <!-- Right Hero Section -->
            
            <div class="main_page">
                <div class="dashboard">

                    <div class="userData">
                    
                        <div class="userImage">
';

    // Handle image upload
    if(isset($_POST["submit"])) {
            $target_dir = "../Assets/icons/";
            // echo basename($_FILES["fileToUpload"]["name"])."<br>";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            // echo $target_file."<br>";
            $_SESSION['imgPath'] = $target_file;
            echo '<script>window.location.href = "profile.php";</script>';
    }

    // Display uploaded image
    if(isset($_SESSION['imgPath'])) {
        echo '<img src="'.$_SESSION['imgPath'].'" alt="Uploaded Image" class="userImg">';
    } else {
        echo '<p>No image uploaded yet.</p>';
    }
    ?>
    <form action="" method="post" enctype="multipart/form-data">
        <input type="file" name="fileToUpload" id="fileToUpload" style="padding:10px 20px;color:#fff;background-color:#333" accept=".jpg, .jpeg, .png, image/jpeg, image/png" >
        <button type="submit" name="submit" style="padding:10px 20px;color:#fff;background-color:#333" >Change Image </button>
    </form>
<?php 
echo '

                            <p class="userName">' . $name . '</p>
                        </div>
                        <hr>
                        <div class="userInfo">
                            <div class="info id">
                                <img src="../Assets/icons/unique.png" alt="" class="infoIcon">
                                <p class="infoText">Unique Id : ' . $id . ' </p>
                            </div>
                            <div class="info id">
                                <img src="../Assets/icons/email.png" alt="" class="infoIcon">
                                <p class="infoText">Email : ' . $email . '</p>
                            </div>
                            <div class="info id">
                                <img src="../Assets/icons/check.png" alt="" class="infoIcon">
                                <p class="infoText">Verified : ' . $verified . '</p>
                            </div>
                        </div>
                    
                    </div>
    ';

        ?>



        <div class="previousData">
            <div class="history">
                <div class="previousDataTitle">About</div>
                <hr>
                <div class="previousDataContent">
                    <h4>Passionate traveler and avid photographer, exploring diverse cultures and capturing moments around
                        the globe. Nature lover, food enthusiast, always seeking new adventures.</h4>
                </div>
            </div>
            <div class="history">
                <div class="previousDataTitle">Reviews</div>
                <hr>
                <div class="previousDataContent">

                    <div class="reviewContainer">
                        <div class="reviewCard">
                            <div class="theReview">
                                <h3>The room was amazing. The bed was comfortable, and the view from the window was
                                    breathtaking. </h3>
                            </div>
                            <div class="roomDetails">
                                <h3>Date:</h3> January 15, 2024<br>
                                <h3>Address:</h3> 123 Main Street, Mumbai, Maharashtra, India
                            </div>
                        </div>
                        <div class="reviewCard">
                            <div class="theReview">
                                <h3>I had a pleasant stay in this room. The amenities were great, and the location was
                                    convenient.</h3>
                            </div>
                            <div class="roomDetails">
                                <h3>Date:</h3> May 10, 2024<br>
                                <h3>Address:</h3> 456 Elm Street, Bangalore, Karnataka, India
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- About Ends Here -->

        </div>
        </div>

        <div class="history">
            <div class="previousDataTitle">Your Bookings</div>
            <hr>
            <?php
            require_once ('./roomCard.php');
            $query = "SELECT * FROM bookings WHERE t_id = $1 AND status='booked';";
            $result = pg_query_params($conn, $query, array($userId));
            if (!$result) {
                echo "<h1>Bookings Not Found</h1>";
                exit;
            }
            while ($row = pg_fetch_assoc($result)) {
                $pid = $row['p_id'];
                $Propertyquery = "SELECT * FROM property WHERE p_id = $pid;";
                $Propertyresult = pg_query($conn, $Propertyquery);
                while ($row = pg_fetch_assoc($Propertyresult)) {
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
                    profileCard($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name);
                }

            }

            ?>

        </div>

        <?php
        echo '
    </div> 
    ';

    } else {
        header("Location: login.php");
    }
    ?>


</body>

</html>
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
            $hId = $row['t_history'];
        }
        echo '
            <!-- Right Hero Section -->
            
            <div class="main_page">
                <div class="dashboard">

                    <div class="userData">
                    
                        <div class="userImage">
                            <img src="../Assets/icons/profile3.png" alt="" class="userImg">
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
                    <h4>Passionate traveler and avid photographer, exploring diverse cultures and capturing moments around the globe. Nature lover, food enthusiast, always seeking new adventures.</h4>
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
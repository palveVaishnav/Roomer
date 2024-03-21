<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/profile.css">
    <title>Profile</title>
</head>

<body>
    <?php
    require_once('../components/leftIndex.php');
    ?>
    <?php

    // session_start();
    // $userId = "";
    
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        require_once("./pgConfig.php");
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
    }else{
        header("Location: login.php");
    }



    echo '
            <div class="previousData">

                <div class="history">
                    <div class="previousDataTitle">History</div>
                    <hr>
                    <div class="previousDataContent">
                        <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </div>
                        <div>Molestias magnam tempore commodi ratione ipsam! Repellendus blanditiis a vel? </div>
                        <div>Harum ducimus obcaecati ex saepe labore autem molestias blanditiis ipsa illum.
                        </div>
                    </div>
                </div>
                <div class="reviews">
                    <div class="previousDataTitle">Reviews</div>
                    <hr>
                    <div class="previousDataContent">
                        <div>Lorem, ipsum dolor sit amet consectetur adipisicing elit. </div>
                        <div>Molestias magnam tempore commodi ratione ipsam! Repellendus blanditiis a vel? </div>
                        <div>Harum ducimus obcaecati ex saepe labore autem molestias blanditiis ipsa illum.
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div> 
    ';

    ?>

    <!-- Right Scrollable section -->

</body>

</html>
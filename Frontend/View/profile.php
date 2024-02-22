<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/style1.css">
    <title>Profile</title>
</head>

<body>

    <?php
    require_once("./pgConfig.php");
    ?>
    <?php
    require_once('../components/leftIndex.php');
    session_start();
    $userId = "";
    if (isset($_SESSION['username'])) {
        $userId = $_SESSION['userId'];
    }


    ?>

    <!-- Right Hero Section -->
    <div class="main_page">
        <div class="dashboard">

            <div class="userData">
                <!-- <div class="userCard"> -->
                <div class="userImage">
                    <img src="../Assets/icons/profile3.png" alt="" class="userImg">
                    <p class="userName">{User Name}</p>
                </div>
                <hr>
                <div class="userInfo">
                    <div class="info id">
                        <img src="../Assets/icons/unique.png" alt="" class="infoIcon">
                        <p class="infoText">Unique Id : {ID HERE} </p>
                    </div>
                    <div class="info id">
                        <img src="../Assets/icons/email.png" alt="" class="infoIcon">
                        <p class="infoText">Email : {enail}</p>
                    </div>
                    <div class="info id">
                        <img src="../Assets/icons/check.png" alt="" class="infoIcon">
                        <p class="infoText">Verified : {yes or no}</p>
                    </div>
                </div>
                <!-- </div> -->
            </div>

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


    </div> <!-- Right Scrollable section -->

</body>

</html>
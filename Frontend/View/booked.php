<!DOCTYPE html>
<html>

<head>
    <title>Property Booked (db update ) </title>
    <meta http-equiv="refresh" content="5;url=http://localhost/Roomer/Frontend/View/profile.php">
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <style>
        .main_page {
            height: auto;
        }
    </style>
</head>

<body>
    <?php
    require_once ('../components/leftIndex.php');
    ?>

    <div class="main_page" >
        <div class="message" 
            style="height:100vh;display:grid;place-items:center;"
        >

            <?php

            // Get the id from the index.php page
            if (isset ($_GET['id']) && !empty ($_GET['id'])) {
                // Connect with database
                require_once ('pgConfig.php');

                // Sanitize the ID input
                $id = htmlspecialchars($_GET['id']);

                
                $user = $_SESSION['userId'];

                // Check if the update was successful
                // if ($result) {
                $insertQuery = "INSERT INTO bookings(t_id,p_id,status) VALUES ( $user , $id ,'pending') ";
                $result = pg_query($conn, $insertQuery);
                if ($result) {
                    echo "<h1> Booking Request is received!! <br> you will be notified once the booking is Confirm</h1>";
                } else {
                    echo "Error updating property booking status.";
                }
            }
            ?>
        </div>
    </div>
</body>

</html>
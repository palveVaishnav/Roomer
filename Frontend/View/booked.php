<!DOCTYPE html>
<html>

<head>
    <title>Property Booked (db update ) </title>
    <meta http-equiv="refresh" content="1;url=http://localhost/Roomer/Frontend/View/profile.php">
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
    require_once('../components/leftIndex.php');
    ?>

    <div class="main_page" style="background-color:#333;height:100vh;">

        <?php

        // Get the id from the index.php page
        if (isset($_GET['id']) && !empty($_GET['id'])) {
            // Connect with database
            require_once('pgConfig.php');

            // Sanitize the ID input
            $id = htmlspecialchars($_GET['id']);

            // Update the p_booked column for the given id
            $query = "UPDATE property SET p_booked='yes' WHERE p_id=$1";
            $result = pg_query_params($conn, $query, array($id));

            // Check if the update was successful
            if ($result) {
                echo "<h1>Property booked successfully.</h1>";
            } else {
                echo "Error updating property booking status.";
            }
        }


        ?>
    </div>
</body>

</html>
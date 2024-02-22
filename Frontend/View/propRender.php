<?php

// get the id from the index.php page
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // COnnect with database
    require_once('pgConfig.php');

    // Sanitize the ID input
    $id = htmlspecialchars($_GET['id']);


    $query = "SELECT * FROM property WHERE p_id=$1";
    $result = pg_query_params($conn, $query, array($id));


    // $query = "SELECT * FROM property WHERE p_id=$id";
    // $result = pg_query($conn, $query);
    if (!$result) {
        echo "<h1> Connected but unable to render the data </h1>";
    }
    // get all values and store them in variables 
    while ($row = pg_fetch_assoc($result)) {

        $p_image = $row['p_image'];
        $p_city = $row['p_city'];
        $p_area = $row['p_area'];
        $p_prize = $row['p_prize'];
        $p_rating = $row['p_rating'];
        $p_food = ($row['p_food'] == 'yes') ? 'Available' : 'Not Available';
        $p_parking = ($row['p_parking'] == 'yes') ? 'Available' : 'Not Available';
        $p_gender = $row['p_gender'];
        $p_wifi = ($row['p_wifi'] == 'yes') ? 'Available' : 'Not Available';
        $p_type = $row['p_type'];
        $p_details = $row['p_details'];
        // $p_furnish = $row['p_furnish'];

        $p_description = $row['p_description'];
        $p_availability = $row['p_availability'];
        $p_owner = $row['p_owner'];

        $secondQuery = "SELECT lord_name FROM LANDLORD WHERE lord_id = $p_owner";
        $secondResult = pg_query($conn, $secondQuery);
        $l_name = '';
        if ($row = pg_fetch_assoc($secondResult)) {
            $l_name = $row['lord_name'];
        }
    }
    $embed_url = "https://www.google.com/maps/embed/v1/place?key=&q=" . urlencode($p_city . ', ' . $p_area);    
} else {
    echo "<h1> Sorry!! no such property Found. </h1>";
}

?>
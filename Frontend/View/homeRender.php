<?php
require_once ('pgConfig.php');
require_once('./roomCard.php');
$query = "SELECT * FROM property";
$result = pg_query($conn, $query);
if (!$result) {
    echo "<h1> Connected but unable to render the data </h1>";
}

while ($row = pg_fetch_assoc($result)) {
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
    if ($p_booked == 'no') {
        available($firstimage, $p_city, $p_area, $p_description, $p_type, $p_rating, $p_gender, $p_food, $p_parking, $p_wifi, $p_availability, $p_id, $p_owner, $name);
    }
}
?>
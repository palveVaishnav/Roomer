
<!-- // Include your PHP code to fetch property details from the database -->

<?php

$result = pg_query($conn, "SELECT * FROM property WHERE p_id = 101");
$propertyData = pg_fetch_assoc($result);
?>
<br>AREA:
<?php echo $propertyData['p_area']; ?>
<br>CITY:
<?php echo $propertyData['p_city']; ?>
<br>Pin-Code:
<?php echo $propertyData['p_area']; ?>
<br>Prizing:
<?php echo $propertyData['p_prize']; ?>
<br><br><br>
<br>Ratings:
<?php echo $propertyData['p_rating']; ?>
<br>Girls/Boys:
<?php echo $propertyData['p_gender']; ?>
<br>More Details:
<?php echo $propertyData['p_details']; ?>

<?php
                /*
                // Include your PHP code to fetch property reviews from the database
                $result = pg_query($conn, "SELECT * FROM history WHERE p_id = 101");
                $reviews = pg_fetch_all($result);
                foreach ($reviews as $review) {
                    echo '
                    <div class="reviewCard">  
                        <div class="tennet">
                            <img src="./Assets/icons/person.png" alt="Man Image" class="tennetImage">
                            <h4 class="tennetName" id="tennetName">'. $review['t_id'] .' </h4>
                        </div>
                        <div class="review">
                            <p>' . $review['review'] .' </p>
                        </div>
                    </div>
                ';
                }
                */
                ?>



                <!-- <?php
                // Include your PHP code to fetch property image from the database
                $conn = pg_connect('host=localhost dbname=roomer user=postgres password=123456789');
                $result = pg_query($conn, "SELECT p_image FROM property WHERE p_id = 101");
                $propertyImage = pg_fetch_assoc($result)['p_image'];
                echo '<img id="myimage" src="' . $propertyImage . '" alt="Property Images">';
                ?> -->
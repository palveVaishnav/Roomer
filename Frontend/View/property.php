<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/property.css">
    <script src="../Assets/Script/magnifier.js"></script>
</head>

<body>
    <!-- Left Menu Section -->
    <?php
        require_once('../components/leftIndex.php');
    ?>

    <!-- Right Hero Section -->
    <div class="main_page">
        
        <?php
            require_once('./propertyOld.php');
        ?>


        <!-- <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/place/Jalna">
            
        </iframe> -->



        <!--The div element for the map -->
        <!-- <div id="map"></div> -->
        <!--         
        <iframe width="600" height="450" style="border:0" loading="lazy" allowfullscreen
            referrerpolicy="no-referrer-when-downgrade"
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3780.563675231219!2d73.81782281443088!3d18.522687887401368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bfe9da4d0163%3A0x3a09d094291176a7!2sGokhale%20Nagar%2C%20Pune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1645480522783!5m2!1sen!2sin">
        </iframe> -->


        <!--Add a script by google -->
        <!-- <script
            src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAR5bOmLfTAeCuCMozBHnCFQQTrsBB3d0c&callback=initMap&libraries=&v=weekly"
            async>
            </script> -->


    </div>
    <!-- main_page -->


</body>

</html>
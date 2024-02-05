<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="Assets/css/reusable.css">
    <link rel="stylesheet" href="Assets/css/style.css">
    <link rel="stylesheet" href="Assets/css/property.css">
    <script src="Assets/Script/magnifier.js"></script>
</head>

<body>
    <!-- Left Menu Section -->
    <div class="left-menu" id="leftMenu"></div>
    <script>
        // Fetch and inject the component into the container
        fetch('./components/leftIndex.html')
            .then(response => response.text())
            .then(menubar => {
                document.getElementById('leftMenu').innerHTML = menubar;
            });
    </script>

    <!-- Right Hero Section -->
    <div class="main_page">

        <div class="propLander">
            <div class="propImages">
                
            </div>
            <div class="propLocation">
                <div class="city">

                </div>
                <div class="area">

                </div>
                <div class="money">

                </div>
                <div class="propQuicks">
                    <div class="bookNow">

                    </div>
                    <div class="talkToOwner">

                    </div>
                </div>

            </div>
        </div>
        <!-- Prop Lander -->
        <div class="facilities">
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
            <div class="facility card">
                <img src="./Assets/icons/" alt="" class="facIcon">
                <h3 class="facName"></h3>
            </div>
        </div>
        <!-- Facilities -->

        <div class="detContainer">
            <div class="details">

            </div>
        </div>
        <!-- Details Description -->

        <div class="reviewSection">
            <div class="reviewTitle">
                <!-- Reviews -->
            </div>
            <div class="reviews">
                <div class="reviewCard">
                    <div class="tennet">
                        <img src="" alt="" class="tennetImage">
                        <h4 class="tennetName" id="tennetName"> </h4>
                    </div>
                    <div class="review">
                    </div>
                </div>
            </div>
        </div>
        <!-- Previous Reviews -->

        <div class="mapContainer">
            <div class="address">

            </div>
            <div class="map">

            </div>
        </div>
        <!-- Location -->

    </div>
    <!-- main_page -->






</body>

</html>







<!-- PHP CODE  -->

<!-- get the images by property id  -->

<!-- Reviews Here  -->
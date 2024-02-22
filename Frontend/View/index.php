<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
</head>

<body>
    <?php
        require_once('../components/leftIndex.php');
    ?>

    <!-- Right Hero Section -->
    <div class="main_page">

        <!-- <h1>Welcome to Our Website</h1> -->
        <div class="hero_lander">
            <div class="brand_intro" id="brandIntro">
                <img class="brand_image" src="../Assets/images/lander1.webp" alt="">
                <div class="brand_lander">
                    <h3>_RooMER.</h3>
                    <hr>
                    <h1>BOOK SMILES, NOT JUST ROOMS !</h1>
                </div>
            </div>

            <!-- Filters and Other search options   -->
            <div class="room_search" id="roomSearch">
                <div class="hero_search" id="heroSearch">
                    <!-- <p></p> -->
                    <div class="search_by">
                        <input class="search_item" type="text" placeholder="Enter City" name="City" required>
                        <input class="search_item" type="text" placeholder="Enter Area" name="Area" required>
                        <p>or</p>
                        <input class="search_item" type="text" placeholder="Enter PinCode" name="pinCode" required>
                    </div>

                    <form method="POST" action="filter.php" name="filters">
                        <div class="filter_by">
                            <p>Filter by : </p>

                            <select name="FLATS" id="FLATS" class="filter_item">
                                <option value="flat">Flats</option>
                                <option value="room">Rooms</option>
                                <option value="hostel">Hostels</option>
                                <option value="pg">PG's</option>

                            </select>
                            <!-- </article> -->
                            <article class="filter_item" id="filterItem">Prize</article>
                            <!-- Ratings -->
                            <select name="ratings" id="ratings" class="filter_item">
                                <option value="4"> Ratings : 4+</option>
                                <option value="3"> Ratings : 3+</option>
                                <option value="2"> Ratings : 2+</option>
                                <option value="1"> Ratings : 1+</option>
                            </select>

                            <select name="availability" id="availability" class="filter_item">
                                <option value="NOW">Immediate</option>
                                <option value="7">Within 7 Days</option>
                                <option value="15">Within 15 Days</option>
                                <option value="30">Within 30 Days</option>
                            </select>
                        </div> <!-- flter_by -->
                    </form>

                </div> <!-- hero_search -->
            </div>
        </div>


        <!--  End Lander Section -->
        <?php
            require_once('./homeRender.php');
            $userId = sessionStorage.getItem('userId');
            
        ?>
        <!-- Room Cards and Details  -->

        <footer id="footerPage"></footer>
        <script>
            fetch('../components/footer.html')
                .then(res => res.text())
                .then(footer => {
                    document.getElementById('footerPage').innerHTML = footer;
                })
        </script>

    </div> <!-- Right Scrollable section -->

    <!-- JavaScript File  -->

</body>

</html>
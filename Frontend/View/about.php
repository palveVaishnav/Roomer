<!DOCTYPE html>
<html>

<head>
    <title>About</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/about.css">
</head>

<body>
    <?php
        require_once('../components/leftIndex.php');
    ?>
    
    <div class="main_page">
        <!-- first -->
        <div class="aboutLander">
            <div class="landerText">
                <h1>_RooMER.</h1>
                <h3>We Book <br> smiles,<br> Not Just <br> Rooms</h3>
            </div>
            <div class="landerImages">
                <!-- 4 images -->
                <div class="fourImages">
                    <img src="../Assets/images/lander.jpg" alt="" class="landerImage imageOne">
                    <img src="../Assets/images/lander.jpg" alt="" class="landerImage imageTwo">
                </div>
                <div class="fourImages">
                    <img src="../Assets/images/lander.jpg" alt="" class="landerImage imageThree">
                    <img src="../Assets/images/lander.jpg" alt="" class="landerImage imageFour">
                </div>
            </div>
        </div>
        <!-- Lander Ends Here -->



        <div class="missionContainer">
            <!-- 3 Cards  -->
            <!-- <div class="missionTitle">
                <h3>Our Mission</h3>
            </div> -->
            <div class="missionCards">
                <div class="missionCard cardOne">
                    <h2 class="cardTitle">Easy Searching </h2>
                    <p class="cardDescription">
                        We aim to simplify the process of finding a home by providing a
                        user-friendly platform. Our intuitive search and filter options ensure that users can easily
                        navigate through a diverse range of accommodations based on their preferences, making the search
                        for the perfect living space seamless and enjoyable.
                    </p>
                </div>

                <div class="cardTwo missionCard">
                    <h2 class="cardTitle">Diverse Options</h2>
                    <p class="cardDescription">
                        At _RooMER, we understand that everyone's idea of a perfect home is different. That's why we
                        strive
                        to
                        offer a diverse range of accommodation options, including flats, rooms, hostels, and PGs.
                        Whether
                        you're
                        a student, a professional, or a traveler, we have the ideal place for you to call home.
                    </p>
                </div>
                <div class="cardThree missionCard">
                    <h2 class="cardTitle">Trust</h2>
                    <p class="cardDescription">
                        Trust is at the core of what we do. We are committed to building and maintaining trust with our
                        users. Through transparent and honest communication, secure booking systems, and a focus on user
                        satisfaction, we aim to establish _RooMER as a trustworthy platform for finding your dream
                        accommodation.
                    </p>
                </div>
            </div>
        </div>
        <!-- Mission  -->


        <!-- Third -->
        <div class="whoAreWe">
            <div class="weImage">
                <img src="../Assets/images/devTeam.jpg" alt="Image">
            </div>
            <div class="weText">
                <h3 class="weTitle"> Who Are We</h3>
                <p class="weDescription">
                    At _RooMER, we are more than just a housing platform;
                    we are a community that understands the importance
                    of finding a space that feels like home.
                    Whether you're a student, a professional, or a traveler, we
                    have the ideal place for you.
                </p>
            </div>
        </div>

        
        <!-- Second -->
        

        <!-- Fourth -->
        <div class="team">

        </div>


        <footer id="footerPage"></footer>
        <script>
            fetch('../components/footer.html')
                .then(res => res.text())
                .then(footer => {
                    document.getElementById('footerPage').innerHTML = footer;
                })
        </script>

    </div>
    <!-- Main Page tag -->
</body>

</html>
<div class="left-menu" id="leftMenu">

    <!-- Logo and Tagline  -->
    <a href="./index.php">
        <div class="logo_container" id="logoContainer">
            <div class="logo" id="logo">
                _RooMER.
            </div>
            <div class="tagline_container" id="taglineContainer">
                <p class="tagline">BOOKING SMILES !!</p>
            </div>
        </div>
    </a>

    <div class="index" id="index">
        <ul class="menu-items">
            <li class="menu-item">
                <a href="./index.php">HOME</a>
            </li>
            <li class="menu-item">
                <a href="./profile.php">PROFILE</a>
            </li>
            <li class="menu-item">
                <a href="./explore.php">EXPLORE</a>
            </li>
            <li class="menu-item">
                <a href="./future.php">FUTURE SCOPE</a>
            </li>
            <li class="menu-item">
                <a href="./contact.php">CONTACT US</a>
            </li>
            <li class="menu-item">
                <a href="about.php">ABOUT US</a>
            </li>
            <!-- Add more menu items as needed -->
        </ul>
    </div>

    <?php

    session_start();
    if (isset($_SESSION['userId'])) {
        echo '
                <div class="login_container" id="loginContainer">
                    <button class="home_button">
                        <a href="./profile.php"> 
                            Profile
                        </a>
                    </button>
                    <button class="home_button">
                        <a href="./logout.php"> 
                            Logout
                        </a>
                    </button>
                   
                </div>
            ';
    } else {
        echo '
                <div class="login_container" id="loginContainer">
                    <button class="home_button">
                        <a href="login.php">Login</a>
                    </button>
                    <button class="home_button">
                        <a href="signup.php">Sign Up</a>
                    </button>
                </div>
                ';
    }

    if (isset($_SESSION['admin_id'])) {
        echo '
            <button class="home_button">
                <a href="./dash.php">
                    DashBoard
                </a>
            </button>
            <br><br>
            <button class="home_button">
                <a href="./logout.php">
                    Admin Logout
                </a>
            </button>
            
        ';
    }else{
        echo '
            <button class="home_button" style="position: absolute;">
                <a href="./admin.php">
                    Admin Login
                </a>
            </button>
        
        ';
    }

    ?>



</div>
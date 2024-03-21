<?php
session_start();
// 
// Check if user is logged in
if (!isset($_SESSION['userId'])) {
    // Redirect user to login page if not logged in
    header('Location: login.php');
    exit;
}

// Retrieve user ID from session
$userId = $_SESSION['userId'];

// Get the id from the index.php page
if (isset($_GET['id']) && !empty($_GET['id'])) {
    // Connect with database
    require_once('pgConfig.php');

    // Sanitize the ID input
    $id = htmlspecialchars($_GET['id']);

    $query = "SELECT * FROM property WHERE p_id=$1";
    $result = pg_query_params($conn, $query, array($id));

    if (!$result) {
        echo "<h1> Connected but unable to render the data </h1>";
    }

    // Get all values and store them in variables 
    while ($row = pg_fetch_assoc($result)) {
        $p_image = $row['p_image'];
        $p_prize = $row['p_prize'];
        $p_availability = $row['p_availability'];
        $p_owner = $row['p_owner'];

        $secondQuery = "SELECT lord_name FROM LANDLORD WHERE lord_id = $p_owner";
        $secondResult = pg_query($conn, $secondQuery);
        $l_name = '';
        if ($row = pg_fetch_assoc($secondResult)) {
            $l_name = $row['lord_name'];
        }
    }

    $currentDateTime = date("d-m-Y - H:i:s a");

    echo '
    <!DOCTYPE html>
    <html>
    
    <head>
        <title>Roomer-Home</title>
        <link rel="stylesheet" href="../Assets/css/reusable.css">
        <link rel="stylesheet" href="../Assets/css/style.css">
        <link rel="stylesheet" href="../Assets/css/checkout.css">
    </head>
    
    <body>
    
        <div class="left-menu" id="leftMenu">
            <div class="billDetails">
                <p class="receiptFor">Receipt For Room id: ' . $id . '</p>
                <div class="amount">
                    <img src="../Assets/icons/amount.png" alt="" class="iconImage">
                    <h2>Amount</h2>
                </div>
                <p class="theAmount">' . $p_prize . '</p>
                <div class="date">
                    <img src="../Assets/icons/calendar.png" alt="" class="iconImage">
                    <h2>Date</h2>
                </div>
                <p class="theAmount">' . $currentDateTime . '</p>
                <div class="owner">
                    <img src="../Assets/icons/pay.png" alt="" class="iconImage">
                    <h2>Receiver : </h2>
                </div>
                <p class="theAmount"> ' . $l_name . ' </p>
                <br><br><br><br>
                
            </div>
        </div>';
    
    // Get user info
    $userName = "";
    if (isset($_SESSION['userId'])) {
        $userId = $_SESSION['userId'];
        $query = "SELECT * FROM tenant WHERE t_id=$1";
        $result = pg_query_params($conn, $query, array($userId));
        if (!$result) {
            echo "<h1> Connected but unable to render the data </h1>";
            exit;
        }
        // Get all values and store them in variables 
        if ($row = pg_fetch_assoc($result)) {
            $userName = $row['t_name'];
        }
    }
    
    echo '
        <div class="main_page">
            <div class="payOptions">
                <div class="payInfo">
                    <h3>You have selected a great place ' . $userName . ',</h3>
                    <h4>Scan the QR for payment</h4>
                </div>
                <br><br><br>
                <div class="payQr">
                    <img src="../Assets/icons/QR.png" alt="" class="qrcode">
                </div>
    
                <div style="display:flex;">
                    <button class="cancelBtn">
                        <img src="../Assets/icons/cancel.png" alt="Cancel png" class="iconImage">
                        <a href="./property.php?id=' . $id . '">
                            <h2>Cancel Payment</h2>
                        </a>
                    </button>
                    <button class="cancelBtn proceed">
                        <img src="../Assets/icons/right.png" alt="next" class="iconImage">
                        <a href="./booked.php?id=' . $id . '">
                            <h2>Proceed</h2>
                        </a>
                    </button>
                </div>
            </div>
        </div>
    </body>
    
    </html>
    ';
}
?>

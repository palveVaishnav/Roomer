<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <link rel="stylesheet" href="../Assets/css/checkout.css">
</head>

<body>
    <?php
    session_start();

    // Check if user is logged in
    if (!isset($_SESSION['userId'])) {
        // Redirect user to login page if not logged in
        header('Location: login.php');
        exit;
    }

    // Retrieve user ID from session
    $userId = $_SESSION['userId']
    ?>
    <div class="left-menu" id="leftMenu">
        <div class="billDetails">
            <p class="receiptFor">Receipt For Room id: {room no}</p>
            <div class="amount">
                <img src="../Assets/icons/amount.png" alt="" class="iconImage">
                <h2>Amount</h2>
            </div>
            <p class="theAmount">50000</p>
            <div class="date">
                <img src="../Assets/icons/calendar.png" alt="" class="iconImage">
                <h2>Date</h2>
            </div>
            <p class="theAmount">30 Feb,2024</p>
            <div class="owner">
                <img src="../Assets/icons/pay.png" alt="" class="iconImage">
                <h2>Receiver : </h2>
            </div>
            <p class="theAmount">Owner Name </p>
            <br><br><br><br>
            <button class="cancelBtn">
                <img src="../Assets/icons/cancel.png" alt="Cancel png" class="iconImage">
                <a href="./property.php">
                    <h2>Cancel Payment</h2>
                </a>
            </button>

        </div>
    </div>



    <div class="main_page">
        <div class="payOptions">
            <div class="payInfo">
                <h2>Hello {USER Name},</h2>
                <h4>Scan the QR for payment</h4>
            </div>
            <br><br><br>
            <div class="payQr">
                <img src="../Assets/icons/QR.png" alt="" class="qrcode">
            </div>

            <button class="cancelBtn proceed">
                <img src="../Assets/icons/right.png" alt="next" class="iconImage">
                <a href="./property.php">
                    <h2>Proceed</h2>
                </a>
            </button>
        </div>



    </div>

</body>

</html>
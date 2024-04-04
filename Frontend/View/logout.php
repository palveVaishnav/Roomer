<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="refresh" content="0.1;url=http://localhost/Roomer/Frontend/View/index.php">
    <title>Logout</title>
</head>
<body style="background-color:#333;height:100vh;" >
    <?php 
        session_start();
        // unset($_SESSION['admin_id']);
        session_destroy();
    ?>
    <div class="redirect">
        <h1>Navigate to Home Page</h1>
        <a href="http://localhost/Roomer/Frontend/View/index.php" target="_blank">
            <button>Click Here</button>
        </a>
    </div>
</body>
</html>
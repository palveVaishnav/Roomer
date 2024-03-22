<?php
session_start();

require_once('pgConfig.php');
if(isset($_SESSION['admin_id'])){
    header("Location: dash.php");
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $admin_id = $_POST["admin_id"];
    $admin_pass = $_POST["admin_pass"];

    $query = "SELECT * FROM ADMIN WHERE admin_id = $1 AND admin_pass = $2";
    $result = pg_query_params($conn, $query, array($admin_id, $admin_pass));

    if (!$result) {
        echo "Error in query: " . pg_last_error($conn);
        exit;
    }

    $row = pg_fetch_assoc($result);
    if ($row) {
        $_SESSION['admin_id'] = $row["admin_id"];
        header("Location: dash.php"); // Redirect to the dashboard page after successful login
        exit;
    } else {
        echo '<p>Invalid Credentials</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link rel="stylesheet" href="../Assets/css/login.css">
</head>

<body>
    <section class="main">
        <!-- About the  Website -->
        <section class="left">
            <h1>Welcome to RooMER..</h1>
            <h3>
                <ul>
                    <li>Find the perfect room in seconds.</li> <br>
                    <li>Move to a new city with ease.</li> <br>
                    <li>Student or employee, we've got you covered.</li> <br>
                </ul>
            </h3>
            <br><br><br><br>
            <h2>Log in to get started on your journey!</h2>
        </section>
        <!-- Login Form -->
        <section class="right">
            <form method="post" action="">
                <input type="text" name="admin_id" placeholder="Enter Admin ID" required> <br> <br>
                <input type="password" name="admin_pass" placeholder="Enter Password" required> <br><br>
                <input type="checkbox" checked="checked"> Remember me
                <br><br><br>
                <button class="button" type="submit">Submit</button>
                <br> <br>
                <a href="#`">Forget password</a>
            </form>
        </section>
    </section>
</body>

</html>

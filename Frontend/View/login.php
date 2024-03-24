<?php
session_start();

require_once('pgConfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM TENANT WHERE t_email = $1 AND t_pass = $2";
    $result = pg_query_params($conn, $query, array($email, $password));

    if (!$result) {
        echo "Error in query: " . pg_last_error($conn);
        exit;
    }

    $row = pg_fetch_assoc($result);
    if ($row) {
        $userId = $row["t_id"];
        $_SESSION['userId'] = $userId;
        header("Location: index.php"); // Redirect to the dashboard page after successful login
        exit;
    } else {
        echo '
            <script>
                alert("Oops !! Invalid Credentials!");
            </script>
        ';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooME-Login</title>
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
                    <li>Move to new City with ease</li> <br>
                    <li>Student or employee, we've got you covered.</li> <br>
                    <!-- <li></li> -->
                </ul>
            </h3>
            <br><br><br><br>
            <h2>Log in to get started on your journey!</h2>
        </section>
        <!-- Login Form -->
        <section class="right">
            <form method="post" action="">
                <input type="email" name="email" placeholder="Enter Email" required> <br> <br>
                <input type="password" name="password" placeholder="Enter Password" required> <br><br>
                <input type="checkbox" checked="checked"> Remember me
                <br><br><br>
                <button class="button" type="submit">Submit</button>
                <br> <br>
                <a href="./signup.php" style="color:#000;text-decoration:none;"><b>NEW USER ? </b></a>
            </form>
        </section>
    </section>
</body>

</html>
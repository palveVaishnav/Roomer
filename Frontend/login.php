<?php
session_start();

$conn = pg_connect('host=localhost dbname=roomer user=postgres password=123456789');

if (!$conn) {
    echo '<h1>Not Connected</h1>';
    exit;
}

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
        $_SESSION["user_email"] = $row["t_email"];
        $_SESSION["user_name"] = $row["t_name"];
        header("Location: index.php"); // Redirect to the dashboard page after successful login
        exit;
    } else {
        echo '<p>Invalid Cridentials</p>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooME-Login</title>
    <link rel="stylesheet" href="Assets/css/login.css">
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
                <a href="#`">Forget password</a>
            </form>
        </section>
    </section>
</body>

</html>
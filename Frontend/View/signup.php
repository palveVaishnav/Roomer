<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RooME-Sign Up</title>
    <link rel="stylesheet" href="../Assets/css/login.css">
</head>

<body>
    <section class="main">
        <!-- About the Website -->
        <section class="left">
            <h1>Welcome to RooMER..</h1>
            <h3>
                <ul>
                    <li>Find the perfect room in seconds.</li> <br>
                    <li>Move to a new City with ease</li> <br>
                    <li>Student or employee, we've got you covered.</li> <br>
                </ul>
            </h3>
            <br><br><br><br>
            <h2>Create an account to get started on your journey!</h2>
        </section>
        <!-- Sign Up Form -->
        <section class="right">
            <?php
           require_once('pgConfig.php');
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];
                $email = $_POST["email"];
                $userType = $_POST["userType"];
                $password = $_POST["password"];

                if ($userType == "tennent") {
                    $insertQuery = "INSERT INTO TENANT (t_name, t_email, t_pass, t_verified) VALUES ($1, $2, $3, 'yes')";
                } elseif ($userType == "landlord") {
                    $insertQuery = "INSERT INTO LANDLORD (lord_name, lord_email, lord_pass, verified) VALUES ($1, $2, $3, 'no')";
                }

                $result = pg_query_params($conn, $insertQuery, array($name, $email, $password));

                if (!$result) {
                    echo "Error in query: " . pg_last_error($conn);
                    exit;
                }

                echo '<p>Account created successfully. Please wait for verification.</p>';
                header("Location: login.php");
            }
            ?>
            <form method="post" action="">
                <label for="name">Name:
                    <input type="text" name="name" placeholder="Enter Name" required> <br><br>
                </label>

                <label for="email">Email:
                    <input type="email" name="email" placeholder="Enter Email" required> <br> <br>
                </label>

                <label for="password">Password:
                    <input type="password" name="password" placeholder="Enter Password" required> <br> <br>
                </label>

                <label for="userType">User Type:
                    <select name="userType" id="userType">
                        <option value="tennent">Tenant</option>
                        <option value="landlord">Landlord</option>
                    </select>
                </label>

                <br><br><br>
                <button class="button" type="submit">Submit</button>
            </form>
        </section>
    </section>
</body>

</html>

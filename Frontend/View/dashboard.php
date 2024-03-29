<!DOCTYPE html>
<html>

<head>
    <title>Roomer-Home</title>
    <link rel="stylesheet" href="../Assets/css/reusable.css">
    <link rel="stylesheet" href="../Assets/css/style.css">
    <style>
        body {
            background-color: #333;
            color: #fff;
        }

        table {
            background-color: #c6a46e;
            padding: 5px 10px;
            border-radius: 1em;
            /* overflow: hidden; */
            margin: 1em;
            color: #000;
        }

        th {
            border: 2px dotted #333;
            /* margin: 1em; */
            padding: 10px;
        }

        tr {
            border: 2px solid red;
        }
        .accept,
        .deny{
            padding: 5px 10px;
            border: 2px solid black;
        }
        .accept{
            background-color: #37d03b;
            color: #333;
        }
        .deny{
            background-color: red;
        }
    </style>
</head>

<body>
    <?php
    require_once ('../components/leftIndex.php');
    ?>

    <!-- Right Hero Section -->
    <div class="main_page">

        <?php
        require_once ('pgConfig.php');
        // Check if the user is logged in as an admin
        // session_start();
        if (!isset ($_SESSION['admin_id'])) {
            // Redirect to the login page or display an error message
            header("Location: admin.php");
            exit();
        }
        // Execute SQL queries to retrieve data
        $result_admin = pg_query($conn, "SELECT * FROM ADMIN");
        $result_landlord = pg_query($conn, "SELECT * FROM LANDLORD");
        $result_history = pg_query($conn, "SELECT * FROM HISTORY");
        $result_property = pg_query($conn, "SELECT * FROM PROPERTY");
        $result_tenant = pg_query($conn, "SELECT * FROM TENANT");

        $result_bookings = pg_query($conn, "SELECT * FROM bookings");


        ?>

        <h2>Booking Requests </h2>
        <div class="request">
            <table>
                <tr>
                    <th>Sender</th>
                    <th>Property</th>
                    <th>Accept</th>
                    <th>Deny</th>
                </tr>



                <?php

                while ($row = pg_fetch_assoc($result_bookings)) {
                    if ($row['status'] == "pending") {
                        echo "<tr>";
                        echo "<td>" . $row['t_id'] . "</td>";
                        echo "<td>" . $row['p_id'] . "</td>";
                        echo "<td>
                                <button class='accept'>Approve</button>
                        </td>";
                        echo "<td>
                                <button class='deny'
                                    onclick= (){
                                        window.alert('Hello');
                                    }
                                >Deny</button>
                        </td>";
                        echo "</tr>";
                    }
                }

                ?>
            </table>
        </div>
        <table>
            <tr>
                <th>Sender</th>
                <th>Property</th>
                <th>Status</th>
            </tr>

            <?php
            $query1 = pg_query("SELECT * FROM bookings;");
            while ($row = pg_fetch_assoc($query1)) {
                echo "<tr>";
                echo "<td>" . $row['t_id'] . "</td>";
                echo "<td>" . $row['p_id'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>

        <?php








        // Admin Details
        echo "<h2>Admin Details</h2>";
        echo "<table>
<tr>
<th>Admin ID</th>
<th>Admin Password</th>
</tr>";

        while ($row = pg_fetch_assoc($result_admin)) {
            echo "<tr>";
            echo "<td>" . $row['admin_id'] . "</td>";
            echo "<td>" . $row['admin_pass'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Landlord Details
        echo "<h2>Landlord Details</h2>";
        echo "<table>
<tr>
<th>Landlord ID</th>
<th>Landlord Name</th>
<th>Verified</th>
</tr>";

        while ($row = pg_fetch_assoc($result_landlord)) {
            echo "<tr>";
            echo "<td>" . $row['lord_id'] . "</td>";
            echo "<td>" . $row['lord_name'] . "</td>";
            echo "<td>" . $row['verified'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";



        // Property Details
        echo "<h2>Property Details</h2>";
        echo "<table>
<tr>
<th>Property ID</th>
<th>Booked</th>
<th>City</th>
<th>Area</th>
<!--<th>Description</th>-->
<th>Type</th>
<th>Rating</th>
<th>Gender</th>
<th>Food</th>
<th>Parking</th>
<th>WiFi</th>
<th>AC</th>
<th>Furnished</th>
<th>Availability (Days)</th>
<th>Owner ID</th>
<th>Price</th>
<!--<th>Details</th>-->
</tr>";

        while ($row = pg_fetch_assoc($result_property)) {
            echo "<tr>";
            echo "<td>" . $row['p_id'] . "</td>";
            echo "<td>" . $row['p_booked'] . "</td>";
            echo "<td>" . $row['p_city'] . "</td>";
            echo "<td>" . $row['p_area'] . "</td>";
            // echo "<td>" . $row['p_description'] . "</td>";
            echo "<td>" . $row['p_type'] . "</td>";
            echo "<td>" . $row['p_rating'] . "</td>";
            echo "<td>" . $row['p_gender'] . "</td>";
            echo "<td>" . $row['p_food'] . "</td>";
            echo "<td>" . $row['p_parking'] . "</td>";
            echo "<td>" . $row['p_wifi'] . "</td>";
            echo "<td>" . $row['p_ac'] . "</td>";
            echo "<td>" . $row['p_furnished'] . "</td>";
            echo "<td>" . $row['p_availability'] . "</td>";
            echo "<td>" . $row['p_owner'] . "</td>";
            echo "<td>" . $row['p_prize'] . "</td>";
            // echo "<td>" . $row['p_details'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Tenant Details
        echo "<h2>Tenant Details</h2>";
        echo "<table>
<tr>
<th>Tenant ID</th>
<th>Email</th>
<th>Name</th>
<th>Password</th>
<th>History ID</th>
<th>Verified</th>
</tr>";

        while ($row = pg_fetch_assoc($result_tenant)) {
            echo "<tr>";
            echo "<td>" . $row['t_id'] . "</td>";
            echo "<td>" . $row['t_email'] . "</td>";
            echo "<td>" . $row['t_name'] . "</td>";
            echo "<td>" . $row['t_pass'] . "</td>";
            echo "<td>" . $row['t_history'] . "</td>";
            echo "<td>" . $row['t_verified'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";


        // History Details
        echo "<h2>History Details</h2>";
        echo "<table>
            <tr>
                <th>History ID</th>
                <th>Tenant ID</th>
                <th>Property ID</th>
                <th>Review</th>
                <th>Duration (months)</th>
                <th>Rating</th>
            </tr>";

        while ($row = pg_fetch_assoc($result_history)) {
            echo "<tr>";
            echo "<td>" . $row['h_id'] . "</td>";
            echo "<td>" . $row['t_id'] . "</td>";
            echo "<td>" . $row['p_id'] . "</td>";
            echo "<td>" . $row['review'] . "</td>";
            echo "<td>" . $row['duration'] . "</td>";
            echo "<td>" . $row['rating'] . "</td>";
            echo "</tr>";
        }
        echo "
        </table>";

        ?>
    </div>
</body>

</html>
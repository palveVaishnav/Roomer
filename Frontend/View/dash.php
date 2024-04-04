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
        .deny {
            padding: 5px 10px;
            border: 2px solid black;
        }

        .accept {
            background-color: #37d03b;
            color: #333;
        }

        .deny {
            background-color: red;
        }

        .property,
        .history,
        .admin,
        .landlord,
        .bookings,
        .message,
        .tenant {
            display: none;
        }

        .displayTable {
            display: grid;
            grid-template-columns: repeat(4, auto);
            gap: 20px;
        }

        `
    </style>
</head>

<body>
    <?php
        require_once ('../components/leftIndex.php');
    function updateBookingStatus($conn, $t_id, $p_id, $status)
    {
        $query = "UPDATE bookings SET status = $1 WHERE t_id = $2 AND p_id = $3";
        $params = array($status, $t_id, $p_id);
        $result = pg_query_params($conn, $query, $params);
        if ($result) {
            // Update the p_booked column for the given id
            if ($status == "booked") {
                $query = "UPDATE property SET p_booked='yes' WHERE p_id=$1";
            } else {
                $query = "UPDATE property SET p_booked='no' WHERE p_id=$1";
            }
            $result = pg_query_params($conn, $query, array($p_id));
            if ($result) {
                @header("Location: ./dash.php");
            }
        }
    }
    ?>

    <!-- Right Hero Section -->
    <div class="main_page">

        <?php
        require_once ('pgConfig.php');
        // Check if the user is logged in as an admin
        // session_start();
        if (!isset($_SESSION['admin_id'])) {
            // Redirect to the login page or display an error message
            header("Location: admin.php");
            exit();
        }
        ?>


        <br>
        <div class="displayTable">
            <button onclick="toggleElement('requestTable')">Booking Requests</button>
            <button onclick="toggleElement('bookings')">All Bookings</button>
            <button onclick="toggleElement('property')">Property</button>
            <button onclick="toggleElement('tenant')">Tenant</button>
            <button onclick="toggleElement('landlord')">Landlord</button>
            <button onclick="toggleElement('admin')">Admin</button>
            <button onclick="toggleElement('message')">Messages</button>
        </div>
        <br>
        <hr>


        <script>
            function toggleElement(className) {
                var element = document.querySelector('.' + className);
                if (element.style.display === 'none') {
                    element.style.display = 'block';
                } else {
                    element.style.display = 'none';
                }
            }
        </script>


        <?php
        $result_admin = pg_query($conn, "SELECT * FROM ADMIN");
        $result_landlord = pg_query($conn, "SELECT * FROM LANDLORD");
        $result_property = pg_query($conn, "SELECT * FROM PROPERTY");
        $result_tenant = pg_query($conn, "SELECT * FROM TENANT");
        $result_msg = pg_query($conn, "SELECT * FROM contact");

        ?>



        <!-- <h2>Booking Requests</h2> -->
        <div class="request">
            <table class="requestTable">
                <tr>
                    <th>Sender Name</th>
                    <th>Property Id</th>
                    <th>Amount Paid</th>
                    <th>Accept</th>
                    <th>Deny</th>
                </tr>

                <?php
                // Execute SQL queries to retrieve data
                $result_bookings = pg_query($conn, "SELECT * FROM bookings ");
                while ($row = pg_fetch_assoc($result_bookings)) {
                    if ($row['status'] == "pending") {
                        $tid = $row['t_id'];
                        $nameQuery = "SELECT t_name FROM tenant WHERE t_id= $tid";
                        $tName = pg_query($conn, $nameQuery);
                        if ($tName) {
                            $rowname = pg_fetch_assoc($tName);
                            if ($rowname) {
                                $theName = $rowname['t_name'];
                            }
                        }
                        $prizeid = $row['p_id'];
                        $nameQuery = "SELECT p_prize FROM property WHERE p_id= $prizeid";
                        $prize = pg_query($conn, $nameQuery);
                        if ($prize) {
                            $rowname = pg_fetch_assoc($prize);
                            if ($rowname) {
                                $thePrize = $rowname['p_prize'];
                            }
                        }

                        echo "<tr>";
                        echo "<td>" . $theName . "</td>";
                        echo "<td>" . $row['p_id'] . "</td>";
                        echo "<td>" . $thePrize . "</td>";
                        echo "<td>
                                <form action='' method='post'>
                                    <input type='hidden' name='t_id' value='" . $row['t_id'] . "'>
                                    <input type='hidden' name='p_id' value='" . $row['p_id'] . "'>
                                    <input type='hidden' name='status' value='booked'>
                                    <button type='submit' class='accept'>Approve</button>
                                </form>
                              </td>";
                        echo "<td>
                                <form action='' method='post'>
                                    <input type='hidden' name='t_id' value='" . $row['t_id'] . "'>
                                    <input type='hidden' name='p_id' value='" . $row['p_id'] . "'>
                                    <input type='hidden' name='status' value='denied'>
                                    <button type='submit' class='deny'>Deny</button>
                                </form>
                              </td>";
                        echo "</tr>";
                    }
                }

                ?>
                <?php
                // Function to update booking status
                if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $t_id = $_POST['t_id'];
                    $p_id = $_POST['p_id'];
                    $status = $_POST['status'];
                    updateBookingStatus($conn, $t_id, $p_id, $status);
                }
                ?>
            </table>
        </div>
        <!-- Request Table Ended -->

        <!-- Booking History -->
        <div class="bookings">
            <table class="requestTable">
                <tr>
                    <th>Tenant Name</th>
                    <th>Property Id</th>
                    <th>Amount Paid</th>
                    <th>Status</th>
                </tr>

                <?php
                // Execute SQL queries to retrieve data
                $result_bookings = pg_query($conn, "SELECT * FROM bookings ");
                while ($row = pg_fetch_assoc($result_bookings)) {
                    if ($row['status'] == "booked" || $row['status'] == "denied") {
                        $tid = $row['t_id'];
                        $nameQuery = "SELECT t_name FROM tenant WHERE t_id= $tid";
                        $tName = pg_query($conn, $nameQuery);
                        if ($tName) {
                            $rowname = pg_fetch_assoc($tName);
                            if ($rowname) {
                                $theName = $rowname['t_name'];
                            }
                        }
                        $prizeid = $row['p_id'];
                        $nameQuery = "SELECT p_prize FROM property WHERE p_id= $prizeid";
                        $prize = pg_query($conn, $nameQuery);
                        if ($prize) {
                            $rowname = pg_fetch_assoc($prize);
                            if ($rowname) {
                                $thePrize = $rowname['p_prize'];
                            }
                        }

                        echo "<tr>";
                        echo "<td>" . $theName . "</td>";
                        echo "<td>" . $row['p_id'] . "</td>";
                        echo "<td>" . $thePrize . "</td>";
                        echo "<td>" . $row['status'] . "</td>";
                        echo "</tr>";
                    }
                }
                ?>
            </table>
        </div>


        <?php
        // Admin Details
        // echo "<h2>Admin Details</h2>";
        echo "<table class='admin'>
                <tr>
                    <th>Admin ID</th>
                    <!--<th>Admin Password</th>-->
                </tr>";

        while ($row = pg_fetch_assoc($result_admin)) {
            echo "<tr>";
            echo "<td>" . $row['admin_id'] . "</td>";
            // echo "<td>" . $row['admin_pass'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";

        // Landlord Details
        // echo "<h2>Landlord Details</h2>";
        echo "<table class='landlord'>
                <tr>
                    <th>Landlord ID</th>
                    <th>Landlord Name</th>
                    <th>Verified</th>
                </tr>";

        while ($row = pg_fetch_assoc($result_landlord)) {
            echo "<tr>";
            echo "<td>" . $row['lord_id'] . "</td>";
            echo "<td>" . $row['lord_name'] . "</td>";
            if ($row['verified'] == 'no') {
                echo '
                    <td><button style="padding:5px 10px;">Verify</button></td>
                ';
            } else {
                echo "<td>" . $row['verified'] . "</td>";
            }
            // echo "<td>" . $row['verified'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";



        // Property Details
        // echo "<h2>Property Details</h2>";
        echo "<table class='property'>
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

        // messages Details
        echo "<table class='message'>
                <tr>
                    <th>reply id </th>
                    <th>SENDER</th>
                    <th>Email</th>
                    <th></th>
                    <th>Message</th>
                    <th>Reply</th>
                </tr>";

        while ($row = pg_fetch_assoc($result_msg)) {
            echo "<tr>";
            echo "<td>" . $row['m_id'] . "</td>";
            echo "<td>" . $row['m_name'] . "</td>";
            echo "<td>" . $row['m_mail'] . "</td><td></td>";
            echo "<td>" . $row['m_msg'] . "</td>";
            $mid = $row['m_id'];
            if (!$row['m_reply']) {
                echo "
                <td>
                    <form action='reply.php?id=$mid'  method='post'>
                        <input type='text' name='reply' id='reply' placeholder='Reply here' style='height:100px;width:200%;'>
                    </form>
                </td>
                ";
            } else {
                echo "<td>" . $row['m_reply'] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";


        // Tenant table 
        echo "<table class='tenant'>
                <tr>
                    <th>Tenant Id </th>
                    <th>Tenant</th>
                    <th>Email</th>
                    <!--<th>Password</th>-->
                    <th>Verified </th>
                </tr>";

        while ($row = pg_fetch_assoc($result_tenant)) {
            echo "<tr>";
            $passhash = password_hash($row['t_pass'], 1);
            echo "<td>" . $row['t_id'] . "</td>";
            echo "<td>" . $row['t_name'] . "</td>";
            echo "<td>" . $row['t_email'] . "</td>";
            // echo "<td>" . $passhash . "</td>";
            if ($row['t_verified'] == 'no') {
                echo '
                    <td><button style="padding:5px 10px;">Verify</button></td>
                ';
            } else {
                echo "<td>" . $row['t_verified'] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";

        ?>

    </div>
</body>

</html>
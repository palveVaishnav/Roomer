<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 50px auto;
        }
        form {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 10px;
        }
        input[type="text"], textarea {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            float: right;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php
        session_start();
        require_once('./pgConfig.php');
        $userId = $_SESSION['userId'];
        $query = "SELECT * FROM bookings WHERE t_id = $1;";
        $result = pg_query_params($conn,$query,array($userId));
        if(!$result){
            echo "<h1>Bookings Not Found</h1>";
            exit;
        }
        while($row = pg_fetch_assoc($result)){
            $pid = $row['p_id'];
            $Propertyquery = "SELECT * FROM property WHERE p_id = $pid;";
            $Propertyresult = pg_query($conn,$Propertyquery);
            while($rowi = pg_fetch_assoc($Propertyresult)){
                
            }

        }




    ?>
</body>
</html>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    $conn = pg_connect('host=localhost dbname=roomer user=postgres password=123456789');
    if (!$conn) {
        echo '<h1> Not Connected </h1>';
    } else {
        $query = "SELECT lord_name FROM LANDLORD WHERE lord_id = 4";
        $result = pg_query($conn,$query);
        while($row = pg_fetch_assoc($result)){
            $name = $row['lord_name'];
            echo '<h1> Lord Name is : '.$name.' </h1>';
        }
    }
    ?>
</body>

</html>
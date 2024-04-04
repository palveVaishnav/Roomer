<?php
    /* 
    // Lab 
    $host = "192.168.16.1";
    $username = "tyb21";
    $port = "5432";
    $password = "";
    $database = "tyb21";
    $conn=pg_connect("host=192.168.16.1 port=5432 dbname=tyb21 user=tyb21");
    */

    // laptop 
    
    $host = "localhost";
    $username = "postgres";
    $password = "123456789";
    $database = "roomer";

    // render 
    // $host = "dpg-cn09bf6v3ddc73c0dvv0-a.oregon-postgres.render.com";
    // $username = "vaishnav";
    // $password = "9KBmAiO263pC9ytCzIBE7ayPP4osHYYy";
    // $database = "roomer";



    $conn = pg_connect("host=$host dbname=$database user=$username password=$password");
    if (!$conn) {
        die("Connection failed: " . pg_last_error());
}
?>


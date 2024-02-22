<?php
    // laptop 
    $host = "localhost";
    $username = "postgres";
    $password = "123456789";
    $database = "roomer";

    $conn = pg_connect("host=$host dbname=$database user=$username password=$password");


    /* 
    // Lab 
    $host = "192.168.16.1";
    $username = "tyb21";
    $port = "5432";
    $password = "";
    $database = "tyb21";
    $conn=pg_connect("host=192.168.16.1 port=5432 dbname=tyb21 user=tyb21");
    */


    if (!$conn) {
        die("Connection failed: " . pg_last_error());
}
?>
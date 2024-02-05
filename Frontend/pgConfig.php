<?php

$host = "localhost";
$username = "postgres";
$password = "123456789";
$database = "roomer";

$conn = pg_connect("host=$host dbname=$database user=$username password=$password");

if (!$conn) {
    die("Connection failed: " . pg_last_error());
}
?>
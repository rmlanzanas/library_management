<?php

$host = "localhost";
$port = "5432";
$dbname = "database";
$user = "postgres";
$password = "ron";

$conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

if (!$conn) {
    echo "Connection failed";
}

?>
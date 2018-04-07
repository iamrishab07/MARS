<?php

// Connecting to the database

$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "mars";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);


// Check connection

if ($conn->connect_error) {
    header('Location: /mars/error.php');
    exit();
}

?>
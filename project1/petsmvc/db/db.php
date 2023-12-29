<?php

$servername = "localhost:3306";
$username = "myrna23";
$password = "%nzS5937m";
$dbname = "Pets-Store";

// Creating connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Checking connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

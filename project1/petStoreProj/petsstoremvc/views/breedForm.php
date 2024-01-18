<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$servername = "localhost:3306";
$username = "myrna23";
$password = "%nzS5937m";
$dbname = "Pets-Store";

$connect2DA = new ConnectionDA($servername, $username, $password, $dbname);
?>

<h3>Add a breed</h3>
<form method="POST">
    <label for="name">Breed:</label>
    <input type="text" id="name" name="name" required>

    <input type="submit" name="submit_breed" value="Submit">
    <input type="reset" name="reset" value="Reset">
</form>

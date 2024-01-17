<?php
// Include the ToyModel class
require_once '../models/baseModel.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Create a new ToyModel object
$toyModel = new ToyModel();

// Fetch all toys from the database
$toys = $toyModel->getAllToys();

// Start the HTML
echo '<h1>Toys</h1>';

// Loop through the toys and display each one
foreach ($toys as $toy) {
    echo '<div>';
    echo '<h2>' . $toy['name'] . '</h2>';
    echo '<p>' . $toy['description'] . '</p>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets A'More</title>

    <link rel="stylesheet" href="https://myrna67.web582.com/block3-adv-prog/project1/petStoreProj/petsstoremvc/assets/css/style.css">
</head>
<body>
    <h1>Welcome to Pets A'More</h1>

</body>
</html>
<?php

include_once __DIR__ . '/../controllers/config.php';
include_once __DIR__ . '/../models/baseModel.php';
include_once __DIR__ . '/../controllers/controller.php'; 

$controller = new controller($pdo); 

$id = $_GET['id']; // Get the pet's ID from the URL
$controller->deletePet($id); // Delete the pet

header('Location: index.php'); // Redirect back to the pet list

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pets = $controller->getPets(); // Fetch pet data

foreach ($pets as $pet) {
    $name = $pet->name ?? "Unknown";
    echo "<p>{$name}</p>";
    echo "<a href='edit.php?id={$pet->petID}'>Edit</a> ";
    echo "<a href='delete.php?id={$pet->petID}'>Delete</a> ";
    echo "<a href='pet_view.php?id={$pet->petID}'>View</a> ";
}

?>


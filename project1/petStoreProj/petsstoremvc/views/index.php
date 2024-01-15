<?php

include_once __DIR__ . '/../controllers/config.php';
include_once __DIR__ . '/../models/baseModel.php';
include_once __DIR__ . '/../controllers/controller.php'; 

$controller = new controller($pdo); 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$pets = $controller->getPets(); // Fetch pet data

foreach ($pets as $pet) {
    $name = $pet->name ?? "Unknown";
    echo "<p>{$name}</p>";
    var_dump($pet);
}

?>

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
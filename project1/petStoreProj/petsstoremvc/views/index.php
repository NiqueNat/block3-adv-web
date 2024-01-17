<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Store A'more</title>

    <link rel="stylesheet"
        href="https://myrna67.web582.com/block3-adv-prog/project1/petStoreProj/petsstoremvc/assets/css/style.css">


</head>

<body>
    <h1>Pet Store A'more</h1>
<!-- controller -->
<?php
// include_once '../controllers/config.php';
include_once '../controllers/PetController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$connect2DA = new ConnectionDA($servername, $username, $password, $dbname);
$petController = new PetController($connect2DA);
$petController->display();
?>


</body>

</html>
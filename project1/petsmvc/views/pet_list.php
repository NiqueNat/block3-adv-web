<!-- pet_list.php -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../controller/PetsController.php';

// $petController = new PetController();

$action = $_POST['action'] ?? null;
switch ($action) {
    case 'create':
        $name = isset($_POST['name']) ? $_POST['name'] : null;
        $breedId = isset($_POST['breedId']) ? $_POST['breedId'] : null;
        $speciesId = isset($_POST['speciesId']) ? $_POST['speciesId'] : null;
        $age = isset($_POST['age']) ? $_POST['age'] : null;
        $color = isset($_POST['color']) ? $_POST['color'] : null;
        $isMammal = isset($_POST['isMammal']) ? $_POST['isMammal'] : null;
        $height = isset($_POST['height']) ? $_POST['height'] : null;
        $weight = isset($_POST['weight']) ? $_POST['weight'] : null;
        $length = isset($_POST['length']) ? $_POST['length'] : null;
        
        if ($name && $breedId && $speciesId && $age && $color && $isMammal !== null && $height && $weight && $length) {
            $petController->createPet($name, $breedId, $speciesId, $age, $color, $isMammal, $height, $weight, $length);
        }
        break;

        case 'edit':
            $id = isset($_POST['id']) ? $_POST['id'] : null;
            $name = isset($_POST['name']) ? $_POST['name'] : null;
            $breed = isset($_POST['breed']) ? $_POST['breed'] : null;
            $age = isset($_POST['age']) ? $_POST['age'] : null;
            $color = isset($_POST['color']) ? $_POST['color'] : null;
            $isMammal = isset($_POST['isMammal']) ? 1 : 0;
            $height = isset($_POST['height']) ? $_POST['height'] : null;
            $weight = isset($_POST['weight']) ? $_POST['weight'] : null;
            $length = isset($_POST['length']) ? $_POST['length'] : null;
        
            if ($id && $name && $breed && $age && $color && $height && $weight && $length) {
                $petController->updatePet($id, $name, $breed, $age, $color, $isMammal, $height, $weight, $length);
            }
            break;
    case 'delete':
        $id = isset($_POST['id']) ? $_POST['id'] : null;
        if ($id) {
            $petController->deletePet($id);
        }
        break;
}

$servername = "localhost:3306";
$username = "myrna23";
$password = "%nzS5937m";
$dbname = "Pets-Store";
$charset = 'utf8mb4';

$dsn = "mysql:host=$servername;dbname=$dbname;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $username, $password, $opt);

$petController = new PetController($pdo);
$pets = $petController->getAllPets();
$action = $_POST['action'] ?? null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pets</title>
    <link rel="stylesheet" href="https://myrna67.web582.com/block3-adv-prog/project1/petsmvc/style.css"></head>
<body>
    <h1>Pets</h1>

<!-- Form to create a new pet -->
<form action="pet_list.php" method="post">
    <input type="hidden" name="action" value="create">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="breedId" placeholder="Breed ID">
    <input type="text" name="speciesId" placeholder="Species ID">
    <input type="text" name="age" placeholder="Age">
    <input type="text" name="color" placeholder="Color">
    <!-- <input type="checkbox" name="isMammal" value="1"> Is Mammal -->
    <input type="text" name="height" placeholder="Height">
    <input type="text" name="weight" placeholder="Weight">
    <input type="text" name="length" placeholder="Length">
    <input type="submit" value="Create Pet">
</form>

<!-- Form to edit an existing pet -->
<form action="pet_list.php" method="post">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id" placeholder="ID">
    <input type="text" name="name" placeholder="Name">
    <input type="text" name="breedId" placeholder="Breed ID">
    <input type="text" name="speciesId" placeholder="Species ID">
    <input type="text" name="age" placeholder="Age">
    <input type="text" name="color" placeholder="Color">
    <!-- <input type="checkbox" name="isMammal" value="1"> Is Mammal -->
    <input type="text" name="height" placeholder="Height">
    <input type="text" name="weight" placeholder="Weight">
    <input type="text" name="length" placeholder="Length">
    <input type="submit" value="Edit Pet">
</form>

<!-- List of pets with edit and delete buttons -->
<ul>
    <?php 
    foreach ($pets as $pet): ?>
        <li>
            Name: <?php echo $pet['PetName']; ?><br>
            Toys: <?php echo isset($pet['Toys']) ? $pet['Toys'] : ''; ?><br>
            Price: <?php echo isset($pet['Price']) ? $pet['Price'] : ''; ?>

            <!-- Form to edit this pet -->
<form action="pet_list.php" method="post">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id" value="<?php echo $pet['PetID']; ?>">
    <input type="text" name="name" value="<?php echo $pet['PetName']; ?>">
    <input type="text" name="breedId" value="<?php echo $pet['BreedID']; ?>">
    <input type="text" name="speciesId" value="<?php echo $pet['SpeciesID']; ?>">
    <input type="text" name="toys" value="<?php echo isset($pet['Toys']) ? $pet['Toys'] : ''; ?>">
    <input type="text" name="price" value="<?php echo isset($pet['Price']) ? $pet['Price'] : ''; ?>">
    <input type="submit" value="Edit">
</form>

            <!-- Form to delete this pet -->
            <form action="pet_list.php" method="post">
                <input type="hidden" name="action" value="delete">
                <input type="hidden" name="id" value="<?php echo $pet['PetID']; ?>">
                <input type="submit" value="Delete">
            </form>
        </li>
    <?php endforeach; ?>
</ul>
</body>
</html>
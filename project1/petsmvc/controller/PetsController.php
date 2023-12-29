<?php
// PetsController.php
include_once '../model/Pets.php';

class PetController {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }
    
    public function createPet($petId, $name, $breedId, $speciesId) {
        $stmt = $this->pdo->prepare("INSERT INTO Pets (PetID, PetName, BreedID, SpeciesID) VALUES (?, ?, ?, ?)");
        $stmt->execute([$petId, $name, $breedId, $speciesId]);
    }

    

    public function getPet($id) {
        return Pet::find($id, $this->pdo);
    }

    public function getAllPets() {
        $stmt = $this->pdo->prepare("SELECT PetID, PetName, Toys, Price FROM Pets");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function updatePet($id, $age, $color, $isMammal, $height, $weight, $length) {
        $pet = Pet::find($id, $this->pdo);
        $pet->age = $age;
        $pet->color = $color;
        $pet->isMammal = $isMammal;
        $pet->height = $height;
        $pet->weight = $weight;
        $pet->length = $length;
        $pet->save();

        
    }

    public function deletePet($id) {
        $pet = Pet::find($id, $this->pdo);
        $pet->delete();
    }
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
?>
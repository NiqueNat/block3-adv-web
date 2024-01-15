<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once __DIR__ . '/../controllers/config.php';
include_once __DIR__ . '/../models/baseModel.php';


class controller
{
    private $pdo;
    private $PetsModel;
    private $SpeciesModel;
    private $BreedModel;
    private $ToyModel;

    public function __construct($conn)
    {
        $this->pdo = $conn;
        $this->PetsModel = new Pets($conn);
        $this->SpeciesModel = new Species($conn);
        $this->BreedModel = new Breed($conn);
        $this->ToyModel = new Pricing($conn);
    }

    public function pet_list()
    {
        $pets = $this->PetsModel->getAllPets();
        $species = $this->SpeciesModel->getAllSpecies();
        $breed = $this->BreedModel->getAllBreed();
        $toys = $this->getToys();
        include "../views/pet_list.php";
    }

    //  DISPLAY FUNCTION
    public function display()
    {
        $pets = $this->getPets();
        $species = $this->SpeciesModel->getAllSpecies();
        $breed = $this->BreedModel->getAllBreed();
        $toys = $this->getToys();
        include "../views/pet_list.php";
    }

    //  PET TABLE MODEL
    public function addPet()
    {
        if (isset($_POST['age'], $_POST['color'], $_POST['isNeutered'], $_POST['pet_breed'], $_POST['pet_species'])) {
            $pet_age = $_POST['age'];
            $pet_color = $_POST['color'];
            $isNeutered = $_POST['isNeutered'];
            $pet_breed = $_POST['pet_breed'];
            $pet_species = $_POST['pet_species'];
            $result = $this->PetsModel->insertPets($pet_age, $pet_color, $isNeutered, $pet_breed, $pet_species);
            if ($result) {
                echo "Pet added successfully $pet_age, $pet_color, $isNeutered, $pet_breed, $pet_species";
            } else {
                echo "Error adding pet";
            }
        } else {
            echo "All fields are required.";
        }
    }


    public function getPets()
    {
        $stmt = $this->pdo->prepare("SELECT petID, age, color, isNeutered, pet_breed, pet_species, name FROM Pets");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    //  SPECIES TABLE MODEL

    public function addSpeciesType()
    {

        if (!isset($_POST['name']) || empty($_POST['name'])) {
            echo "Please enter a species name.";
        } else {

            $speciesName = $_POST['name'];

            $this->SpeciesModel->insertSpecies($speciesName);
            echo "Species added successfully: $speciesName";
        }
    }

    public function updateSpeciesName($id, $new_species_name)
    {
        return $this->SpeciesModel->updateSpecies($id, $new_species_name);
    }

    public function deleteSpeciesType()
    {

        if (isset($_POST['pet_speciesID'])) {

            $speciesID = $_POST['pet_speciesID'];

            $result = $this->SpeciesModel->deleteSpecies($speciesID);
            if ($result) {
                echo "Species deleted successfully: $speciesID";
            } else {
                echo "Error deleting species: $speciesID";
            }
        } else {
            echo "No species ID provided.";
        }
    }

    //  BREED TABLE MODEL

    public function addBreedType()
    {
        if (!isset($_POST['breedName']) || empty($_POST['breedName'])) {
            echo "Please enter a breed name.";
        } else {
            $breedName = $_POST['breedName'];
            $this->BreedModel->insertBreed($breedName);
            echo "Breed added successfully: $breedName";
        }
    }

    public function updateBreedName($id, $new_breed_name)
    {
        return $this->BreedModel->updateBreed($id, $new_breed_name);
    }

    public function deleteBreedType()
    {
        if (isset($_POST['pet_breedID'])) {
            $breedID = $_POST['pet_breedID'];
            $result = $this->BreedModel->deleteBreed($breedID);
            if ($result) {
                echo "Breed deleted successfully: $breedID";
            } else {
                echo "Error deleting breed: $breedID";
            }
        } else {
            echo "No breed ID provided.";
        }
    }

    //  TOY TABLE MODEL

    public function addToyType()
    {
        if (isset($_POST['name']) && isset($_POST['price'])) {
            $toy_name = $_POST['name'];
            $toy_price = $_POST['price'];
            $this->ToyModel->insertToy($toy_name, $toy_price);
        } else {
            echo "Toy name or price not provided.";
        }
    }
    public function getToys()
    {
        return $this->ToyModel->getToys();
    }

    public function updateToyName($id, $new_toy_name)
    {
        return $this->ToyModel->updateToy($id, $new_toy_name);
    }

    public function deleteToyType()
    {
        if (isset($_POST['pet_toyID'])) {
            $toyID = $_POST['pet_toyID'];
            $result = $this->ToyModel->deleteToy($toyID);
            if ($result) {
                echo "Toy deleted successfully: $toyID";
            } else {
                echo "Error deleting toy: $toyID";
            }
        } else {
            echo "No toy ID provided.";
        }
    }
}


$config = new config($servername, $username, $password, $dbname);
$pdo = new PDO("mysql:host={$config->getServername()};dbname={$config->getDbname()}", $config->getUsername(), $config->getPassword());
$controller = new Controller($pdo);

$controller->display();
if (isset($_POST['submit']) && $_POST['submit'] == 'pet_list') {
    $controller->addPet();
}

$controller->pet_list();


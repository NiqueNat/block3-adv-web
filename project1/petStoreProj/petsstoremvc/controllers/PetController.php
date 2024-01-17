<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once '../models/model.php';

class PetController
{
    private $PetModel;
    private $SpeciesModel;
    private $BreedModel;
    private $ToyModel;

    public function __construct($conn)
    {
        $this->PetModel = new PetModel($conn);
        $this->SpeciesModel = new SpeciesModel($conn);
        $this->BreedModel = new BreedModel($conn);
        $this->ToyModel = new ToyModel($conn);
	
    }

    public function petForm()
    {
        $pets = $this->PetModel->getAllPets();
        $species = $this->SpeciesModel->getAllSpecies();
        $breeds = $this->BreedModel->getAllBreeds();
        $toys = $this->getToys();
        include "../views/petForm.php";
    }


    public function display() {
        // Fetch data from models
        $pets = $this->PetModel->getAllPets();
        $breeds = $this->BreedModel->getAllBreeds();
        $species = $this->SpeciesModel->getAllSpecies();
    
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit']) && $_POST['submit'] == 'petForm') {
                $this->addPet();
            }
        }
    
        // Include the view file
        include '../views/petView.php';
    }
    // PET TABLE MODEL
    public function addPet()
    {
        if (
            isset($_POST['name'], $_POST['gender'], $_POST['age'], $_POST['color'], $_POST['breed_id'], $_POST['species_id'])
        ) {
            $pet_name = $_POST['name'];
            $pet_gender = $_POST['gender'];
            $pet_age = $_POST['age'];
            $pet_color = $_POST['color'];
            $breed_id = $_POST['breed_id'];
            $species_id = $_POST['species_id'];
            $result = $this->PetModel->insertPet($pet_name, $pet_gender, $pet_age, $pet_color, $breed_id, $species_id);
            if ($result) {
                echo "Pet added successfully: $pet_name, $pet_gender, $pet_age, $pet_color, $breed_id, $species_id";
            } else {
                echo "Error adding pet";
            }
        } else {
            echo "All fields are required.";
        }
    }

    // SPECIES TABLE MODEL
    public function addSpeciesType()
    {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            echo "Please enter a species name.";
        } else {
            $species_name = $_POST['name'];
            $this->SpeciesModel->insertSpecies($species_name);
            echo "Species added successfully: $species_name";
        }
    }

    public function updateSpeciesName($id, $new_species_name)
    {
        return $this->SpeciesModel->updateSpecies($id, $new_species_name);
    }

    public function deleteSpeciesType()
    {
        if (isset($_POST['pet_species_id'])) {
            $species_id = $_POST['pet_species_id'];
            $result = $this->SpeciesModel->deleteSpecies($species_id);
            if ($result) {
                echo "Species deleted successfully: $species_id";
            } else {
                echo "Error deleting species: $species_id";
            }
        } else {
            echo "No species ID provided.";
        }
    }

    // BREED TABLE MODEL
    public function addBreedType()
    {
        if (!isset($_POST['name']) || empty($_POST['name'])) {
            echo "Please enter a breed name.";
        } else {
            $breed_name = $_POST['name'];
            $this->BreedModel->insertBreed($breed_name);
            echo "Breed added successfully: $breed_name";
        }
    }

    public function updateBreedName($id, $new_breed_name)
    {
        return $this->BreedModel->updateBreed($id, $new_breed_name);
    }

    public function deleteBreedType()
    {
        if (isset($_POST['pet_breed_id'])) {
            $breed_id = $_POST['pet_breed_id'];
            $result = $this->BreedModel->deleteBreed($breed_id);
            if ($result) {
                echo "Breed deleted successfully: $breed_id";
            } else {
                echo "Error deleting breed: $breed_id";
            }
        } else {
            echo "No breed ID provided.";
        }
    }

    // TOY TABLE MODEL
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
        if (isset($_POST['pet_toy_id'])) {
            $toy_id = $_POST['pet_toy_id'];
            $result = $this->ToyModel->deleteToy($toy_id);
            if ($result) {
                echo "Toy deleted successfully: $toy_id";
            } else {
                echo "Error deleting toy: $toy_id";
            }
        } else {
            echo "No toy ID provided.";
        }
    }
}

include_once '../controllers/config.php';
$connect2DA = new ConnectionDA(
    $servername,
    $username,
    $password,
    $dbname
);
$controller = new PetController($connect2DA);


// Call addPet() only if the form is submitted
if (isset($_POST['submit']) && $_POST['submit'] == 'petForm') {
    $controller->addPet();
}

$controller = new PetController($connect2DA);
$controller->petForm();
?>
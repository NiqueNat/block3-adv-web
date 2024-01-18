<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include_once 'models/model.php';

class PetController
{

    public function menuLinks(){
        include 'views/links.php'; 
    }


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
        include "views/petForm.php";
    }
    public function display()
    {
        // Fetch data from models
        $pets = $this->PetModel->getAllPets();
        $breeds = $this->BreedModel->getAllBreeds();
        $species = $this->SpeciesModel->getAllSpecies();
        // $toys = $this->ToyModel->getToys(); // Fetch toys
    
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['submit_breed'])) {
                // Handle breed submission
                $this->addBreedType();
            }
            if (isset($_POST['update_toy'])) {
                // Handle toy update
                $this->updateToyName($_POST['toy_id'], $_POST['new_toy_name']);
            } elseif (isset($_POST['delete_toy'])) {
                // Handle toy deletion
                $this->deleteToyType();
            } elseif (isset($_POST['submit_toy'])) {
                // Handle toy submission
                $this->addToyType();
            } elseif (isset($_POST['submit_pet'])) {
                // Handle pet submission
                $this->addPet();
            } elseif (isset($_POST['submit_species'])) {
                // Handle species submission
                $this->addSpeciesType();
            }
        }
    
        // Include the view file
        include 'views/petView.php';
    }

    // PET TABLE MODEL

    // public function displayPetForm()
    // {
    //     $species = $this->SpeciesModel->getAllSpecies();
    //     $breed = $this->BreedModel->getAllBreeds();
    //     include "../view/petForm.php";
    // }

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
    public function speciesForm()
{
    $species = $this->SpeciesModel->getAllSpecies();
    include "views/speciesForm.php";
}
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

public function breedForm()
{
    $breeds = $this->BreedModel->getAllBreeds();
    include "views/breedForm.php";
}

public function breedView()
{
    $breeds = $this->BreedModel->getAllBreeds();
    include "views/breedView.php";
}
    public function displayToyType()
    {
        $toys = $this->ToyModel->getToys();
        if ($toys === false) {
            error_log('Error fetching toys');
        } elseif (empty($toys)) {
            error_log('No toys found');
        }
    
        if (!file_exists('views/toyView.php')) {
            error_log('toyView.php file does not exist');
        } else {
            include 'views/toyView.php';
        }
    }

    public function toyForm()
{
    $toys = $this->ToyModel->getToys();
    include "views/toyForm.php";
}
    // TOY TABLE MODEL
    public function addToyType()
    {
        if (isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['price']) && !empty($_POST['price'])) {
            $toy_name = $_POST['name'];
            $toy_price = $_POST['price'];
            $result = $this->ToyModel->insertToy($toy_name, $toy_price);
            if ($result) {
                echo "Toy added successfully: $toy_name, $toy_price";
            } else {
                echo "Error adding toy";
            }
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


include_once 'controllers/config.php';
$connect2DA = new ConnectionDA(
    $servername,
    $username,
    $password,
    $dbname
);
$controller = new PetController($connect2DA);

// Always display the links
$controller->menuLinks();

// Check if the toy form is submitted
if (isset($_POST['submit_toy'])) {
    $controller->addToyType();
    echo "Toy added";
}

if (isset($_POST['submit_pet'])) {
    $controller->addPet();
    echo "Pet added";
}

// Check the page parameter
if (isset($_GET['page'])) {
    error_log('Page: ' . $_GET['page']);
    switch ($_GET['page']) {
        case 'addToyType':
            $controller->toyForm();
            break;
        case 'toy':
            $controller->displayToyType();
            break;
        case 'updateToy':
            include "views/updateToyForm.php";
            break;
        case 'deleteToy':
            include "views/deleteToy.php"; 
            break;
        case 'pet':
            $controller->display();
            break;
        case 'addPet':
            $controller->petForm();
            break;
        case 'addSpecies':
            $controller->speciesForm();
            break;
        case 'addBreed':
            $controller->breedForm();
            break;
            case 'breedView':
                $controller->breedView();
                break;
        default:
            echo "Page not found.";
            break;
    }
} else {
    error_log('No page parameter set');
}
?>

<!-- operations always come before displays -->
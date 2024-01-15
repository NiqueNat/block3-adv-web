<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

class BaseModel
{
    protected $pdo;
    protected $id;

    public function __construct($pdo, $id = null)
    {
        $this->id = $id;
        $this->pdo = $pdo;
    }
}

$pdo = new PDO('mysql:host=localhost:3306;dbname=Pets-Store', 'myrna23', '%nzS5937m');

class Breed extends BaseModel
{
    public $breedId;
    public $breedName;
    public $speciesId;
    public $pureBred;
    public $mixedBreed;

    public function findAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Breed");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllBreed()
    {
        return $this->findAll();
    }
}

class Pets extends BaseModel
{
    protected $age;
    protected $color;
    protected $isNeutered;
    protected $pet_breed;
    protected $pet_species;

    public function __construct($pdo, $id = null, $age = null, $color = null, $isNeutered = null, $pet_breed = null, $pet_species = null)
    {
        parent::__construct($pdo, $id);

        $this->age = $age;
        $this->color = $color;
        $this->isNeutered = $isNeutered;
        $this->pet_breed = $pet_breed;
        $this->pet_species = $pet_species;
    }

    public function getAllPets()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Pets");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save()
    {
        $stmt = $this->pdo->prepare("INSERT INTO Pets (petID, age, color, isNeutered, pet_breed, pet_species) VALUES (?, ?, ?, ?, ?, ?) ON DUPLICATE KEY UPDATE age = VALUES(age), color = VALUES(color), isNeutered = VALUES(isNeutered), pet_breed = VALUES(pet_breed), pet_species = VALUES(pet_species)");
        $stmt->execute([$this->id, $this->age, $this->color, $this->isNeutered, $this->pet_breed, $this->pet_species]);
    }

    public static function find($id, $pdo)
    {
        $stmt = $pdo->prepare("SELECT * FROM Pets WHERE petID = ?");
        $stmt->execute([$id]);
        $data = $stmt->fetch();

        if ($data) {
            return new Pets($pdo, $data['petID'], $data['age'], $data['color'], $data['isNeutered'], $data['pet_breed'], $data['pet_species']);
        }

        return null;
    }

    public function delete()
    {
        $stmt = $this->pdo->prepare("DELETE FROM Pets WHERE petID = ?");
        $stmt->execute([$this->id]);
    }
}

class Pricing extends BaseModel
{
    public $itemId;
    public $itemType;
    public $cost;
    public $onSale;

    public function getToys()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Toys");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

class Species extends BaseModel
{
    public $speciesId;
    public $speciesName;

    public function __construct($pdo)
    {
        parent::__construct($pdo);
    }

    public function findAll()
    {
        $stmt = $this->pdo->prepare("SELECT * FROM Species");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllSpecies()
    {
        return $this->findAll();
    }
}
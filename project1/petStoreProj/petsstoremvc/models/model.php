<?php

ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

class ConnectionDA
{
    public function __construct(public $host, public $username, public $password, public $dbname)
    {
    }
}

class PetModel
{
    private $mysqli;
    private $ConnectionDA;
    public function __construct($ConnectionDA)
    {
        $this->ConnectionDA = $ConnectionDA;
    }

    public function connect()
    {
        try {
            $mysqli = new mysqli(
                $this->ConnectionDA->host,
                $this->ConnectionDA->username,
                $this->ConnectionDA->password,
                $this->ConnectionDA->dbname
            );

            if ($mysqli->connect_error) {
                throw new Exception("could not connect");
            }
            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }


    // select all pets from the database to display
    public function getAllPets()
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM pets");
            $results = array();
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }


    // insert a new pet into the database
    public function insertPet($pet_name, $pet_gender, $pet_age, $pet_color, $breed_id, $species_id)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "INSERT INTO pets (pet_name, pet_gender, pet_age, pet_color, breed_id, species_id) VALUES ('$pet_name', '$pet_gender', $pet_age, '$pet_color', $breed_id, $species_id)";
            if ($mysqli->query($sql) === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }


}

class SpeciesModel
{
    private $mysqli;
    private $ConnectionDA;
    public function __construct($ConnectionDA)
    {
        $this->ConnectionDA = $ConnectionDA;
    }

    public function connect()
    {
        try {
            $mysqli = new mysqli(
                $this->ConnectionDA->host,
                $this->ConnectionDA->username,
                $this->ConnectionDA->password,
                $this->ConnectionDA->dbname
            );

            if ($mysqli->connect_error) {
                throw new Exception("could not connect");
            }
            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }
    public function getAllSpecies()
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to get all species
            $result = $mysqli->query("SELECT * FROM pet_species");
            $results = array();
            // Fetch all the rows from the result of the query
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            // Close the database connection
            $mysqli->close();
            // Return the fetched rows
            return $results;
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }

    public function insertSpecies($species_name)
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to insert the new species
            if ($mysqli->query("INSERT INTO pet_species (pet_species_type) VALUES ('$species_name')") === TRUE) {
                // Close the database connection
                $mysqli->close();
                // Return true if the insertion was successful
                return true;
            } else {
                // If the insertion was not successful, print the error and return false
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }

    public function updateSpecies($id, $new_species_name)
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to update the species
            $sql = "UPDATE pet_species SET pet_species_type = '$new_species_name' WHERE pet_species_id = '$id' ";
            if ($mysqli->query($sql) === TRUE) {
                // Close the database connection
                $mysqli->close();
                // Return true if the update was successful
                return true;
            } else {
                // If the update was not successful, print the error and return false
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }

    public function deleteSpecies($id)
    {
        // Connect to the database
        $mysqli = $this->connect();
        if ($mysqli) {
            // If the connection is successful, execute a SQL query to delete the species
            $sql = "DELETE FROM pet_species WHERE pet_species_id = $id";
            if ($mysqli->query($sql) === TRUE) {
                // Close the database connection
                $mysqli->close();
                // Return true if the deletion was successful
                return true;
            } else {
                // If the deletion was not successful, print the error and return false
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            // If the connection is not successful, return false
            return false;
        }
    }
}

class BreedModel
{
    private $mysqli;
    private $ConnectionDA;
    public function __construct($ConnectionDA)
    {
        $this->ConnectionDA = $ConnectionDA;
    }

    public function connect()
    {
        try {
            $mysqli = new mysqli(
                $this->ConnectionDA->host,
                $this->ConnectionDA->username,
                $this->ConnectionDA->password,
                $this->ConnectionDA->dbname
            );

            if ($mysqli->connect_error) {
                throw new Exception("could not connect");
            }
            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getAllBreeds()
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM pet_breed");
            $results = array();
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

    public function insertBreed($breed_name)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            if ($mysqli->query("INSERT INTO pet_breed (pet_breed_name) VALUES ('$breed_name')") === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public function updateBreed($id, $new_breed_name)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "UPDATE pet_breed SET pet_breed_name = '$new_breed_name' WHERE pet_breed_id = '$id' ";
            if ($mysqli->query($sql) === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteBreed($id)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "DELETE FROM pet_breed WHERE pet_breed_id = $id";
            if ($mysqli->query($sql) === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }
}

class ToyModel
{
    private $mysqli;
    private $ConnectionDA;
    public function __construct($ConnectionDA)
    {
        $this->ConnectionDA = $ConnectionDA;
    }

    public function connect()
    {
        try {
            $mysqli = new mysqli(
                $this->ConnectionDA->host,
                $this->ConnectionDA->username,
                $this->ConnectionDA->password,
                $this->ConnectionDA->dbname
            );

            if ($mysqli->connect_error) {
                throw new Exception("could not connect");
            }
            return $mysqli;
        } catch (Exception $e) {
            return false;
        }
    }

    public function getToys()
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $result = $mysqli->query("SELECT * FROM pet_toy");
            $results = array();
            while ($row = $result->fetch_assoc()) {
                $results[] = $row;
            }
            $mysqli->close();
            return $results;
        } else {
            return false;
        }
    }

    public function insertToy($pet_toy_name, $pet_toy_price)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "INSERT INTO pet_toy (pet_toy_name, pet_toy_price) VALUES ('$pet_toy_name', $pet_toy_price)";
            if ($mysqli->query($sql) === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }


    public function updateToy($id, $new_toy_name)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "UPDATE pet_toy SET pet_toy_name = '$new_toy_name' WHERE pet_toy_id = $id";
            if ($mysqli->query($sql) === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteToy($id)
    {
        $mysqli = $this->connect();
        if ($mysqli) {
            $sql = "DELETE FROM pet_toy WHERE pet_toy_id = $id";
            if ($mysqli->query($sql) === TRUE) {
                $mysqli->close();
                return true;
            } else {
                echo "Error: " . $mysqli->error;
                $mysqli->close();
                return false;
            }
        } else {
            return false;
        }
    }
}




?>


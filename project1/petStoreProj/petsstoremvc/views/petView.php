<?php
// include_once '../controllers/config.php';
include_once '../controllers/PetController.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

    if (isset($pets) && is_array($pets)) {
        echo "<table border='1'>";
        echo "<tr>
        <th>ID</th>
        <th>name</th>
        <th>age</th>
        <th>color</th>
        <th>breed</th>
        <th>species</th>
    </tr>";
        foreach ($pets as $pet) {
            if (!isset($pet['pet_id'], $pet['pet_name'], $pet['pet_age'], $pet['pet_color'], $pet['breed_id'], $pet['species_id'])) {
                echo "Pet data is missing some keys.";
                continue;
            }
            echo "<tr>";
            echo "<td>" . $pet['pet_id'] . "</td>";
            echo "<td>" . $pet['pet_name'] . "</td>";
            echo "<td>" . $pet['pet_age'] . "</td>";
            echo "<td>" . $pet['pet_color'] . "</td>";
            echo "<td>" . $pet['breed_id'] . "</td>";
            echo "<td>" . $pet['species_id'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No pet data found.";
    }
?>
<?php
    if ($pets) {
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
            $pet = json_decode(json_encode($pet), true); 
            echo "<td>" . $pet['petID'] . "</td>";
            echo "<td>" . $pet['name'] . "</td>";
            echo "<td>" . $pet['pet_age'] . "</td>";
            echo "<td>" . $pet['pet_color'] . "</td>";
            echo "<td>" . $pet['breedID'] . "</td>";
            echo "<td>" . $pet['speciesID'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "No pet data found.";
    }

<?php

if ($species) {

    echo "<table border='1'>";
    echo "<tr>
        <th>ID</th>
        <th>Species Type</th>
        <th>Update</th>

    </tr>";
    foreach ($species as $specie) {
        echo "<td>" . $specie['pet_speciesID'] . "</td>";
        echo "<td>" . $specie['pet_speciesName'] . "</td>";
        echo "<td>";
        include 'views/updateSpecies.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No species data found.";
}

?>
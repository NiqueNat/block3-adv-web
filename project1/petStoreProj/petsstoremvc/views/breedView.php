<?php

if ($pet_breeds) {

    echo "<table border='1'>";
    echo "<tr>
        <th>ID</th>
        <th>Breed Type</th>
        <th>Update</th>
    </tr>";
    foreach ($breeds as $breed) {
        echo "<td>" . $breed['pet_breed_id'] . "</td>";
        echo "<td>" . $breed['pet_breed_name'] . "</td>";
        echo "<td>";
        include 'views/updateBreedForm.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No breed data found.";
}

?>
<?php

if ($breeds) {

    echo "<table border='1'>";
    echo "<tr>
        <th>ID</th>
        <th>Breed Type</th>
        <th>Update</th>
    </tr>";
    foreach ($breed as $breed) {
        echo "<td>" . $breed['pet_breedID'] . "</td>";
        echo "<td>" . $breed['pet_breedName'] . "</td>";
        echo "<td>";
        include '../views/breed_list.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No breed data found.";
}

?>
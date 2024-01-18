<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($breeds) {
    echo "<table>";
    echo "<tr>
        <th>ID</th>
        <th>Breed Type</th>
        <th>Update</th>
    </tr>";

    foreach ($breeds as $breed) {
        echo "<tr>";
        echo "<td>" . $breed['pet_breed_id'] . "</td>";
        echo "<td>" . $breed['pet_breed_name'] . "</td>";
        echo "<td>";
        include 'views/updateBreedForm.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No breeds found.";
}
?>

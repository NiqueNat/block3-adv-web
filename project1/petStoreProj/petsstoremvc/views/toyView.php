<?php
if ($toys) {
    echo "<table>";
    echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>";

    foreach ($toys as $toy) {
        echo "<tr>";
        echo "<td>" . $toy['pet_toy_id'] . "</td>";
        echo "<td>" . $toy['pet_toy_name'] . "</td>";
        echo "<td>" . $toy['pet_toy_price'] . "</td>";
        echo "<td>";
        include 'views/updateToyForm.php'; 
        echo "</td>";
        echo "<td>";
        include 'views/deleteToy.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No toys found.";
}
?>

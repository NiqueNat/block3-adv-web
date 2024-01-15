<?php

if ($toys) {
    echo "<table>";
    echo "<tr>
        <th>ID</th>
        <th>Name</th>
        <th>Price</th>
        <th>Update</th>
        </tr>";

    foreach ($toys as $toy) {
        echo "<tr>";
        echo "<td>" . $toy['pet_toyID'] . "</td>";
        echo "<td>" . $toy['pet_toyName'] . "</td>";
        echo "<td>" . $toy['pet_toyPrice'] . "</td>";
        echo "<td>";
        include 'views/updateToys.php';
        echo "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No toys found.";
}

?>
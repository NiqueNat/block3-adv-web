<?php

$servername = "localhost:3306";
$username = "myrna23";
$password = "%nzS5937m";
$dbname = "Pets-Store";

$connect2DA = new ConnectionDA($servername, $username, $password, $dbname);


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


?>


<section class="wrapper">

    <!--Pet-->
<h3>Add a pet</h3>
    <form method="POST">
        <label for="name">name:</label>
        <input type="text" id="name" name="name" required>

        <label for="age">age:</label>
        <input type="text" id="age" name="age" required>

        <label for="gender">gender:</label>
        <input type="text" id="gender" name="gender" required>

        <label for="color">color:</label>
        <input type="text" id="color" name="color" required>

        <label for="breed_id">breed:</label>
        <select name="breed_id">
            <?php foreach ($breeds as $breed) : ?>
                <option value="<?= $breed['pet_breed_id'] ?>"><?= $breed['pet_breed_name'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="species_id">species:</label>
        <select name="species_id">
            <?php foreach ($species as $specie) : ?>
                <option value="<?= $specie['pet_species_id'] ?>"><?= $specie['pet_species_type'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" name="submit_pet" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>

 

</section>
<section class="wrapper">
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

        <label for="breedID">breed:</label>
<select name="breedID">
    <?php 
    foreach ($breed as $b) : ?>
        <option value="<?= $b['pet_breed'] ?>"><?= $b['pet_breed'] ?></option>
    <?php endforeach; ?>
</select>

<label for="speciesID">species:</label>
<select name="speciesID">
    <?php foreach ($species as $specie) : ?>
        <option value="<?= $specie['pet_species'] ?>"><?= $specie['pet_species'] ?></option>
    <?php endforeach; ?>
</select>
        
        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
</section>
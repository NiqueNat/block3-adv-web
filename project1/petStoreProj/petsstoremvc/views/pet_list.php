<section class="wrapper">
    <h3>Add a species</h3>
    <form method="POST">
        <label for="name">Species:</label>
        <input type="text" id="name" name="name" required>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>

    <h3>Add a toy</h3>
    <form method="POST">
        <label for="name">Toy:</label>
        <input type="text" id="name" name="name" required>
        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>

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
            <?php foreach ($breeds as $breed) : ?>
                <option value="<?= $breed['pet_breedID'] ?>"><?= $breed['pet_breedName'] ?></option>
            <?php endforeach; ?>
        </select>

        <label for="speciesID">species:</label>
        <select name="speciesID">
            <?php foreach ($species as $specie) : ?>
                <option value="<?= $specie['speciesID'] ?>"><?= $specie['speciesName'] ?></option>
            <?php endforeach; ?>
        </select>

        <input type="submit" name="submit" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
</section>
<h2>Update a breed</h2>
        <form method="POST">
            <input type='hidden' name='pet_breedID' value='<?php echo $breed['pet_breedID']; ?>'>
            <input type="text" name="new_breedName" placeholder="Enter New Breed Name">
            <input type="submit" value="Update Breed">
            <input type="submit" name="delete" value="Delete Breed">
            <input type="reset" name="reset" value="Reset">

        </form>
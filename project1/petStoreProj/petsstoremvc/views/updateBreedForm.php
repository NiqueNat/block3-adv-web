        <h2>Update a breed</h2>
        <form method="POST">
            <input type='hidden' name='pet_breed_id' value='<?php echo $breed['pet_breed_id']; ?>'>
            <input type="text" name="new_breed_name" placeholder="Enter New Breed Name">
            <input type="submit" value="Update Breed">
            <input type="submit" name="delete" value="Delete Breed">
            <input type="reset" name="reset" value="Reset">

        </form>
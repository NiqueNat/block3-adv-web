<form method='POST'>
    <input type='hidden' name='pet_toy_id' value='<?php echo $toy['pet_toy_id']; ?>'>
    <input type='text' name='new_toy_name' placeholder='New Toy Name'>
    <input type='submit' name='update' value='Update Toy'>
    <input type='hidden' name='delete_toy' value='<?php echo $toy['pet_toy_id']; ?>'>
    <input type='submit' name='delete' value='Delete Toy'>
    <input type='reset' name='reset' value='Reset'>
</form>
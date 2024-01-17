<form method='POST'>
    <input type='hidden' name='pet_species_id' value='<?php echo $specie['pet_species_id']; ?>'>
    <input type='text' name='new_species_name' placeholder='New Species Name'>
    <input type='submit' value='Update Specie'>
    <input type='hidden' name='delete_species' value='<?php echo $specie['pet_species_id']; ?>'>
    <input type='submit' value='Delete Specie'> <input type='reset' name='reset' value='Reset'>
</form>
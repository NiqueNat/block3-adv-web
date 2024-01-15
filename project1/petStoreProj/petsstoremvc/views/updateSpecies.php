<form method='POST'>
    <input type='hidden' name='pet_speciesID' value='<?php echo $specie['pet_speciesID']; ?>'>
    <input type='text' name='new_speciesName' placeholder='New Species Name'>
    <input type='submit' value='Update Specie'>
    <input type='hidden' name='delete_species' value='<?php echo $specie['pet_speciesID']; ?>'>
    <input type='submit' value='Delete Specie'> <input type='reset' name='reset' value='Reset'>
</form>
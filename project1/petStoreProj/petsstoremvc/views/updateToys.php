<form method='POST'>
    <input type='hidden' name='toyID' value='<?php echo $toy['toyID']; ?>'>
    <input type='text' name='new_toyName' placeholder='New Toy Name'>
    <input type='submit' name='update' value='Update Toy'>
    <input type='hidden' name='delete_toy' value='<?php echo $toy['toyID']; ?>'>
    <input type='submit' name='delete' value='Delete Toy'>
    <input type='reset' name='reset' value='Reset'>
</form>
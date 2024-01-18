
   <h3>Add a toy</h3>
    <form method="POST" action="?action=Toy">
        <label for="name">Toy:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="price">Price:</label>
        <input type="text" id="price" name="price" required><br><br>

        <input type="submit" name="submit_toy" value="Submit">
        <input type="reset" name="reset" value="Reset">
    </form>
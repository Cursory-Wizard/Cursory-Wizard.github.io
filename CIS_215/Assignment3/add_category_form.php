<?php
require('database.php');
$query = 'SELECT *
          FROM categories
          ORDER BY categoryID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>
<!DOCTYPE html>
<html>

<!-- the head section -->
<head>
    <title>My Guitar Shop</title>
    <link rel="stylesheet" type="text/css" href="main.css">
</head>

<!-- the body section -->
<body>
    <header><h1>Category Manager</h1></header>

    <main>
        <h1>Add Category</h1>
        <form action="add_category.php" method="post"
              id="add_category_form">

            <label>Category:</label>
            <input type="text" name="category"><br>
			
            <label>&nbsp;</label>
            <input type="submit" value="Add Category"><br>
        </form>
        <p><a href="category_list.php">View Category List</a></p>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> My Guitar Shop, Inc.</p>
    </footer>
</body>
</html>
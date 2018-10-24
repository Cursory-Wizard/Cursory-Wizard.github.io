<?php
// Get the category data
$new_category = filter_input(INPUT_POST, 'category');

// Validate inputs
if ($new_category == null) {
    $error = "Invalid category data. Check all fields and try again.";
    include('error.php');
} else {
    require_once('database.php');

    // Add the category to the database  
    $query = 'INSERT INTO categories
                 (categoryName)
              VALUES
                 (:new_category)';
    $statement = $db->prepare($query);
    $statement->bindValue(':new_category', $new_category);
    $statement->execute();
    $statement->closeCursor();

    // Display the Category List page
    include('category_list.php');
}
?>
<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="add_course_form">
        <input type="hidden" name="action" value="update_course"/>
        <input type="hidden" name="process" value="addNew" />
        <label>New Course Number:</label>
        <input type="text" name="new_number" />
        <br>

        <label>New Course Name:</label>
        <input type="text" name="new_name" />
        <br />

        <label>&nbsp;</label>
        <input type="submit" value="Add Course" />
        <br />
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_courses">View Course List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>

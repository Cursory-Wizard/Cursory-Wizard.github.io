<?php include '../view/header.php'; ?>
<main>
    <h1>Add Product</h1>
    <form action="index.php" method="post" id="student_form">
        <input type="hidden" name="action" value="add_student">

        <label>New Student Name:</label>
        <input type="text" name="student_name" />
        <br>

        <label>&nbsp;</label>
        <input type="submit" value="Add Student" />
        <br />
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_students">View Student List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>

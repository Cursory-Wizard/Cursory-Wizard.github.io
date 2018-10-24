<?php include '../view/header.php'; ?>
<main>
    <?php
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    ?>
    <h1>Change Student Name</h1>
    <form action="index.php" method="post" id="student_form">
        <input type="hidden" name="action" value="update_name" />
        <input type="hidden" name="studentID" value="<?php echo $ID ?>" />
        <table>
            <tr>
                <th>ID</th>
                <th>Student Name</th>
                <th>New Student Name</th>
            </tr>
            <tr>
                <td><?php echo $ID ?></td>
                <td><?php echo $name ?></td>
                <td><input type="text" name="studentName"</td>
            </tr>
        </table>
        <label>&nbsp;</label>
        <input type="submit" value="Change Student" />
        <br />
    </form>
    <p class="last_paragraph">
        <a href="index.php?action=list_students">View Student List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
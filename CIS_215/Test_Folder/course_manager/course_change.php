<?php include '../view/header.php'; ?>
<main>
    <?php
    $ID = $_POST['ID'];
    $name = $_POST['name'];
    ?>
    <h1>Change Course Information</h1>
        <table>
            <tr>
                <th>Course Number</th>
                <th>Course Name</th>
            </tr>
            <tr>
                <td>
                    <?php echo $ID ?>
                </td>
                <td>
                    <?php echo $name ?>
                </td>
            </tr>
            <tr>
                <td>
                    <form action="index.php" method="post" id="student_form">
                        <input type="hidden" name="action" value="update_course" />
                        <input type="hidden" name="reference" value="<?php echo $ID ?>" />
                        <input type="hidden" name="process" value="course_number" />
                        <input type="text" name="new_number" /><br>
                        <label>&nbsp;</label>
                        <input type="submit" value="Change Number" />
                    </form>
                </td>
                <td>
                    <form action="index.php" method="post" id="student_form">
                        <input type="hidden" name="action" value="update_course" />
                        <input type="hidden" name="reference" value="<?php echo $ID ?>" />
                        <input type="hidden" name="process" value="course_name" />
                        <input type="text" name="new_name" /><br>
                        <label>&nbsp;</label>
                        <input type="submit" value="Change Name" />
                    </form>
                </td>
        </table>
    <p class="last_paragraph">
        <a href="index.php?action=list_students">View Student List</a>
    </p>

</main>
<?php include '../view/footer.php'; ?>
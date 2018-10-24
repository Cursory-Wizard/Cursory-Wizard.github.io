<?php include '../view/header.php'; ?>
<main>
    <h1>Course List</h1>
    <section>
        <!-- display students -->
        <table>
            <tr>
                <th>Course Number</th>
                <th>Course Name</th>
                <th>&nbsp;</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($courses as $course) : ?>
            <tr>
                <td>
                    <?php echo $course['course_number']; ?>
                </td>
                <td>
                    <?php echo $course['course_name']; ?>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                            value="change_course" />
                        <input type="hidden" name="courseNumber"
                            value="<?php echo $course['course_number']; ?>" />
                        <input type="hidden" name="courseName"
                            value="<?php echo $course['course_name']; ?>" />
                        <input type="submit" value="Change" />
                    </form>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                            value="delete_course" />
                        <input type="hidden" name="course_number"
                            value="<?php echo $course['course_number']; ?>" />
                        <input type="hidden" name="course_name"
                            value="<?php echo $course['course_name']; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p>
            <a href="?action=show_add_form">Add Course</a>
        </p>
        <p class="last_paragraph">
            <a href="../student_manager/index.php?action=list_students">
                List Students
            </a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
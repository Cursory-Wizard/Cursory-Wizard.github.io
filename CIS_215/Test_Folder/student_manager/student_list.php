<?php include '../view/header.php'; ?>
<main>
    <h1>Student List</h1>
    <aside>
        <!-- display a list of courses -->
        <h2>Enrollment</h2>
        <nav>
            <ul>
                <!-- display links for all courses -->
                <li><a href="?course_id=0">All Students</li>
                <?php foreach($courses as $course) : ?>
                <li>
                    <a href="?course_id=<?php echo $course['course_number']; ?>">
                        <?php echo $course['course_name']; ?>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </nav>
    </aside>

    <section>
        <h2><?php echo $course_name ?></h2>
        <!-- display students -->
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
            
            </tr>
            <?php foreach ($students as $student) : ?>
            <tr>
                <td>
                    <?php echo $student['studentID']; ?>
                </td>
                <td>
                    <?php echo $student['student_name']; ?>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                            value="change_enrollment" />
                        <input type="hidden" name="studentID"
                            value="<?php echo $student['studentID']; ?>" />
                        <input type="hidden" name="studentName"
                            value="<?php echo $student['student_name']; ?>" />
                        <input type="submit" value="Courses" />
                    </form>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                            value="change_student" />
                        <input type="hidden" name="studentID"
                            value="<?php echo $student['studentID']; ?>" />
                        <input type="hidden" name="studentName"
                            value="<?php echo $student['student_name']; ?>" />
                        <input type="submit" value="Change Name" />
                    </form>
                </td>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                            value="delete_student" />
                        <input type="hidden" name="studentID"
                            value="<?php echo $student['studentID']; ?>" />
                        <input type="submit" value="Delete" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p>
            <a href="?action=show_add_form">Add Student</a>
        </p>
        <p class="last_paragraph">
            <a href="../course_manager/index.php?action=list_courses">
                List Courses
            </a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
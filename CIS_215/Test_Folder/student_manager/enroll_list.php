<?php include '../view/header.php'; ?>
<main>

    <section>
        <h2>
            <?php echo $student_name ?>
        </h2>
        <!-- display students -->
        <table>
            <tr>
                <th>Course Name</th>
                <th>Course Number</th>
                <th>&nbsp;</th>
            </tr>
            <?php foreach ($all_courses as $course) : ?>
            <tr>
                <td>
                    <?php echo $course['course_name']; ?>
                </td>
                <td>
                    <?php echo $course['course_number']; ?>
                </td>
                <?php $in_class = false;
                      foreach ($enrolled_courses as $enroll) :                       
                          if ($enroll == $course['course_number']) {
                              $in_class = true;
                          }       
                      endforeach;                      
                      if ($in_class){
                          $val1 = "drop_course";
                          $val2 = "Drop Course";
                      }
                      else {
                          $val1 = "add_course";
                          $val2 = "Add Course";
                      } ?>
                <td>
                    <form action="." method="post">
                        <input type="hidden" name="action"
                            value="<?php echo $val1 ?>" />
                        <input type="hidden" name="courseID"
                            value="<?php echo $course['course_number']; ?>" />
                        <input type="hidden" name="studentID"
                            value="<?php echo $studentID; ?>" />
                        <input type="submit" value="<?php echo $val2 ?>" />
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
        </table>
        <p>
            <a href="?action=list_students">List Students</a>
        </p>
        <p class="last_paragraph">
            <a href="../course_manager/index.php?action=list_courses">
                List Courses
            </a>
        </p>
    </section>
</main>
<?php include '../view/footer.php'; ?>
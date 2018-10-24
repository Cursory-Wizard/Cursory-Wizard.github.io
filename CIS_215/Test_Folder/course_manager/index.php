<?php
require('../model/database.php');
require('../model/student_db.php');
require('../model/course_db.php');
require('../model/enrollment_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_courses';
    }
}

if ($action == 'list_courses') {
    $courses = get_courses();
    include('course_list.php');
} else if ($action == 'change_course') {
    $courseNumber = filter_input(INPUT_POST, 'courseNumber', FILTER_VALIDATE_INT);
    $courseName = filter_input(INPUT_POST, 'courseName');
    $_POST['ID'] = $courseNumber;
    $_POST['name'] = $courseName;
    include('course_change.php');
} else if ($action == 'delete_course') {
    $course_number = filter_input(INPUT_POST, 'course_number',
            FILTER_VALIDATE_INT);
    delete_course($course_number);
    header("Location: .?action=list_courses");
} else if ($action == 'show_add_form') {
    include('course_add.php');
} else if ($action == 'update_course') {
    $process = filter_input(INPUT_POST, 'process');
    if ($process == 'course_name'){
        $reference = filter_input(INPUT_POST, 'reference', FILTER_VALIDATE_INT);
        $update = filter_input(INPUT_POST, 'new_name');
        change_course($process, $reference, $update);
        header("Location: .?action=list_courses");
    }
    else {
        $new_number = filter_input(INPUT_POST, 'new_number', FILTER_VALIDATE_INT);
        $course_list = get_courses();
        foreach ($course_list as $course_test) :
            if ($new_number == $course_test['course_number']) {
                $error = "Course number already exists. Please try again.";
                include('../errors/error.php');
                exit();
            }
        endforeach;
        if (!is_int($new_number) || ($new_number < 0)){
            $error = "Course number must be a positive whole number. Please try again.";
            include('../errors/error.php');
            exit();
        }
        if ($process == 'addNew'){
            $new_name = filter_input(INPUT_POST, 'new_name');
            if ($new_number == NULL || $new_name == NULL) {
                $error = "All fields must be entered. Please try again.";
                include('../errors/error.php');
            } else {
                add_course($new_number, $new_name);
                header("Location: index.php?action=list_courses");
            }
        }
        else {
            $reference = filter_input(INPUT_POST, 'reference', FILTER_VALIDATE_INT);
            change_course($process, $reference, $new_number);
            header("Location: .?action=list_courses");
        }
    }
}
?>
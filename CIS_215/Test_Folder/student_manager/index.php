<?php
require('../model/database.php');
require('../model/student_db.php');
require('../model/course_db.php');
require('../model/enrollment_db.php');

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_students';
    }
}

if ($action == 'list_students') {
    $course_id = filter_input(INPUT_GET, 'course_id', FILTER_VALIDATE_INT);
    if ($course_id == NULL || $course_id == false){
        $course_id == 0;
    }
    if ($course_id == 0){
        $course_name = 'All Students';
        $students = get_students();
    }
    else {
        $course_name = get_course_by_id($course_id);
        $students = get_course_enrollment($course_id);
    }
    $courses = get_courses();
    include('student_list.php');
} else if ($action == 'change_student') {
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    $student_name = filter_input(INPUT_POST, 'studentName');
    if ($student_name == NULL) {
        $error = "Invalid student name. Name cannot be empty. Please try again.";
        include('../errors/error.php');
    } else {
        $_POST['ID'] = $studentID;
        $_POST['name'] = $student_name;
        include('student_change.php');
    }
} else if ($action == 'change_enrollment'){
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    $student_name = filter_input(INPUT_POST, 'studentName');
    $all_courses = get_courses();
    $enrolled_courses = get_student_enrollment($studentID);
    include('enroll_list.php');
} else if ($action == 'add_course'){
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    $courseID = filter_input(INPUT_POST, 'courseID', FILTER_VALIDATE_INT);
    enroll_student($studentID, $courseID);
    header("Location: .?action=list_students");
} else if ($action == 'drop_course'){
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    $courseID = filter_input(INPUT_POST, 'courseID', FILTER_VALIDATE_INT);
    drop_student($studentID, $courseID);
    header("Location: .?action=list_students");
} else if ($action == 'update_name') {
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    $student_name = filter_input(INPUT_POST, 'studentName');
    change_name($studentID, $student_name);
    header("Location: .?action=list_students");
} else if ($action == 'delete_student') {
    $studentID = filter_input(INPUT_POST, 'studentID', FILTER_VALIDATE_INT);
    delete_student($studentID);
    header("Location: .?action=list_students");
} else if ($action == 'show_add_form') {
    include('student_add.php');
} else if ($action == 'add_student') {
    $student_name = filter_input(INPUT_POST, 'student_name');
    if ($student_name == NULL) {
        $error = "Invalid student name. Name cannot be empty. Please try again.";
        include('../errors/error.php');
    } else {
        add_student($student_name);
        header("Location: .?action=list_students");
    }
}
?>
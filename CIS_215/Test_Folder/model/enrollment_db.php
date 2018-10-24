<?php
function get_course_enrollment($id){
    global $db;
    $students = array();
    $query = 'SELECT * FROM enrollments WHERE course_id = :thisID ORDER BY student_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisID', $id);
    $statement->execute();
    $student_list = $statement->fetchAll();
    $statement->closeCursor();
    foreach ($student_list as $student) :
        $student_id = $student['student_id'];
        $adder = get_student_by_id($student_id);
        array_push($students, $adder);
    endforeach;
    $statement->closeCursor();
    return $students;
}

function get_student_enrollment($id){
    global $db;
    $courses = array();
    $query = 'SELECT * FROM enrollments WHERE student_id = :thisID ORDER BY course_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisID', $id);
    $statement->execute();
    $course_list = $statement->fetchAll();
    $statement->closeCursor();
    foreach ($course_list as $course) :
        $course_id = $course['course_id'];
        array_push($courses, $course_id);
    endforeach;
    $statement->closeCursor();
    return $courses;
}

function enroll_student($studentID, $courseID){
    global $db;
    $query = 'INSERT INTO enrollments (course_id, student_id) VALUES (:thisCourse, :thisStudent)';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisCourse', $courseID);
    $statement->bindValue(':thisStudent', $studentID);
    $statement->execute();
    $statement->closeCursor();
}

function drop_student($studentID, $courseID){
    global $db;
    $query = 'DELETE FROM enrollments WHERE course_id = :thisCourse AND student_id = :thisStudent';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisCourse', $courseID);
    $statement->bindValue(':thisStudent', $studentID);
    $statement->execute();
    $statement->closeCursor();
}

function remove_student($studentID){
    global $db;
    $query = 'DELETE FROM enrollments WHERE student_id = :thisStudent';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisStudent', $studentID);
    $statement->execute();
    $statement->closeCursor();
}

function remove_course($courseID){
    global $db;
    $query = 'DELETE FROM enrollments WHERE course_id = :thisCourse';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisCourse', $courseID);
    $statement->execute();
    $statement->closeCursor();
}
?>
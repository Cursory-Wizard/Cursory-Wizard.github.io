<?php
function get_students(){
    global $db;
    $query = 'SELECT * FROM student_table ORDER BY studentID';
    $statement = $db->prepare($query);
    $statement->execute();
    $students = $statement->fetchAll();
    $statement->closeCursor();
    return $students;
}

function get_student_by_id($studentID){
    global $db;
    $query = "SELECT * from student_table where studentID = :thisID";
    $statement = $db->prepare($query);
    $statement->bindValue(':thisID', $studentID);
    $statement->execute();
    $student = $statement->fetch();
    return $student;
}
function delete_student($studentID) {
    global $db;
    $query = 'DELETE FROM student_table WHERE studentID = :thisID';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisID', $studentID);
    $statement->execute();
    $statement->closeCursor();
    remove_student($studentID);
}

function add_student($student_name){
    global $db;
    $query = 'INSERT INTO student_table (student_name) VALUES (:thisName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisName', $student_name);
    $statement->execute();
    $statement->closeCursor();
}

function change_name($student_ID, $student_name){
    global $db;
    $query = 'UPDATE student_table SET student_name = :thisName WHERE studentID = :thisID';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisID', $student_ID);
    $statement->bindValue(':thisName', $student_name);
    $statement->execute();
    $statement->closeCursor();
}
?>
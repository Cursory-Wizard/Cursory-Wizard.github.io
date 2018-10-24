<?php
function get_courses(){
    global $db;
    $query = 'SELECT * FROM course_table
              ORDER BY course_number';
    $statement = $db->prepare($query);
    $statement->execute();
    $course_list = $statement->fetchAll();
    $statement->closeCursor();
    return $course_list;
}

function delete_course($course_number) {
    global $db;
    $query = 'DELETE FROM course_table WHERE course_number = :thisID';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisID', $course_number);
    $statement->execute();
    $statement->closeCursor();
    remove_course($course_number);
}

function add_course($course_number, $course_name){
    global $db;
    $query = 'INSERT INTO course_table (course_number, course_name) VALUES (:thisID, :thisName)';
    $statement = $db->prepare($query);
    $statement->bindValue(':thisID', $course_number);
    $statement->bindValue(':thisName', $course_name);
    $statement->execute();
    $statement->closeCursor();
}

function change_course($column, $courseNumber, $value){
    global $db;
    $query = "UPDATE course_table SET {$column} = :value WHERE course_number = :course_number";
    $statement = $db->prepare($query);
    $statement->bindParam(':value', $value);
    $statement->bindParam(':course_number', $courseNumber);
    $statement->execute();
    $statement->closeCursor();
}

function get_course_by_id($id){
    global $db;
    $query = "SELECT * FROM course_table where course_number = :thisid";
    $statement = $db->prepare($query);
    $statement->bindParam(':thisid', $id);
    $statement->execute();
    $course = $statement->fetch();
    $statement->closeCursor();
    $course_name = $course['course_name'];
    return $course_name;
}
?>
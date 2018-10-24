<?php
$dsn = 'mysql:host=student2014.ecc.iwcc.edu;dbname=mphelan264_course_enrollments';
$username = 'mphelan264';
$password = 'cursory_wizard';

try {
    $db = new PDO($dsn, $username, $password);
}
catch (PDOException $e) {
    $error_message = $e->getMessage();
    include('../errors/database_error.php');
    exit();
}
?>

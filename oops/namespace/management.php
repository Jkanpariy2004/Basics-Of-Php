<?php
    include('student.php');
    include('teacher.php');

    $student = new student\Joining();
    $student->student();
    echo "<br>";
    $teacher = new teacher\Joining();
    $teacher->teacher();
?>
<?php
    $host = 'localhost';
    $name = 'root';
    $pass = '';
    $db = 'login_register';

    $con = mysqli_connect($host,$name,$pass) or die ('Database connection error');
    mysqli_select_db($con,$db);
?>
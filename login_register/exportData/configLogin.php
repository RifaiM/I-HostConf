<?php
    $conn = new mysqli("localhost", "root", "", "login_register");
    if($conn->connect_error) {
        die("Connect Failed".$conn->connect_error);
    }
?>
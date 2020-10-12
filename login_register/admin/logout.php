<?php 
    session_start();
    if(isset($_GET['logout']))
    {
        session_destroy();
        header("location: /Conference/login_register/login.php");
    }
?>
<?php

    $hash = $_POST['order_id'];

    $conn = mysqli_connect("localhost", "root", "", "cart");

    $query = "SELECT * FROM orders WHERE hash = '$hash'";
    $query_run = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($query_run);

    if ($row['hash'] == $hash) {
        echo '';
        header('location: certValid.php');
    } else {
        echo '';
        header('location: certInvalid.php');
    }
?>
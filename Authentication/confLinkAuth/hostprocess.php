<?php

    $host_link = $_POST['links'];

    $conn = mysqli_connect("localhost", "root", "", "link_conf");

    $query = "SELECT * FROM url WHERE host_link = '$host_link'";
    $query_run = mysqli_query($conn, $query);

    $row = mysqli_fetch_array($query_run);
    if ($row['host_link'] == $host_link) {
        echo '';
        header('Location: hostSuccess.html');
    } else {
        echo '';
        header('Location: hostFail.html');
    }

?>


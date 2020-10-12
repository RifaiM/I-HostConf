<?php

  $join_link = $_POST['links'];

  $conn = mysqli_connect("localhost", "root", "", "link_conf");

  $query = "SELECT * FROM url WHERE join_link = '$join_link'";
  $query_run = mysqli_query($conn, $query);

  $row = mysqli_fetch_array($query_run);
  if ($row['join_link'] == $join_link) {
    echo '';
    header('Location: joinSuccess.html');
  } else {
    echo '';
    header('Location: joinFail.html');
  }

?>
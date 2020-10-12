
<?php

//verify order id

$hash = $_POST['order_id'];

$conn =  mysqli_connect("localhost", "root", "", "cart");

$query = "SELECT * FROM orders WHERE hash = '$hash'";
$query_run = mysqli_query($conn, $query);

$row = mysqli_fetch_array($query_run);

if ($row['hash'] == $hash) {
    echo $status = 'Valid';
    header('location: confAttendValid.html');
} else {
    echo $status = 'Invalid';
    header('location: confAttendInvalid.html');
}

//end verify order id

//ip address

if(!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip=$_SERVER['HTTP_CLIENT_IP'];
}
elseif(!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}
else {
    $ip=$_SERVER['REMOTE_ADDR'];
}

// end ip address

//timeset

$tz = 'Asia/Jakarta';
$dt = new DateTime("now", new DateTimeZone($tz));
$timestamp = $dt->format('Y-m-d G:i:s');

//end timeset

//output to .txt file

$data = $timestamp . " " . $hash . " " . $status . " " . $ip . "\r\n";
file_put_contents('ConferenceParticipant.txt', $data, FILE_APPEND);

//end of output

?>
<?php

    use Classes\GeneratePDF;

    if($_SERVER['REQUEST_METHOD'] != 'POST') {
        exit;
    }

    define('ACCESSCHECK', TRUE);

    require_once 'vendor/autoload.php';

    $name = $_POST['name'];
    $date = $_POST['date'];
    $name_ceo = $_POST['name_ceo'];

    $data = [

        'name' => $name,
        'date' => $date,
        'name_ceo' => $name_ceo,
    ];

    $pdf = new GeneratePDF;
    $response = $pdf->generate($data);

    header('Location: ./thanks.php?name=' . $name . '&link=' .$response);

?>


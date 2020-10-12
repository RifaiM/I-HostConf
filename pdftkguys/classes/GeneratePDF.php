<?php

namespace Classes;

if(!defined('ACCESSCHECK'))
{
    die('Direct Access is not permitted');
}

use mikehaertl\pdftk\Pdf;

class GeneratePDF {
    public function generate($data)
    {
        $filename = 'Cert_' . $_POST['name'] .'.pdf';

        $pdf = new Pdf('./certificate.pdf');
        $pdf->fillForm($data);
        $pdf->flatten()
        ->saveAs('./completed/' . $filename);

        return $filename;
    }
}
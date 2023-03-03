<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'function.php';

$result = mysqli_query($conn, "SELECT * FROM datajembatan");


$mpdf = new \Mpdf\Mpdf();

$html= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Jembatan</title>
</head>
<body>
    <h1>Data Jembatan</h1>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead style="text-align: center;">           
            <tr>
                <th>No</th>
                <th>Nomor Ruas & Nama Ruas</th>
                <th>Nama Jembatan</th>
                <th>STA</th>
                <th>Tahun Pembuatan Jembatan</th>
            </tr>
        </thead>
        <tbody>';

        $i = 1;
        foreach($result as $row){
            $html .='<tr>
            <td>'. $i++.'</td>
            <td>'. $row["noruas_namaruas"].'</td>
            <td>'. $row["namajembatan"].'</td>
            <td>'. $row["sta"].'</td>
            <td>'. $row["tahunpembuatan"].'</td>
            </tr>';
        }

$html .= '</tbody>
            </table>
            </body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
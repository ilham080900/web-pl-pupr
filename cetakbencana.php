<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'function.php';

$result = mysqli_query($conn, "SELECT * FROM databencana");


$mpdf = new \Mpdf\Mpdf();

$html= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Bencana</title>
</head>
<body>
    <h1>Data Bencana</h1>

    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead style="text-align: center;">           
            <tr>
                <th>No</th>
                <th>Nama Ruas</th>
                <th>Stationing</th>
                <th>Kondisi</th>
                <th>Panjang Kerusakan</th>
                <th>Tinggi Kerusakan</th>
                <th>Penanganan</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>';

        $i = 1;
        foreach($result as $row){
            $html .='<tr>
            <td>'. $i++.'</td>
            <td>'. $row["namaruas"].'</td>
            <td>'. $row["stasioning"].'</td>
            <td>'. $row["kondisi"].'</td>
            <td>'. $row["panjangkerusakan"].'</td>
            <td>'. $row["tinggikerusakan"].'</td>
            <td>'. $row["penanganan"].'</td>
            <td>'. $row["keterangan"].'</td>
            </tr>';
        }

$html .= '</tbody>
            </table>
            </body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
<?php

require_once __DIR__ . '/vendor/autoload.php';
require 'function.php';

$result = mysqli_query($conn, "SELECT * FROM kondisijalan");


$mpdf = new \Mpdf\Mpdf();

$html= '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Kondisi Jalan</title>
</head>
<body>
    <h1>Data Kondisi Jalan</h1>

    <table border="1" cellspacing="0" width="100%">
    <thead>
    <tr>
        <th rowspan="3">No Ruas</th>
        <th rowspan="3">Nama Ruas</th>
        <th rowspan="3">Stasioning Awal</th>
        <th rowspan="3">Stasioning Akhir</th>
        <th rowspan="3">Lebar Jalan</th>
        <th rowspan="3">Panjang Jalan</th>

        <th colspan="4" style="text-align: center;">Kondisi Drainese</th>
        <th colspan="4" style="text-align: center;">Kondisi Bahu</th>
        <th colspan="4" style="text-align: center;">Kondisi Perkerasan Jalan</th>
        <th rowspan="3" style="padding-top: 8rem;">Keterangan</th>
    </tr>
    <tr>
        <th colspan="2" style="text-align: center;">Kiri</th>
        <th colspan="2" style="text-align: center;">Kanan</th>
        <th colspan="2" style="text-align: center;">Kiri</th>
        <th colspan="2" style="text-align: center;">Kanan</th>
        <th rowspan="2" style="padding-top: 5rem;">Idx</th>
        <th colspan="3" style="text-align: center;">Dimensi Kerusakan</th>
    </tr>
    <tr>
        <th style="padding-top: 2rem;">Index</th>
        <th style="padding-top: 2rem;">Panjang (M)</th>
        <th style="padding-top: 2rem;">Index</th>
        <th style="padding-top: 2rem;">Panjang (M)</th>
        <th style="padding-top: 2rem;">Index</th>
        <th style="padding-top: 2rem;">Panjang (M)</th>
        <th style="padding-top: 2rem;">Index</th>
        <th style="padding-top: 2rem;">Panjang (M)</th>
        <th style="padding-top: 2rem;">Panjang (M)</th>
        <th style="padding-top: 2rem;">Lebar (M)</th>
        <th style="padding-top: 2rem;">Dalam (M)</th>
    </tr>
</thead>
        <tbody>';

        foreach($result as $row){
            $html .='<tr>
            <td>'. $row["noruas"]. '</td>
            <td>'. $row["namaruas"].'</td>
            <td>'. $row["stasioningawal"].'</td>
            <td>'. $row["stasioningakhir"].'</td>
            <td>'. $row["lebarjalan"].'</td>
            <td>'. $row["panjangjalan"]. '</td>
            <td>'. $row["idx_1"].'</td>
            <td>'. $row["text_input1"].'</td>
            <td>'. $row["idx_2"].'</td>
            <td>'. $row["text_input2"].'</td>
            <td>'. $row["idx_3"].'</td>
            <td>'. $row["text_input3"].'</td>
            <td>'. $row["idx_4"].'</td>
            <td>'. $row["text_input4"].'</td>
            <td>'. $row["idx_5"].'</td>
            <td>'. $row["text_input5"].'</td>
            <td>'. $row["text_input6"].'</td>
            <td>'. $row["text_input7"].'</td>
            <td>'. $row["text_input8"].'</td>
            </tr>';
        }

$html .= '</tbody>
            </table>
            </body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output();
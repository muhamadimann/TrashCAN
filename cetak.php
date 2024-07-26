<?php
require_once __DIR__ . '/vendor/autoload.php';
session_start();
require 'function.php';

$id_pemesan = $_GET["id_pemesan"];

$pesanan = query("SELECT * FROM pesanan WHERE id_pemesan = $id_pemesan")[0];

$mpdf = new \Mpdf\Mpdf();

$html = '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Daftar Mahasiswa</title>
    <link rel="stylesheet" href="asset/css/print.css">
</head>
<body>

<div class="card-body">';
$html .= ' <form action="" method="post" enctype="multipart/form-data">
                <label class="form-label">Trashcan </label><br>
                <label class="form-label">------------------------------- </label><br>
                <br>
                <div class="mb-3">
                    <label class="form-label">Id Paket : </label>
                    <label class="form-control" name="id_paket"> ' . $pesanan["id_paket"] . '</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Pemesan : </label>
                    <label class="form-control" name="nama_pemesan"> ' . $pesanan["nama_pemesan"] . '</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nama Paket : </label>
                    <label class="form-control" name="nama_paket"> ' . $pesanan["nama_paket"] . '</label>    
                </div>
                <div class="mb-3">
                    <label class="form-label">Harga Paket : </label>
                    <label class="form-control" name="harga_paket"> ' . $pesanan["harga_paket"] . '</label>    
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat Pemesan : </label>
                    <label class="form-control" name="alamat_pemesan">' . $pesanan["alamat_pemesan"] . '</label>
                </div>
                <div class="mb-3">
                    <label class="form-label">No Tlp Pemesan : </label>
                    <label class="form-control" name="no_hp_pemesan"> ' . $pesanan["no_hp_pemesan"] . '</label>    
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <label class="form-control" name="status"> ' . $pesanan["status"] . '</label>    
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Kode Pembayaran</label>
                    <label class="form-control">akw0oek92091098u03jisjkndo</label>   
                </div>
                <br><br>
                <p> ------------------------------------ </p>
                <p> TERIMAKASIH. SELAMAT BELANJA KEMBALI </p>
                <p> ------------------------------------ </p>
                ';


$html .= '</form>
            </div>
            
    
</body>
</html>';

$mpdf->WriteHTML($html);
$mpdf->Output('bayar.pdf', 'I');

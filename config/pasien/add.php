<?php
include('../config.php');
$nama               = $_POST['nama'];
$nik                = $_POST['nik'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$gol_darah          = $_POST['gol_darah'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat             = $_POST['alamat'];
$created_at         = date('Y-m-d H:i:s');
$updated_at         = date('Y-m-d H:i:s');

// echo $tanggal_lahir;

$query = mysqli_query($con, "INSERT INTO pasiens(nama, nik, gol_darah, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, created_at, updated_at) VALUES ('$nama', '$nik', '$gol_darah', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$created_at', '$updated_at')");


if ($query) {
    $_SESSION['addsuccess'] = 'Berhasil menambahkan data pasien';
    header("location: " . base_url("pasien/list"));
}

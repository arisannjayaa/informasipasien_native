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

$querycek = mysqli_query($con, "SELECT nik FROM pasiens WHERE nik='$nik'");
$queryktps = mysqli_query($con, "SELECT nik FROM ktps WHERE nik='$nik'");
$ktps = mysqli_fetch_assoc($queryktps);
$pasien = mysqli_fetch_assoc($querycek);

// die();
if($pasien['nik'] == $nik) {
    $_SESSION['gagal'] = 'Gagal menambahkan data pasien sudah ada';
    header('location: '.base_url('pasien/add'));
} elseif($ktps['nik'] != $nik){
    $_SESSION['gagal'] = 'Gagal menambahkan data pasien';
    header('location: '.base_url('pasien/add'));
}else {
    $query = mysqli_query($con, "INSERT INTO pasiens(nama, nik, gol_darah, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, created_at, updated_at) VALUES ('$nama', '$nik', '$gol_darah', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$created_at', '$updated_at')");

}
// print_r($pasien); die();

if ($query) {
    $_SESSION['addsuccess'] = 'Berhasil menambahkan data pasien';
    header("location: " . base_url("pasien/list"));
}

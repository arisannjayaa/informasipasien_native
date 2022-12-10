<?php
require_once('../config.php');

$x = 0;
for ($x = 0; $x < 10; $x++) {

    $ee = rand();
    $data = mysqli_query($con, "select * from pasiens where kartu_rs='$ee'");
    $cek = mysqli_num_rows($data);
    if ($cek > 0) {
        $x = 1;
    } else {
        $x = 11;
        $title_pdf1 = $ee;
    }
}

$x = 0;
for ($x = 0; $x < 10; $x++) {

    $ee = rand();
    $data = mysqli_query($con, "select * from pasiens where info_pasien='$ee'");
    $cek = mysqli_num_rows($data);
    if ($cek > 0) {
        $x = 1;
    } else {
        $x = 11;
        $title_pdf2 = $ee;
    }
}

$nama               = $_POST['nama'];
$nik                = $_POST['nik'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$gol_darah          = $_POST['gol_darah'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat             = $_POST['alamat'];
$provinsi           = $_POST['provinsi'];
$kabupaten          = $_POST['kabupaten'];
$no_telp            = $_POST['no_telp'];
$email              = $_POST['email'];
$created_at         = date('Y-m-d H:i:s');
$updated_at         = date('Y-m-d H:i:s');
$kartu_rs           = $title_pdf1;
$info_pasien        = $title_pdf2;

$querycek = mysqli_query($con, "SELECT nik FROM pasiens WHERE nik='$nik'");
$queryktps = mysqli_query($con, "SELECT nik FROM ktps WHERE nik='$nik'");
$ktps = mysqli_fetch_assoc($queryktps);
$pasien = mysqli_fetch_assoc($querycek);

// die();
if ($pasien['nik'] == $nik) {
    $_SESSION['gagal'] = 'Gagal menambahkan data pasien sudah ada';
    header('location: ' . base_url('pasien/add'));
} else {
    $query = mysqli_query($con, "INSERT INTO pasiens(nama, nik, gol_darah, jenis_kelamin, tempat_lahir, tanggal_lahir, alamat, created_at, updated_at, kartu_rs, info_pasien, id_provinsi, id_kabupaten, no_telp, email) VALUES ('$nama', '$nik', '$gol_darah', '$jenis_kelamin', '$tempat_lahir', '$tanggal_lahir', '$alamat', '$created_at', '$updated_at', '$kartu_rs', '$info_pasien', '$provinsi', '$kabupaten', '$no_telp', '$email')");
}
// print_r($pasien); die();

require_once('create_kartu_rs_dan_info_pasien.php');

if ($query) {
    $_SESSION['addsuccess'] = 'Berhasil menambahkan data pasien';
    header("location: " . base_url("pasien/list"));
}

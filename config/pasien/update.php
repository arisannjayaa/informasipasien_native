<?php
include('../config.php');
$id                 = $_POST['id'];
$nama               = $_POST['nama'];
$nik                = $_POST['nik'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$gol_darah          = $_POST['gol_darah'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat             = $_POST['alamat'];
$updated_at         = date('Y-m-d H:i:s');
$kartu_rs           = $_POST['kartu_rs'];
$info_pasien        = $_POST['info_pasien'];

$query = mysqli_query($con, "UPDATE pasiens SET nama='$nama', nik='$nik', jenis_kelamin='$jenis_kelamin', gol_darah='$gol_darah', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', updated_at='$updated_at' WHERE id_pasien='$id'");


include('create_kartu_rs_dan_info_pasien.php');

if ($query) {
    $_SESSION['updatesuccess'] = 'Berhasil mengupdate data pasien';
    header("location: " . base_url("pasien/list"));
}

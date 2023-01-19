<?php
require_once('../config.php');
$id                 = $_POST['id'];
$nik                = $_POST['nik'];
$nama               = $_POST['nama'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$gol_darah          = $_POST['gol_darah'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat             = $_POST['alamat'];
$no_telp            = $_POST['no_telp'];
$email              = $_POST['email'];
$provinsi           = $_POST['provinsi'];
$kabupaten          = $_POST['kabupaten'];
$updated_at         = date('Y-m-d H:i:s');
$kartu_rs           = $_POST['kartu_rs'];
$info_pasien        = $_POST['info_pasien'];

// echo json_encode($_POST);
// die();

//require_once('create_kartu_rs_dan_info_pasien.php');

$query = mysqli_query($con, "UPDATE pasiens SET nama='$nama', jenis_kelamin='$jenis_kelamin', gol_darah='$gol_darah', tempat_lahir='$tempat_lahir', tanggal_lahir='$tanggal_lahir', alamat='$alamat', no_telp='$no_telp',email='$email',  id_provinsi='$provinsi', id_kabupaten='$kabupaten', updated_at='$updated_at' WHERE id_pasien='$id'");


require_once('create_kartu_rs_dan_info_pasien.php');

if ($query) {
    $_SESSION['updatesuccess'] = 'Berhasil mengupdate data pasien';
    header("location: " . base_url("pasien/list"));
}

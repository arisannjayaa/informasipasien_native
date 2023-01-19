<?php
require_once('../config.php');

$id = $_GET['id'];

$query = mysqli_query($con, "SELECT * FROM pasiens where info_pasien = $id");
$data = mysqli_fetch_assoc($query);

$nik                = $data['nik'];
$nama               = $data['nama'];
$jenis_kelamin      = $data['jenis_kelamin'];
$gol_darah          = $data['gol_darah'];
$tempat_lahir       = $data['tempat_lahir'];
$tanggal_lahir      = $data['tanggal_lahir'];
$alamat             = $data['alamat'];
$no_telp            = $data['no_telp'];
$email              = $data['email'];
$kartu_rs           = $data['kartu_rs'];
$info_pasien        = $data['info_pasien'];

require_once('create_kartu_rs_dan_info_pasien.php');

header("location: " . base_url('files/') . $info_pasien . '.pdf');
?>
<?php
include('../config.php');
$nama               = $_POST['nama'];
$nik                = $_POST['nik'];
$jenis_kelamin      = $_POST['jenis_kelamin'];
$gol_darah          = $_POST['gol_darah'];
$tempat_lahir       = $_POST['tempat_lahir'];
$tanggal_lahir      = $_POST['tanggal_lahir'];
$alamat             = $_POST['alamat'];

mysqli_query($con, "INSERT INTO pasiens VALUES('$nik', '$nama', '$jenis_kelamin', '$gol_darah', '$tempat_lahir', '$tanggal_lahir', $alamat, '$created_at', '$updated_at')");

header("location: " . base_url("admin/mahasiswa/data.php?add_success"));

<?php
include('../config.php');
$id = $_GET['id'];
$query = mysqli_query($con, "DELETE FROM pasiens WHERE id_pasien = '$id'");
$_SESSION['deletesuccess'] = 'Berhasil menghapus data pasien';
header('location: ' . base_url('pasien/list'));

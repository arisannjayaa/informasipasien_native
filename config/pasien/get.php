<?php
require_once('../config.php');
if (isset($_GET['nik'])) {
    $nik = $_GET['nik'];
    $query = mysqli_query($con, "SELECT * FROM db_projek.tb_ktp WHERE nik = '$nik'");
    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
} elseif (isset($_GET['id_pasien'])) {
    $idPasien = $_GET['id_pasien'];
    $query = mysqli_query($con, "SELECT * FROM pasiens WHERE id_pasien = '$idPasien'");
    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
}

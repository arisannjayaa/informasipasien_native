<?php
require_once('../config.php');
if (isset($_GET['id_kop'])) {
    $id = $_GET['id_kop'];
    $query = mysqli_query($con, "SELECT * FROM kop_surat INNER JOIN provinsi ON kop_surat.id_provinsi = provinsi.id_provinsi INNER JOIN kabupaten ON kop_surat.id_kabupaten = kabupaten.id_kabupaten WHERE id_pengaturan = '$id'");
    $data = mysqli_fetch_assoc($query);
    echo json_encode($data);
}

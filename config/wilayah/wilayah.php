<?php
require_once('../config.php');
$prov = $_POST['id_provinsi'];
$kab  = $_POST['id_kabupaten'];
$query = mysqli_query($con, "SELECT * FROM kabupaten WHERE id_provinsi = '$prov' ORDER BY nama_kabupaten ASC");
echo '<option value="" selected>Pilih Kabupaten/Kota</option>';
while ($data = mysqli_fetch_assoc($query)) {
    if ($kab) {
        if ($kab == $data['id_kabupaten']) {
            echo '<option value="' . $data['id_kabupaten'] . '" selected>' . $data['nama_kabupaten'] . '</option>';
        } else {
            echo '<option value="' . $data['id_kabupaten'] . '">' . $data['nama_kabupaten'] . '</option>';
        }
    } else {

        echo '<option value="' . $data['id_kabupaten'] . '">' . $data['nama_kabupaten'] . '</option>';
    }
}

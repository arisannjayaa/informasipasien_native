<?php
$nama_instansi = $_POST['nama_instansi'];
$provinsi  = $_POST['provinsi'];
$kabupaten = $_POST['kabupaten'];
$alamat = $_POST['alamat'];
$email = $_POST['email'];
$ekstensi_acc = ['jpg', 'jpeg', 'png'];
// $fileLama   = $_POST['fileLama'];
$data[] = $_POST;
$data[] = $_FILES;
echo json_encode($_FILES['gambar']);
die();

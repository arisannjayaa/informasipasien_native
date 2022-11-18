<?php
include('../config.php');
$id = $_GET['id'];
$query = mysqli_query($con, "DELETE FROM pasiens WHERE id_pasien = '$id'");
header('location: ' . base_url('pasien'));

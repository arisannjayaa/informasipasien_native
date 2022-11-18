<?php
include('../config.php');
$nik = $_GET['nik'];
$query = mysqli_query($con, "SELECT * FROM ktps WHERE nik = '$nik'");
$data = mysqli_fetch_assoc($query);
echo json_encode($data);

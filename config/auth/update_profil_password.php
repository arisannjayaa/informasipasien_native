<?php
require_once('../config.php');
$id = $_SESSION['id_user'];
$user = $_POST['user'];
$pass_lama = SHA1($_POST['pass_lama']);
$pass_baru = SHA1($_POST['pass_baru']);

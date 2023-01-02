<?php
require_once('../config.php');
$user = mysqli_real_escape_string($con, $_POST['username']);
$pass = SHA1($_POST['password']);
$query = mysqli_query($con, "SELECT * FROM login WHERE username='$user' AND password='$pass'");
$data = mysqli_fetch_assoc($query);
if ($data['username'] and SHA1($data['password'])) {
    $_SESSION['id_user']  = $data['id_login'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['role']     = $data['role'];
    $_SESSION['login']    = 'true';
    header('location: ' . base_url('dashboard'));
} else {
    $_SESSION['akunsalah'] = 'Username atau password salah';
    header('location: ' . base_url('login'));
}

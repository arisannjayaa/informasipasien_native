<?php
require_once('../config.php');
$id = $_SESSION['id_user'];

$queryGetPass = mysqli_query($con, "SELECT password FROM login WHERE id_login='$id'");
$data = mysqli_fetch_assoc($queryGetPass);

if (isset($_POST['update_username'])) {
    $konfPass = $_POST['konfirmasi_password'];
    if (SHA1($konfPass) == $data['password']) {
        $user = strtolower($_POST['user']);
        $query = mysqli_query($con, "UPDATE login SET username='$user' WHERE id_login='$id'");
        $_SESSION['update_success'] = "Berhasil mengupdate username";
        $_SESSION['username'] = $user;
        header('location: ' . base_url('profil'));
    } else {
        $_SESSION['update_failed'] = "Gagal mengupdate username!! Password anda salah !!";
        header('location: ' . base_url('profil'));
    }
} elseif (isset($_POST['update_password'])) {
    $passLama = $_POST['pass_lama'];
    if (SHA1($passLama) == $data['password']) {
        $passBaru = SHA1($_POST['pass_baru']);
        $query = mysqli_query($con, "UPDATE login SET password='$passBaru' WHERE id_login='$id'");
        unset($_SESSION['login']);
        $_SESSION['update_success'] = "Password anda berhasil diganti silahkan melakukan login kembali";
        header('location: ' . base_url('login'));
    } else {
        $_SESSION['update_failed'] = "Gagal mengupdate password!! Password lama anda salah !!";
        header('location: ' . base_url('profil'));
    }
}

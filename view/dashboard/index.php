<?php
$pageheading = 'Dashboard';
include('../../config/config.php');
include('../../view/template/header.php');
$queryHari = mysqli_query($con, "SELECT DAY(created_at) FROM pasiens WHERE DAY(created_at) = now();");
$hari = mysqli_num_rows($queryHari);
$queryPasien = mysqli_query($con, "SELECT id_pasien FROM pasiens;");
$pasien = mysqli_num_rows($queryPasien);
?>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-6">
                        <h4>Selamat Datang Admin</h4>
                        <p>Data Kesehatan Informasi Pasien adalah sistem yang berguna untuk mengelola registrasi dari
                            pasien.</p>
                    </div>
                    <div class="col">
                        <img src="<?= base_url('public/assets/images/undraw_welcoming.svg') ?>" class="img-fluid" alt="" width="250">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-6 col-lg col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldPlus"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">
                            Hari ini
                        </h6>
                        <h6 class="font-extrabold mb-0">
                            +<?= $hari ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6 col-lg col-md-6">
        <div class="card">
            <div class="card-body px-4 py-4-5">
                <div class="row">
                    <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                        <div class="stats-icon blue mb-2">
                            <i class="iconly-boldProfile"></i>
                        </div>
                    </div>
                    <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                        <h6 class="text-muted font-semibold">
                            Jumlah Pasien
                        </h6>
                        <h6 class="font-extrabold mb-0">
                            <?= $pasien ?>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include('../../view/template/footer.php');
?>
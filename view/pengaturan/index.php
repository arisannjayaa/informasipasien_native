<?php
require_once('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    // var_dump($_SESSION);
    // die();
    $title = 'Pengaturan';
    $pageheading = 'Pengaturan';
    require_once('../../view/template/header.php');
?>
    <?php
    if (isset($_SESSION['update_success'])) { ?>
        <div class="alert alert-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
            <?= $_SESSION['update_success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['update_success']);
    } elseif (isset($_SESSION['update_failed'])) { ?>
        <div class="alert alert-danger alert-dismissible show fade"><i class="bi bi-check-circle"></i>
            <?= $_SESSION['update_failed'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['update_failed']);
    }
    ?>

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="d-flex gap-5 align-items-center">
                                <div class="rounded-pill shadow-sm p-3">
                                    <img width="200" src="<?= base_url('public/assets/images/logo/logo1.png') ?>" alt="">
                                </div>
                                <h1 class="mt-3">Rumah Sakit Bapakmu</h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" readonly value="Jalan Bypass Ngurah Rai">
                        </div>
                        <div class="col-md-4">
                            <label>Provinsi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" readonly value="Bali">
                        </div>
                        <div class="col-md-4">
                            <label>Kabupaten</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" readonly value="Badung">
                        </div>
                        <div class="col-md-4">
                            <label>Kecamatan</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" readonly value="Mengwi">
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <input class="form-control" readonly value="rsudmangusada@gmail.com">
                        </div>
                        <div class="col-sm-12 d-flex justify-content-start">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
} ?>
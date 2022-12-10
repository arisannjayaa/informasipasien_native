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
                    <div class="row">
                        <div class="col-12 col-lg-7 col-md-3">
                            <img width="200" src="<?= base_url('public/assets/images/logo/logo.jpg') ?>" alt="">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="basicInput">Basic Input</label>
                                <input readonly type="text" class="form-control" id="basicInput" placeholder="Enter email">
                            </div>
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
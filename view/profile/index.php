<?php
require_once('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    // var_dump($_SESSION);
    // die();
    $title = 'Profil';
    $pageheading = 'Profil';
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
                            <table class="table table-borderless">
                                <tr>
                                    <td>Username</td>
                                </tr>
                                <tr>
                                    <td><input readonly type="text" class="form-control" id="username" value="<?= $_SESSION['username'] ?>"></td>
                                    <td>
                                        <button class="ms-2 btn text-primary" data-bs-toggle="modal" data-bs-target="#gantiusername">Ubah</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                </tr>
                                <tr>
                                    <td><input readonly type="text" class="form-control" id="username" value="<?= $_SESSION['role'] ?>"></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#gantipassword">Ganti Password</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade text-left modal-borderless" id="gantipassword" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ganti Password</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('config/profile/update') ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-3">
                                    <label for="lama" class="form-label">Password Lama</label>
                                    <input name="pass_lama" type="password" class="form-control" id="lama">
                                </div>
                                <div class="mb-3">
                                    <label for="baru" class="form-label">Password Baru</label>
                                    <input name="pass_baru" type="password" class="form-control" id="role">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal" name="update_password">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade text-left modal-borderless" id="gantiusername" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Username</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('config/profile/update') ?>" method="post">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">

                                <div class="mb-3">
                                    <label for="username" class="form-label">Username</label>
                                    <input name="user" type="text" class="form-control" id="username" value="<?= $_SESSION['username'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="konfirmasi_password" class="form-label">Konfirmasi Password</label>
                                    <input name="konfirmasi_password" type="password" class="form-control" id="konfirmasi_password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer d-grid">
                        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal" name="update_username">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<?php require_once('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
} ?>
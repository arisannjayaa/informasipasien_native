<?php
include('../../config/config.php');
if (!isset($_SESSION['login'])) {

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
        <link rel="stylesheet" href="<?= base_url('public/assets/css/main/app.css') ?>">
        <link rel="stylesheet" href="<?= base_url('public/assets/css/pages/auth.css') ?>">
        <link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.svg') ?>" type="image/x-icon">
        <link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.png') ?>" type="image/png">
    </head>

    <body>
        <div id="auth">

            <div class="row h-100">
                <div class="col-lg-5 col-12">
                    <div id="auth-left">
                        <div class="auth-logo">
                            <a class="h1" href="<?= base_url() ?>">Informasi Pasien</a>
                        </div>
                        <?php
                        if (isset($_SESSION['akunsalah'])) { ?>
                            <div class="alert alert-danger"><i class="bi bi-exclamation-circle"></i> <?= $_SESSION['akunsalah'] ?></div>
                        <?php
                            unset($_SESSION['akunsalah']);
                        } elseif (isset($_SESSION['update_success'])) { ?>
                            <div class="alert alert-success"><i class="bi bi-check-circle"></i> <?= $_SESSION['update_success'] ?></div>
                        <?php
                            unset($_SESSION['update_success']);
                        }
                        ?>
                        <h1 class="auth-title">Log in.</h1>
                        <form action="<?= base_url('config/auth/login') ?>" method="post">
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="text" class="form-control form-control-xl" placeholder="Username" name="username">
                                <div class="form-control-icon">
                                    <i class="bi bi-person"></i>
                                </div>
                            </div>
                            <div class="form-group position-relative has-icon-left mb-4">
                                <input type="password" class="form-control form-control-xl" placeholder="Password" name="password">
                                <div class="form-control-icon">
                                    <i class="bi bi-shield-lock"></i>
                                </div>
                            </div>
                            <button class="btn btn-primary btn-block btn-lg shadow-lg">Log in</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-7 d-none d-lg-block">
                    <div id="auth-right">

                    </div>
                </div>
            </div>

        </div>
    </body>

    </html>


    <script src="<?= base_url('public/assets/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('public/assets/extensions/jquery/jquery.min.js') ?>"></script>
<?php
} else {
    header('location: ' . base_url('dashboard'));
}
?>
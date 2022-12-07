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
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/css/bootstrap.min.css" />
    </head>

    <body>
        <div class="container">
            <div class="row justify-content-center align-items-center" style="height: 100vh;">
                <div class="col-lg-4 col-12">
                    <?php
                    if (isset($_SESSION['akunsalah'])) { ?>
                        <div class="alert alert-danger alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                            <?= $_SESSION['akunsalah'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['akunsalah']);
                    } elseif (isset($_SESSION['update_success'])) { ?>
                        <div class="alert alert-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
                            <?= $_SESSION['update_success'] ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php
                        unset($_SESSION['update_success']);
                    }
                    ?>
                    <div class="card border border-2 border-primary">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <h4>Login</h4>
                                    <p>Masukkan username dan password</p>
                                </div>
                            </div>
                            <form action="<?= base_url('config/auth/login') ?>" method="post">
                                <div class="row">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input type="text" class="form-control" id="username" placeholder="Username" name="username">
                                    </div>
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                    </div>
                                    <div class="d-grid">
                                        <button class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                            </form>
                        </div>
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
<?php
include('../../config/config.php');
if (!isset($_SESSION['login'])) { ?>
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
                <div class="col-lg-3">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <?php
                                    if (isset($_SESSION['akunsalah'])) { ?>
                                        <small class="text-danger"><?= $_SESSION['akunsalah'] ?></small>
                                    <?php
                                    }
                                    ?>
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
<?php
} else {
    header('location: ' . base_url('dashboard'));
}
unset($_SESSION['akunsalah']);
?>
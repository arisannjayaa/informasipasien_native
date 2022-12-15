<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Pasien | <?= $title ?></title>

    <link rel="stylesheet" href="<?= base_url('public/assets/extensions/bootstrap-5.2.3/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/extensions/sweetalert2/sweetalert2.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/main/app.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/main/app-dark.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/extensions/filepond/filepond.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/extensions/filepond-plugin-image-preview/filepond-plugin-image-preview.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/pages/filepond.css') ?>">
    <link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.svg') ?>" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url('public/assets/images/logo/favicon.png') ?>" type="image/png">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/pages/fontawesome.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/pages/datatables.css') ?>">
    <link rel="stylesheet" href="<?= base_url('public/assets/css/shared/iconly.css') ?>">
</head>

<body>
    <div id="app">
        <div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header position-relative">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a class="fs-4" href="index.html" style="line-height: 0;">Informasi Pasien</a>
                        </div>
                        <div class="sidebar-toggler  x">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">

                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>

                        <li class="sidebar-item <?= ($_SERVER["REQUEST_URI"] == '/dashboard' || request_uri($_SERVER["REQUEST_URI"]) == 'dashboard') ? 'active' : '' ?>">
                            <a href="<?= base_url('dashboard') ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($_SERVER["REQUEST_URI"] == '/pasien/list' || $_SERVER["REQUEST_URI"] == '/pasien/add' || $_SERVER["REQUEST_URI"] == '/pasien/edit' || request_uri($_SERVER["REQUEST_URI"]) == 'pasien') ? 'active' : '' ?>">
                            <a href="<?= base_url('pasien/list') ?>" class='sidebar-link'>
                                <i class="bi bi-people-fill"></i>
                                <span>Pasien</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($_SERVER["REQUEST_URI"] == '/laporan' || request_uri($_SERVER["REQUEST_URI"]) == 'laporan') ? 'active' : '' ?>">
                            <a href="<?= base_url('laporan') ?>" class='sidebar-link'>
                                <i class="bi bi-file-earmark-fill"></i>
                                <span>Laporan</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Akun</li>

                        <li class="sidebar-item <?= ($_SERVER["REQUEST_URI"] == '/profil' || request_uri($_SERVER["REQUEST_URI"]) == 'profil') ? 'active' : '' ?>">
                            <a href="<?= base_url('profil') ?>" class='sidebar-link'>
                                <i class="bi bi-person-fill"></i>
                                <span>Profil</span>
                            </a>
                        </li>
                        <li class="sidebar-item <?= ($_SERVER["REQUEST_URI"] == '/pengaturan' || request_uri($_SERVER["REQUEST_URI"]) == 'pengaturan') ? 'active' : '' ?>">
                            <a href="<?= base_url('pengaturan') ?>" class='sidebar-link'>
                                <i class="bi bi-gear-fill"></i>
                                <span>Pengaturan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a href="<?= base_url('logout?logout') ?>" class='sidebar-link'>
                                <i class="bi bi-door-open-fill"></i>
                                <span>Keluar</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div id="main" class='layout-navbar'>
            <header class='mb-3'>
                <nav class="navbar navbar-expand navbar-light navbar-top">
                    <div class="container-fluid">
                        <a href="#" class="burger-btn d-block">
                            <i class="bi bi-justify fs-3"></i>
                        </a>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav ms-auto mb-lg-0">
                            </ul>
                            <div class="dropdown">
                                <a href="#" data-bs-toggle="dropdown" aria-expanded="false">
                                    <div class="user-menu d-flex">
                                        <div class="user-name text-end me-3">
                                            <h6 class="mb-0 text-gray-600"><?= ucfirst($_SESSION['username']) ?></h6>
                                            <p class="mb-0 text-sm text-gray-600"><?= $_SESSION['role'] ?></p>
                                        </div>
                                        <div class="user-img d-flex align-items-center">
                                            <div class="avatar avatar-md">
                                                <img src="<?= base_url('public/assets/images/user.png') ?>">
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton" style="min-width: 11rem;">
                                    <li>
                                        <h6 class="dropdown-header">Halo, <?= ucfirst($_SESSION['username']) ?></h6>
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('profil') ?>"><i class="icon-mid bi bi-person me-2"></i> Profil Saya</a></li>
                                    <li><a class="dropdown-item" href="#"><i class="icon-mid bi bi-gear me-2"></i> Pengaturan</a></li>

                                    <hr class="dropdown-divider">
                                    </li>
                                    <li class="dropdown-item">
                                        <span>Mode Gelap</span>
                                        <div class="theme-toggle d-flex gap-2  align-items-center mt-2">
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--system-uicons" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 21 21">
                                                <g fill="none" fill-rule="evenodd" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M10.5 14.5c2.219 0 4-1.763 4-3.982a4.003 4.003 0 0 0-4-4.018c-2.219 0-4 1.781-4 4c0 2.219 1.781 4 4 4zM4.136 4.136L5.55 5.55m9.9 9.9l1.414 1.414M1.5 10.5h2m14 0h2M4.135 16.863L5.55 15.45m9.899-9.9l1.414-1.415M10.5 19.5v-2m0-14v-2" opacity=".3"></path>
                                                    <g transform="translate(-210 -1)">
                                                        <path d="M220.5 2.5v2m6.5.5l-1.5 1.5"></path>
                                                        <circle cx="220.5" cy="11.5" r="4">
                                                        </circle>
                                                        <path d="m214 5l1.5 1.5m5 14v-2m6.5-.5l-1.5-1.5M214 18l1.5-1.5m-4-5h2m14 0h2">
                                                        </path>
                                                    </g>
                                                </g>
                                            </svg>
                                            <div class="form-check form-switch fs-6">
                                                <input class="form-check-input  me-0" type="checkbox" id="toggle-dark">
                                                <label class="form-check-label"></label>
                                            </div>
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" role="img" class="iconify iconify--mdi" width="20" height="20" preserveAspectRatio="xMidYMid meet" viewBox="0 0 24 24">
                                                <path fill="currentColor" d="m17.75 4.09l-2.53 1.94l.91 3.06l-2.63-1.81l-2.63 1.81l.91-3.06l-2.53-1.94L12.44 4l1.06-3l1.06 3l3.19.09m3.5 6.91l-1.64 1.25l.59 1.98l-1.7-1.17l-1.7 1.17l.59-1.98L15.75 11l2.06-.05L18.5 9l.69 1.95l2.06.05m-2.28 4.95c.83-.08 1.72 1.1 1.19 1.85c-.32.45-.66.87-1.08 1.27C15.17 23 8.84 23 4.94 19.07c-3.91-3.9-3.91-10.24 0-14.14c.4-.4.82-.76 1.27-1.08c.75-.53 1.93.36 1.85 1.19c-.27 2.86.69 5.83 2.89 8.02a9.96 9.96 0 0 0 8.02 2.89m-1.64 2.02a12.08 12.08 0 0 1-7.8-3.47c-2.17-2.19-3.33-5-3.49-7.82c-2.81 3.14-2.7 7.96.31 10.98c3.02 3.01 7.84 3.12 10.98.31Z">
                                                </path>
                                            </svg>
                                        </div>
                                    </li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?= base_url('logout?logout') ?>"><i class="icon-mid bi bi-box-arrow-left me-2"></i> Keluar</a></li>
                                </ul>
                            </div>
                        </div>

                    </div>
                </nav>
            </header>
            <div id="main-content">

                <div class="page-heading mb-0 mb-3">
                    <div class="page-title">
                        <div class="row">
                            <div class="col-12 col-md-12 order-md-1 order-last">
                                <div class="card mb-0 border border-1 border-opacity-50">
                                    <div class="card-body">
                                        <span class="h5"><?= $pageheading ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <section class="section">
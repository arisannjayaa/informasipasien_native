<?php
require_once('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    $title = 'Dashboard';
    $pageheading = 'Dashboard';
    require_once('../../view/template/header.php');
    $queryHari = mysqli_query($con, "SELECT DAY(created_at) FROM pasiens WHERE DAY(created_at) = DAYOFMONTH(NOW());");
    $hari = mysqli_num_rows($queryHari);
    $queryPasien = mysqli_query($con, "SELECT id_pasien FROM pasiens;");
    $pasien = mysqli_num_rows($queryPasien);
    $queryBar = mysqli_query($con, "SELECT * FROM show_umur;");
    $queryKelamin = mysqli_query($con, "SELECT * FROM show_gender");

    if ($queryBar->num_rows > 0 && $queryKelamin->num_rows > 0) {
        while ($datachart = mysqli_fetch_assoc($queryBar)) {
            $bars['data'][] = (int)$datachart['jumlah'];
            $bars['label'][] = bulan($datachart['labels']);
        }
        while ($datapie = mysqli_fetch_assoc($queryKelamin)) {
            $pies['data'][] = (int)$datapie['jumlah'];
            $pies['label'][] = $datapie['jenis_kelamin'];
        }
    } else {
        $bars = [
            'label' => [],
            'data' => [
                [0], [0]
            ]
        ];
        $pies = [
            'label' => [
                ['Laki-Laki'], ['Perempuan']
            ],
            'data' => [
                [0], [0]
            ]
        ];
    }
    $bar = json_encode($bars);
    $pie = json_encode($pies);
?>
    <div class="row">
        <div class="col">
            <div class="card border border-1 border-opacity-50">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12 col-lg-6 order-2 order-lg-1 col-md-6 order-md-1">
                            <h4>Selamat Datang <?= ucfirst($_SESSION['username']) ?></h4>
                            <p>Data Kesehatan Informasi Pasien adalah sistem yang berguna untuk mengelola registrasi dari
                                pasien.</p>
                        </div>
                        <div class="col-12 col-lg-6 order-1 order-lg-2 col-md-6 order-md-2 mb-5 mb-lg-0">
                            <img src="<?= base_url('public/assets/images/undraw_welcoming.svg') ?>" class="img-fluid" alt="" width="250">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card border border-1 border-opacity-50">
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
        <div class="col-12 col-lg-6 col-md-6">
            <div class="card border border-1 border-opacity-50">
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
    <div class="row">
        <div class="col-12 col-lg-8 col-md-6">
            <div class="card border border-1 border-opacity-50">
                <div class="card-body">
                    <div style="height: 300px;">
                        <canvas id="myBar"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-4 col-md-6">
            <div class="card border border-1 border-opacity-50">
                <div class="card-body">
                    <div style="height: 300px;">
                        <canvas id="myPolar"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= base_url('public/assets/extensions/chart.js/dist/chart.umd.js') ?>"></script>
    <script>
        const barCtx = document.getElementById('myBar').getContext('2d');
        const polarCtx = document.getElementById('myPolar').getContext('2d');
        var bar = JSON.parse(`<?= $bar ?>`);
        var pie = JSON.parse(`<?= $pie ?>`);
        new Chart(barCtx, {
            type: 'line',
            data: {
                labels: bar.label,
                datasets: [{
                    label: 'Data Pasien <?= date('Y') ?>',
                    data: bar.data,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.2)',
                        'rgba(255, 159, 64, 0.2)',
                        'rgba(255, 205, 86, 0.2)',
                        'rgba(75, 192, 192, 0.2)',
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(153, 102, 255, 0.2)',
                        'rgba(201, 203, 207, 0.2)'
                    ],
                    borderColor: [
                        'rgb(255, 99, 132)',
                        'rgb(255, 159, 64)',
                        'rgb(255, 205, 86)',
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                        'rgb(201, 203, 207)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            // forces step size to be 50 units
                            stepSize: 1
                        }
                    }
                },
                maintainAspectRatio: false,
                responsive: true
            }
        });
        new Chart(polarCtx, {
            type: 'doughnut',
            data: {
                labels: pie.label,
                datasets: [{
                    label: 'Jenis Kelamin',
                    data: pie.data,
                    backgroundColor: [
                        'rgb(75, 192, 192)',
                        'rgb(54, 162, 235)',
                        'rgb(153, 102, 255)',
                    ],
                    hoverOffset: 4
                }]
            },
            options: {
                maintainAspectRatio: false,
                responsive: true
            }
        });
    </script>
<?php
    require_once('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
}
?>
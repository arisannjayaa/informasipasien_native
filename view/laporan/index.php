<?php
include('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    $title = 'Laporan';
    $pageheading = 'Data Laporan';
    include('../../view/template/header.php');
?>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Tanggal Registrasi</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php include('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
}
?>
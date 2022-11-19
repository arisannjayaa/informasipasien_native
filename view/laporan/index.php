<?php
$pageheading = 'Data Laporan';
include('../../config/config.php');
include('../../view/template/header.php');
?>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end align-items-center mb-3">
                    <a href="<?= base_url('pasien/add') ?>"><button type="button" class="btn btn-primary">Tambah
                            Pasien</button></a>
                </div>
                <table class="table" id="table1">
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
<?php include('../../view/template/footer.php'); ?>
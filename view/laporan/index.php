<?php
require_once('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    $title = 'Laporan';
    $pageheading = 'Data Laporan';
    require_once('../../view/template/header.php');
?>
    <form action="<?= base_url('laporan-pdf') ?>" method="post">
        <div class="row mb-3">
            <div class="col-6 col-lg-5">
                <div class="form-floating">
                    <input type="date" class="form-control" id="dari" placeholder="" value="<?= date("Y-m-d") ?>" name="dari">
                    <label for="dari">Dari</label>
                </div>
            </div>
            <div class="col-6 col-lg-5 mb-2 mb-lg-0">
                <div class="form-floating">
                    <input type="date" class="form-control" id="sampai" placeholder="" value="<?= date("Y-m-d") ?>" name="sampai">
                    <label for="sampai">Sampai</label>
                </div>
            </div>
            <div class="col-6 col-lg-1 d-grid">
                <button type="button" id="cari" class="btn btn-primary"><i class="bi bi-search"></i></button>
            </div>
            <div class="col-6 col-lg-1 d-grid">
                <button type="submit" id="print" class="btn btn-primary"><i class="bi bi-printer-fill"></i></button>
            </div>
        </div>
    </form>
    <div class="row">
        <div class="col-12">
            <div class="card border border-1 border-opacity-50">
                <div class="card-body">
                    <div class="row"></div>
                    <table id="table" class="table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Tanggal Registrasi</th>
                                <th>Nama Pasien</th>
                                <th>Jenis Kelamin</th>
                                <th>Golongan Darah</th>
                                <th>No Telp</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
}
?>
<script>
    // Menampilkan data pasien
    $('#cari').click(function() {
        var dari = $('#dari').val();
        var sampai = $('#sampai').val();
        $.ajax({
            type: "POST",
            url: "<?= base_url('config/laporan/get.php') ?>",
            data: {
                tgl_dari: dari,
                tgl_sampai: sampai,
            },
            success: function(response) {
                $("#table").html(response);
                $("#table").dataTable();
            }
        });
    });
    // Redirect ke file generatepdf
</script>
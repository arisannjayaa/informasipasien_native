<?php
include('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    $title = 'Tambah Data Pasien';
    $pageheading = 'Tambah Data Pasien';
    include('../../view/template/header.php');
?>
    <form action="<?= base_url('config/pasien/add') ?>" method="post">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-4">
                            <h5>Nomor Induk Kependudukan (NIK)</h5>
                            <div class="d-flex a">

                                <div class="col-5 me-3">
                                    <div class="form-floating">
                                        <input type="text" class="form-control" id="nik" placeholder="No NIK" name="nik">
                                        <label for="nik">NIK</label>
                                    </div>
                                </div>
                                <div class="col-1 d-grid">
                                    <button id="getktp" class="btn btn-primary" type="button"><i class="bi bi-search"></i></button>
                                </div>
                            </div>
                            <div id="pesannik"></div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col">
                                <h5>Data Diri Pasien</h5>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama" placeholder="Nama lengkap" name="nama">
                                    <label for="nama">Nama lengkap</label>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="col-7 form-floating me-3">
                                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat lahir" name="tempat_lahir">
                                        <label for="tempat_lahir">Tempat lahir</label>
                                    </div>
                                    <div class="col form-floating">
                                        <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal lahir" name="tanggal_lahir">
                                        <label for="tanggal_lahir">Tanggal lahir</label>
                                    </div>
                                </div>
                                <div class="d-flex mb-3">
                                    <div class="col-9 form-floating me-3">
                                        <select class="form-select" id="jenis_kelamin" aria-label="Jenis kelamin" name="jenis_kelamin">
                                            <option value="" selected>Pilih jenis kelamin</option>
                                            <option value="Laki-laki">Laki-laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                            <option value="Lainnya">Lainnya</option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis kelamin</label>
                                    </div>
                                    <div class="col form-floating">
                                        <select class="form-select" id="gol_darah" aria-label="Golongan darah" name="gol_darah">
                                            <option value="" selected>Pilih golongan darah</option>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                        </select>
                                        <label for="gol_darah">Golongan darah</label>
                                    </div>
                                </div>
                                <div class="col form-floating">
                                    <textarea type="text" class="form-control" id="alamat" placeholder="Alamat tinggal" name="alamat"></textarea>
                                    <label for="alamat">Alamat tinggal</label>
                                </div>
                            </div>

                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <button class="btn btn-primary me-2" type="submit">Tambah data pasien</button>
                                <a href="<?= base_url('pasien/list') ?>"><button class="btn btn-outline-secondary" type="button"><i class="bi bi-arrow-left-circle"></i> Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php include('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
}
?>
<script type="text/javascript">
    $('#getktp').click(function() {
        var nik = $("#nik").val();
        $.ajax({
            url: "<?= base_url('config/pasien/get.php') ?>",
            data: "nik=" + nik,
            success: function(data) {
                obj = JSON.parse(data);
                console.log(obj);
                if (jQuery.isEmptyObject(obj)) {
                    $("#pesannik").addClass("text-danger mt-1")
                    $("#pesannik").html("<small>Data NIK Dari Pasien Tidak Tersedia</small>");
                    $("#nama").val('');
                    $("#tempat_lahir").val('');
                    $("#tanggal_lahir").val('');
                    $("#jenis_kelamin").val('');
                    $("#gol_darah").val('');
                    $("#alamat").val('');
                } else {
                    $("#pesannik").removeClass("text-danger mt-1")
                    $("#pesannik").addClass("text-success mt-1")
                    $("#pesannik").html("<small>Data NIK Dari Pasien Tersedia</small>");
                    $("#nama").val(obj.nama);
                    $("#tempat_lahir").val(obj.tempat_lahir);
                    $("#tanggal_lahir").val(obj.tgl_lahir);
                    $("#jenis_kelamin").val(obj.jenis_kelamin);
                    $("#gol_darah").val(obj.gol_darah);
                    $("#alamat").val(obj.alamat);
                }
            }
        })
    })
</script>
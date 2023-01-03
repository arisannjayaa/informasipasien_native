<?php
require_once('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    $id = $_GET['id'];
    $title = 'Edit Data Pasien';
    $pageheading = 'Edit Data Pasien';
    $queryProvinsi = mysqli_query($con, "SELECT * FROM provinsi ORDER BY nama_provinsi asc");
    $queryPasien = mysqli_query($con, "SELECT id_pasien, id_kabupaten FROM pasiens WHERE id_pasien = '$id'");
    $data = mysqli_fetch_assoc($queryPasien);
    require_once('../../view/template/header.php');
?>
    <form action="<?= base_url('config/pasien/update') ?>" method="post">
        <div class="row">
            <div class="col">
                <div class="card border border-1 border-opacity-50">
                    <div class="card-body">
                        <div class="row">
                            <input type="text" name="id" hidden value="<?= $data['id_pasien'] ?>">
                            <div class="col">
                                <h5>Data Diri Pasien</h5>
                                <div class="form-floating mb-3">
                                    <input disabled type="text" class="form-control" id="nik" placeholder="NIK">
                                    <label for="nik">NIK</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control" id="nama" placeholder="Nama lengkap" name="nama">
                                    <label for="nama">Nama lengkap</label>
                                </div>
                                <div class="d-flex mb-3 gap-3">
                                    <div class="col-7 form-floating">
                                        <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat lahir" name="tempat_lahir">
                                        <label for="tempat_lahir">Tempat lahir</label>
                                    </div>
                                    <div class="col form-floating">
                                        <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal lahir" name="tanggal_lahir">
                                        <label for="tanggal_lahir">Tanggal lahir</label>
                                    </div>
                                </div>
                                <div class="d-flex mb-3 gap-3">
                                    <div class="col-9 form-floating">
                                        <select class="form-select" id="jenis_kelamin" aria-label="Jenis kelamin" name="jenis_kelamin" required>
                                            <option value="">Pilih jenis kelamin</option>
                                            <option value="Laki-Laki">Laki-laki
                                            </option>
                                            <option value="Perempuan">Perempuan
                                            </option>
                                        </select>
                                        <label for="jenis_kelamin">Jenis kelamin</label>
                                    </div>
                                    <div class="col form-floating">
                                        <select class="form-select" id="gol_darah" aria-label="Golongan darah" value="" name="gol_darah" required>
                                            <option value="">Pilih golongan darah</option>
                                            <option value="-">-</option>
                                            <option value="A">A
                                            </option>
                                            <option value="B">B
                                            </option>
                                            <option value="AB">AB
                                            </option>
                                            <option value="O">O
                                            </option>
                                        </select>
                                        <label for="gol_darah">Golongan darah</label>
                                    </div>
                                </div>
                                <div class="d-flex mb-3 gap-3">
                                    <div class="col-3 form-floating">
                                        <select class="form-select" id="provinsi" aria-label="Jenis kelamin" name="provinsi">
                                            <option value="" selected>Pilih Provinsi</option>
                                            <?php while ($dataProv = mysqli_fetch_assoc($queryProvinsi)) { ?>
                                                <option value="<?= $dataProv['id_provinsi'] ?>"><?= $dataProv['nama_provinsi'] ?></option>
                                            <?php } ?>
                                        </select>
                                        <label for="provinsi">Provinsi</label>
                                    </div>
                                    <div class="col-3 form-floating">
                                        <select class="form-select" id="kabupaten" aria-label="Jenis kelamin" name="kabupaten">
                                            <option value="" selected>Pilih Kabupaten/Kota</option>
                                        </select>
                                        <label for="kabupaten">Kabupaten/Kota</label>
                                    </div>
                                    <div class="col form-floating">
                                        <textarea type="text" class="form-control" id="alamat" placeholder="Alamat tinggal" name="alamat"></textarea>
                                        <label for="alamat">Alamat tinggal</label>
                                    </div>
                                </div>
                                <div class="d-flex mb-3 gap-3">
                                    <div class="col form-floating">
                                        <input type="text" class="form-control" id="no_telp" placeholder="Tempat lahir" name="no_telp" required>
                                        <label for="no_telp">No Telepon/Hp</label>
                                    </div>
                                    <div class="col form-floating">
                                        <input type="text" class="form-control" id="email" placeholder="Tempat lahir" name="email">
                                        <label for="email">Email</label>
                                    </div>
                                </div>
                                <input type="hidden" class="form-control" id="kartu_rs" name="kartu_rs">
                                <input type="hidden" class="form-control" id="info_pasien" name="info_pasien">
                                <input type="hidden" class="form-control" id="nik" name="nik">
                                <?php //-------------------------update katon-----------------------------------
                                ?>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col d-flex justify-content-start">
                                <button class="btn btn-primary me-2" type="submit">Update data pasien</button>
                                <a href="<?= base_url('pasien/list') ?>"><button class="btn btn-outline-secondary" type="button"><i class="bi bi-arrow-left-circle"></i> Kembali</button></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
<?php require_once('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
}
?>
<script>
    $("#provinsi").change(function() {
        var id_prov = $(this).val();
        var id_kab = "<?= $data['id_kabupaten'] ?>"
        $.ajax({
            type: "POST",
            url: "<?= base_url('config/wilayah/wilayah.php') ?>",
            data: {
                id_provinsi: id_prov,
                id_kabupaten: id_kab
            },
            success: function(response) {
                $("#kabupaten").html(response)
            }
        });
    });

    var idPasien = "<?= $_GET['id'] ?>";
    $.ajax({
        type: "GET",
        url: "<?= base_url('config/pasien/get.php') ?>",
        data: "id_pasien=" + idPasien,
        dataType: "JSON",
        success: function(response) {
            console.log(response);
            $('#nik').val(response.nik);
            $('[name="nik"]').val(response.nik);
            $('#nama').val(response.nama);
            $('#tempat_lahir').val(response.tempat_lahir);
            $('#tanggal_lahir').val(response.tanggal_lahir);
            $('#jenis_kelamin').val(response.jenis_kelamin);
            $('#gol_darah').val(response.gol_darah);
            $('#no_telp').val(response.no_telp);
            $('#email').val(response.email);
            $('#alamat').val(response.alamat);
            $('#kartu_rs').val(response.kartu_rs);
            $('#info_pasien').val(response.info_pasien);
            $('#provinsi').val(response.id_provinsi).trigger('change');
            $('#kabupaten').val(response.id_kabupaten).trigger('change');
        }
    });
</script>
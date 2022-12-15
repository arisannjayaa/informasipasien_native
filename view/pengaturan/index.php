<?php
require_once('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    // var_dump($_SESSION);
    // die();
    $title = 'Pengaturan';
    $pageheading = 'Pengaturan';
    $query = mysqli_query($con, "SELECT * FROM kop_surat INNER JOIN provinsi ON kop_surat.id_provinsi = provinsi.id_provinsi INNER JOIN kabupaten ON kop_surat.id_kabupaten = kabupaten.id_kabupaten;");
    $queryProvinsi = mysqli_query($con, "SELECT * FROM provinsi ORDER BY nama_provinsi ASC");
    $data = mysqli_fetch_assoc($query);
    require_once('../../view/template/header.php');
?>
    <?php
    if (isset($_SESSION['update_success'])) { ?>
        <div class="alert alert-success alert-dismissible show fade"><i class="bi bi-check-circle"></i>
            <?= $_SESSION['update_success'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['update_success']);
    } elseif (isset($_SESSION['update_failed'])) { ?>
        <div class="alert alert-danger alert-dismissible show fade"><i class="bi bi-check-circle"></i>
            <?= $_SESSION['update_failed'] ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php
        unset($_SESSION['update_failed']);
    }
    ?>
    <!-- Start modal edit data -->
    <div class="modal fade" id="edit_set" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Pengaturan</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('config/pengaturan/update') ?>" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="username" class="form-label">Gambar</label>
                                    <input name="gambar" type="file" class="image-preview-filepond">
                                </div>
                                <div class="mb-3">
                                    <label for="instansi" class="form-label">Nama Instansi</label>
                                    <input name="nama_instansi" type="text" class="form-control" id="instansi">
                                </div>
                                <div class="mb-3">
                                    <label for="provinsi" class="form-label">Provinsi</label>
                                    <select class="form-select" id="provinsi" aria-label="Jenis kelamin" name="provinsi">
                                        <option value="" selected>Pilih Provinsi</option>
                                        <?php while ($dataProv = mysqli_fetch_assoc($queryProvinsi)) { ?>
                                            <option value="<?= $dataProv['id_provinsi'] ?>"><?= $dataProv['nama_provinsi'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kabupaten" class="form-label">Kabupaten</label>
                                    <select class="form-select" id="kabupaten" aria-label="Jenis kelamin" name="kabupaten">
                                        <option value="" selected>Pilih Kabupaten/Kota</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input name="alamat" type="text" class="form-control" id="alamat">
                                </div>
                                <div class="mb-3">
                                    <label for="no_telp" class="form-label">No Telepon</label>
                                    <input name="no_telp" type="text" class="form-control" id="no_telp">
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input name="email" type="text" class="form-control" id="email">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Kembali</span>
                        </button>

                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End modal edit data -->
    <div class="row">
        <div class="col">
            <div class="card border border-1 border-opacity-50">
                <div class="card-body">
                    <div class="row mb-4">
                        <div class="col-12">
                            <div class="d-flex gap-5 align-items-center">
                                <div class="rounded-pill shadow-sm p-3">
                                    <img width="200" src="<?= base_url('public/assets/images/logo/logo1.png') ?>" alt="">
                                </div>
                                <h1 class="mt-3"><?= $data['nama_instansi'] ?></h1>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label>Alamat</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <span class="form-control"><?= $data['alamat'] ?></span>
                        </div>
                        <div class="col-md-4">
                            <label>Provinsi</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <span class="form-control"><?= $data['nama_provinsi'] ?></span>
                        </div>
                        <div class="col-md-4">
                            <label>Kabupaten</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <span class="form-control"><?= $data['nama_kabupaten'] ?></span>
                        </div>
                        <div class="col-md-4">
                            <label>Email</label>
                        </div>
                        <div class="col-md-8 form-group">
                            <span class="form-control"><?= $data['email'] ?></span>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-start">
                            <button data-bs-toggle="modal" data-bs-target="#edit_set" id="edit_set" type="button" class="btn btn-outline-primary me-1 mb-1">Edit Data</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php require_once('../../view/template/footer.php');
} else {
    header('location: ' . base_url('login'));
} ?>
<script>
    var id_kop = "<?= $data['id_pengaturan'] ?>";
    console.log(id_kop);
    $("#provinsi").change(function() {
        var id_prov = $(this).val();
        var id_kab = "<?= $data['id_kabupaten'] ?>";
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
    $.ajax({
        type: "GET",
        url: "<?= base_url('config/pengaturan/get.php') ?>",
        data: "id_kop=" + id_kop,
        dataType: "JSON",
        success: function(response) {
            console.log(response);
            $('#instansi').val(response.nama_instansi);
            $('#alamat').val(response.alamat);
            $('#no_telp').val(response.no_telp);
            $('#email').val(response.email);
            $('#provinsi').val(response.id_provinsi).trigger('change');
            $('#kabupaten').val(response.id_kabupaten).trigger('change');
        }
    });
</script>
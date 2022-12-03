<?php
require_once('../../config/config.php');
if (isset($_SESSION['login']) == 'true') {
    $title = 'Edit Data Pasien';
    $pageheading = 'Edit Data Pasien';
    require_once('../../view/template/header.php');
?>
    <form action="<?= base_url('config/pasien/update') ?>" method="post">
        <div class="row">
            <div class="col">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <div class="row">
                            <?php
                            $id = $_GET['id'];
                            $query = mysqli_query($con, "SELECT * FROM pasiens WHERE id_pasien='$id'");
                            while ($data = mysqli_fetch_assoc($query)) { ?>
                                <input type="text" value="<?= $data['id_pasien'] ?>" name="id" hidden>
                                <div class="col">
                                    <h5>Data Diri Pasien</h5>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nik" placeholder="Nama lengkap" value="<?= $data['nik'] ?>" name="nik">
                                        <label for="nik">NIK</label>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nama" placeholder="Nama lengkap" value="<?= $data['nama'] ?>" name="nama">
                                        <label for="nama">Nama lengkap</label>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="col-7 form-floating me-3">
                                            <input type="text" class="form-control" id="tempat_lahir" placeholder="Tempat lahir" value="<?= $data['tempat_lahir'] ?>" name="tempat_lahir">
                                            <label for="tempat_lahir">Tempat lahir</label>
                                        </div>
                                        <div class="col form-floating">
                                            <input type="date" class="form-control" id="tanggal_lahir" placeholder="Tanggal lahir" value="<?= $data['tanggal_lahir'] ?>" name="tanggal_lahir">
                                            <label for="tanggal_lahir">Tanggal lahir</label>
                                        </div>
                                    </div>
                                    <div class="d-flex mb-3">
                                        <div class="col-9 form-floating me-3">
                                            <select class="form-select" id="jenis_kelamin" aria-label="Jenis kelamin" name="jenis_kelamin">
                                                <option value="">Pilih jenis kelamin</option>
                                                <option value="Laki-laki" <?= ($data['jenis_kelamin'] == 'Laki-laki') ? 'selected' : '' ?>>Laki-laki
                                                </option>
                                                <option value="Perempuan" <?= ($data['jenis_kelamin'] == 'Perempuan') ? 'selected' : '' ?>>Perempuan
                                                </option>
                                                <option value="Lainnya" <?= ($data['jenis_kelamin'] == 'Lainnya') ? 'selected' : '' ?>>Lainnya
                                                </option>
                                            </select>
                                            <label for="jenis_kelamin">Jenis kelamin</label>
                                        </div>
                                        <div class="col form-floating">
                                            <select class="form-select" id="gol_darah" aria-label="Golongan darah" value="" name="gol_darah">
                                                <option value="">Pilih golongan darah</option>
                                                <option value="A" <?= ($data['gol_darah'] == 'A') ? 'selected' : '' ?>>A
                                                </option>
                                                <option value="B" <?= ($data['gol_darah'] == 'B') ? 'selected' : '' ?>>B
                                                </option>
                                                <option value="AB" <?= ($data['gol_darah'] == 'AB') ? 'selected' : '' ?>>AB
                                                </option>
                                                <option value="O" <?= ($data['gol_darah'] == 'O') ? 'selected' : '' ?>>O
                                                </option>
                                            </select>
                                            <label for="gol_darah">Golongan darah</label>
                                        </div>
                                    </div>
                                    <div class="col form-floating">
                                        <textarea type="text" class="form-control" id="alamat" placeholder="Alamat tinggal" name="alamat"><?= $data['alamat'] ?></textarea>
                                        <label for="alamat">Alamat tinggal</label>
                                    </div>

                                    <?php //-------------------------update katon-----------------------------------
                                    ?>

                                    <div class="col form-floating">
                                        <textarea type="text" class="form-control" id="kartu_rs" placeholder="Kartu RS" name="kartu_rs" hidden><?= $data['kartu_rs'] ?></textarea>
                                    </div>
                                    <div class="col form-floating">
                                        <textarea type="text" class="form-control" id="info_pasien" placeholder="Kartu Informasi pasien" name="info_pasien" hidden><?= $data['info_pasien'] ?></textarea>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
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
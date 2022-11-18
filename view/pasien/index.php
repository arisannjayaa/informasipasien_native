<?php
$pageheading = 'Data Pasien';
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
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Gol. Darah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $query = mysqli_query($con, "SELECT * FROM pasiens");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['nama'] ?></td>
                                <td><?= $data['alamat'] ?></td>
                                <td><?= $data['jenis_kelamin'] ?></td>
                                <td><?= $data['gol_darah'] ?></td>
                                <td>
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><span role="button" class="dropdown-item edit" data-id="<?= $data['id_pasien'] ?>"><i class="bi bi-pencil-fill text-primary"></i>
                                                    Edit</span></li>
                                            <li><span role="button" class="dropdown-item delete" data-id="<?= $data['id_pasien'] ?>" data-nama="<?= $data['nama'] ?>"><i class="bi bi-trash-fill text-danger"></i>
                                                    Delete</span></li>
                                            <li><span role="button" class="dropdown-item delete"><i class="bi bi-person-badge-fill text-success"></i>
                                                    Kartu Pasien</span></li>
                                            <li><span role="button" class="dropdown-item delete"><i class="bi bi-eye-fill"></i>
                                                    Lihat Detail</span></li>
                                        </ul>
                                    </div>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?php include('../../view/template/footer.php'); ?>
<script type="text/javascript">
    $(".delete").click(function() {
        var idpasien = $(this).attr('data-id');
        var nama = $(this).attr('data-nama');
        Swal.fire({
            title: 'Apakah anda yakin?',
            text: "Data dengan nama " + nama + " akan dihapus",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?= base_url('config/pasien/delete?id=') ?>" + idpasien + "";
            }
        })
    });

    $(".edit").click(function() {
        var idpasien = $(this).attr('data-id');
        window.location.href = "{{ url('pasien/edit') }}/" + idpasien + "";
    });
</script>
<?php
require_once('../config.php');
$dari = $_POST['tgl_dari'];
$sampai = $_POST['tgl_sampai'];

$no = 1;
echo '<thead>
            <tr>
                <th>No</th>
                <th>Nama Pasien</th>
                <th>Tanggal Registrasi</th>
            </tr>
        </thead>
        ';
$query = mysqli_query($con, "SELECT nama, date(created_at) as tgl_regis FROM pasiens WHERE DATE(created_at) BETWEEN '$dari' AND '$sampai' ORDER BY DATE(created_at) DESC");
if ($query->num_rows > 0) {
    while ($data = mysqli_fetch_assoc($query)) { ?>
        <tr>
            <td><?= $no++ ?></td>
            <td><?= $data['nama'] ?></td>
            <td><?= $data['tgl_regis'] ?></td>
        </tr>
<?php
    }
} else {
    echo '<tr><td colspan="3" class="text-center text-danger">Data tidak tersedia</td></tr>';
}

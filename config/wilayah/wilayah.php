<?php
require_once('../config.php');
$prov = $_GET['id_provinsi'];
$query = mysqli_query($con, "SELECT * FROM kabupaten WHERE id_provinsi = '$prov' ORDER BY nama_kabupaten ASC");
while ($data = mysqli_fetch_assoc($query)) { ?>
    <option value="<?= $data['id_kabupaten'] ?>"><?= $data['nama_kabupaten'] ?></option>
<?php } ?>
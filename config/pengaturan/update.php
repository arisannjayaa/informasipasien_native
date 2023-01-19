<?php
require_once('../config.php');

 if (isset($_POST['upload'])) {

 		
 	if ($_FILES["filegambar"]["error"] == 0) {
 		//tempat gambar beserta nama filenya disimpan
  		$tempdir = "../../public/assets/images/logo/"; 
        if (!file_exists($tempdir))
        mkdir($tempdir,0755); 
        $target_path = $tempdir . "rumahsakit.png";

        //ekstensi file yang diperbolehkan
        $ekstensi_diperbolehkan	= array('png');

        //nama gambar
        $nama_gambar=$_FILES['filegambar']['name'];
        //ukuran gambar
        $ukuran_gambar = $_FILES['filegambar']['size']; 

        $fileinfo = @getimagesize($_FILES["filegambar"]["tmp_name"]);
        //lebar gambar
        $width = $fileinfo[0];
        //tinggi gambar
        $height = $fileinfo[1]; 

        //mengambil ekstensi
        $x = explode('.', $nama_gambar);
		$ekstensi = strtolower(end($x));

        if(in_array($ekstensi, $ekstensi_diperbolehkan) === false){ 
            //echo 'Ukuran gambar harus png';
            $_SESSION['haruspng'] = 'Ekstensi gambar harus .PNG';
            header("location: " . base_url("pengaturan"));
        }else if ($width !== $height) {
            //echo 'Ukuran gambar harus 1:1';
            $_SESSION['harus11'] = 'Rasio gambar harus 1:1';
            header("location: " . base_url("pengaturan"));
        }else{
        	move_uploaded_file($_FILES['filegambar']['tmp_name'], $target_path);
        	//echo 'Simpan data berhasil';

        	$nama_instansi = $_POST['nama_instansi'];
			$provinsi  = $_POST['provinsi'];
			$kabupaten = $_POST['kabupaten'];
			$alamat = $_POST['alamat'];
			$no_telp = $_POST['no_telp'];
			$email = $_POST['email'];


			$query = mysqli_query($con, "UPDATE kop_surat SET nama_instansi='$nama_instansi', id_provinsi='$provinsi', id_kabupaten='$kabupaten', email='$email', no_telp='$no_telp', alamat='$alamat'");

            $_SESSION['harussukses'] = 'Update data berhasil';
            header("location: " . base_url("pengaturan"));


        }
 	}else {
 		$nama_instansi = $_POST['nama_instansi'];
        $provinsi  = $_POST['provinsi'];
        $kabupaten = $_POST['kabupaten'];
        $alamat = $_POST['alamat'];
        $no_telp = $_POST['no_telp'];
        $email = $_POST['email'];


        $query = mysqli_query($con, "UPDATE kop_surat SET nama_instansi='$nama_instansi', id_provinsi='$provinsi', id_kabupaten='$kabupaten', email='$email', no_telp='$no_telp', alamat='$alamat'");

        $_SESSION['harussukses'] = 'Update data berhasil';
        header("location: " . base_url("pengaturan"));



    }	
        	
 }
?>

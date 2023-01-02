<?php
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');
$host = 'localhost';
$username = 'root';
$password = '';
$dbInformasiPasien = 'db_informasipasien';
$dbKtp = 'db_projek';
$con = mysqli_connect($host, $username, $password, $dbInformasiPasien);

// if (mysqli_connect_error()) {
//     header("location: " . base_url("500"));
// }

function base_url($url = null)
{
    // local dev
    // $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/informasipasien_native";
    $base_url = "http://informasipasien_native.test";

    // ngrok server
    // $base_url = 'https://73ab-180-252-65-10.ap.ngrok.io/informasipasien_native';

    // hosting elektro-pnb.id
    // $base_url = 'https://informasipasien.elektro-pnb.id';

    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}

function request_uri($uri)
{
    $uri_path = parse_url($uri, PHP_URL_PATH);
    $uri_segments = explode('/', $uri_path);
    return $uri_segments[2];
}

function bulan($bulan)
{
    switch ($bulan) {
        case 1:
            $bulan = "Januari";
            break;
        case 2:
            $bulan = "Februari";
            break;
        case 3:
            $bulan = "Maret";
            break;
        case 4:
            $bulan = "April";
            break;
        case 5:
            $bulan = "Mei";
            break;
        case 6:
            $bulan = "Juni";
            break;
        case 7:
            $bulan = "Juli";
            break;
        case 8:
            $bulan = "Agustus";
            break;
        case 9:
            $bulan = "September";
            break;
        case 10:
            $bulan = "Oktober";
            break;
        case 11:
            $bulan = "November";
            break;
        case 12:
            $bulan = "Desember";
            break;
    }
    return $bulan;
}

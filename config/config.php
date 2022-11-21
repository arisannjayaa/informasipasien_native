<?php
session_start();
date_default_timezone_set('Asia/Kuala_Lumpur');
$con = mysqli_connect('localhost', 'root', '', 'db_informasipasien_native');

if (mysqli_connect_error()) {
    header("location: " . base_url("500"));
}

function base_url($url = null)
{
    $base_url = "http://" . $_SERVER['HTTP_HOST'] . "/informasipasien_native";
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

<?php
session_start();
$con = mysqli_connect('localhost', 'root', '', 'db_informasipasien');

if (mysqli_connect_error()) {
    header("location: " . base_url("500"));
}

function base_url($url = null)
{
    $base_url = "http://informasipasien.test";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url;
    }
}

function asset()
{
}

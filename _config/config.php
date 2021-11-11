<?php

// zona waktu menesuaikan di indonesia
date_default_timezone_set('Asia/Jakarta');

session_start();
require_once "conn.php";

$con = mysqli_connect($con['host'], $con['user'], $con['pass'], $con['db']);
if (mysqli_connect_errno()) {
    echo mysqli_connect_error();
}

// membuat function base url
function base_url($url = null)
{
    $base_url = "http://localhost/rumahsakit";
    if ($url != null) {
        return $base_url . "/" . $url;
    } else {
        return $base_url . "/";
    }
}

// function tanggal indo
function tgl_indo($tgl)
{
    $tanggal = substr($tgl, 8, 2);
    $bulan = substr($tgl, 5, 2);
    $tahun = substr($tgl, 0, 4);

    return $tanggal . "/" . $bulan . "/" . $tahun;
}

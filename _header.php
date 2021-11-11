<?php
require_once "../_config/config.php";

// panggil library uuid
require "_assets/libs/vendor/autoload.php";



if (!isset($_SESSION['user'])) {
    echo "
        <script>
            alert('Anda harus login dulu.!');
            window.location='" . base_url('auth') .  "';
        </script>
    ";
} ?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Aplikasi Rumah Sakit</title>



    <link rel="stylesheet" href="<?= base_url() ?>_assets/bootstrap-5/css/bootstrap.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>_assets/bootstrap-5/footers/footers.css">

    <link rel="stylesheet" href="<?= base_url() ?>_assets/css/simple-sidebar.css">

    <!-- font awesome -->
    <link rel="stylesheet" href="<?= base_url() ?>_assets/plugin/fontawesome-free-5/css/all.min.css">

    <!-- datatable -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">

    <link rel="stylesheet" href="<?= base_url() ?>_assets/libs/DataTables/Buttons-2.0.1/css/buttons.bootstrap5.min.css">

    <!-- icon -->
    <link rel="icon" href="<?= base_url() ?>_assets/img/icon/medic.png">

    <style>
        .bg {
            background-image: url('');
        }
    </style>

</head>

<body style="background-image: url('../_assets/img/bg/bg.png');">
    <div id="wrapper">

        <script src="<?= base_url() ?>_assets/js/jquery.js"></script>
        <script src="<?= base_url() ?>_assets/bootstrap-5/js/bootstrap.min.js"></script>

        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

        <script src="<?= base_url() ?>_assets/libs/DataTables/Buttons-2.0.1/js/buttons.bootstrap5.min.js"></script>


        <!-- Sidebar -->
        <div id="sidebar-wrapper" class="bg-dark ">
            <ul class="nav sidebar-nav flex-column">
                <li class="sidebar-brand ">
                    <a href="<?= base_url('dashboard') ?>"><i class="fas fa-clinic-medical"></i>
                        <span class="text-primary"><b> Rumah Sakit</b></span>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dashboard') ?>" class="nav-link active"><i class="fas fa-tachometer-alt "></i> Dashboard</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('pasien') ?>" class="nav-link"> <i class="fas fa-user-injured"></i> Data Pasien</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('dokter') ?>" class="nav-link"><i class="fas fa-user-md"></i> Data Dokter</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('poliklinik') ?>" class="nav-link "><i class="fas fa-clinic-medical"></i> Data Poliklinik</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('obat/data.php') ?>" class="nav-link"><i class="fas fa-pills"></i> Data Obat</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('rekam-medis') ?>" class="nav-link"><i class="fas fa-book-medical"></i> Rekam Medis</a>
                </li>
                <li class="nav-item">
                    <a href="<?= base_url('auth/logout.php') ?>" class="nav-link"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </li>
            </ul>
        </div>
        <!-- /#sidebar-wrapper -->

        <!-- navbar -->
        <nav class="navbar navbar-expand-md navbar-dark navbar-fixed-top bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="#menu-toggle" id="menu-toggle"><i class="fas fa-th-list"></i></a>

                <marquee class="text-white">Selamat Datang <?= $_SESSION['user']['nama_user'] ?>......</marquee>
                <div class="collapse navbar-collapse" id="navbarCollapse">

                    <span class="navbar-text">
                        <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#logout">Logout</button>
                    </span>
                </div>
            </div>
        </nav>

        <!-- Page Content -->
        <div id="page-content-wrapper ">
            <div class="container-fluid p-4">
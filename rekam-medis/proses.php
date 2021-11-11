<?php
require_once "../_config/config.php";

// panggil library uuid
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;

// proses tambah
if (isset($_POST['add'])) {
    // id unique dengan uuid
    $uuid = Uuid::uuid4()->toString();

    // ambil datanya
    $pasien = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $keluhan = trim(mysqli_real_escape_string($con, $_POST['keluhan']));
    $dokter = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $diagnosa = trim(mysqli_real_escape_string($con, $_POST['diagnosa']));
    $poli = trim(mysqli_real_escape_string($con, $_POST['nama_poli']));
    $tgl = trim(mysqli_real_escape_string($con, $_POST['tgl_periksa']));


    mysqli_query($con, "INSERT INTO tb_rekammedis (id_rm, id_pasien, keluhan, id_dokter, diagnosa, id_poli, tgl_periksa) VALUES ('$uuid', '$pasien', '$keluhan', '$dokter', '$diagnosa', '$poli', '$tgl')") or die(mysqli_error($con));

    $obat = @$_POST['obat'];
    foreach ($obat as $ob) {
        mysqli_query($con, "INSERT INTO tb_rm_obat (id_rm, id_obat) VALUES ('$uuid', '$ob')") or die(mysqli_error($con));
    }

    echo "
        <script>
            alert('Data rekam medis berhasil ditambahkan..');
            window.location='" . base_url('rekam-medis') .  "';
        </script>
    ";
}

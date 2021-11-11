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
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nm_pasien = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['telp']));

    // cek nomer identitas, jika sudah di pakai oleh pasien lain maka tidak bisa menggunakan nomer identitas yang sama
    $cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomer_identitas = '$identitas'") or die(mysqli_error($con));
    if (mysqli_num_rows($cek_identitas)  > 0) {
        echo "
        <script>
            alert('Nomer identitas sudah digunakan..');
            window.location='" . base_url('pasien/add.php') .  "';
        </script>
    ";
    } else {
        mysqli_query($con, "INSERT INTO tb_pasien (id_pasien, nomer_identitas, nama_pasien, jenis_kelamin, alamat, no_telp) VALUES ('$uuid', '$identitas', '$nm_pasien', '$jk', '$alamat', '$tlp')") or die(mysqli_error($con));

        echo "
        <script>
            alert('Data pasien berhasil ditambahkan..');
            window.location='" . base_url('pasien') .  "';
        </script>
    ";
    }
} else if (isset($_POST['edit'])) {
    // ambil datanya
    $id = $_POST['id'];
    $identitas = trim(mysqli_real_escape_string($con, $_POST['identitas']));
    $nm_pasien = trim(mysqli_real_escape_string($con, $_POST['nama_pasien']));
    $jk = trim(mysqli_real_escape_string($con, $_POST['jk']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['telp']));

    // cek nomer identitas, jika sudah di pakai oleh pasien lain maka tidak bisa menggunakan nomer identitas yang sama
    $cek_identitas = mysqli_query($con, "SELECT * FROM tb_pasien WHERE nomer_identitas = '$identitas' AND id_pasien !='$id'") or die(mysqli_error($con));

    if (mysqli_num_rows($cek_identitas)  > 0) {
        echo "
        <script>
            alert('Nomer identitas sudah digunakan..');
            window.location='" . base_url('pasien/edit.php?id=' . $id . '') .  "';
        </script>
    ";
    } else {
        mysqli_query($con, "UPDATE tb_pasien SET 
        nomer_identitas = '$identitas', 
        nama_pasien = '$nm_pasien',
        jenis_kelamin = '$jk',
        alamat = '$alamat',
        no_telp = '$tlp'
        WHERE id_pasien = '$id'
        ") or die(mysqli_error($con));

        echo "
        <script>
            alert('Data pasien berhasil diedit..');
            window.location='" . base_url('pasien') .  "';
        </script>
    ";
    }
}

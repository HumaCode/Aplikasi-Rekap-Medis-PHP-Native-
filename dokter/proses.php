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
    $nm_dokter = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $spec = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['telp']));

    mysqli_query($con, "INSERT INTO tb_dokter (id_dokter, nama_dokter, spesialis, alamat, no_telp) VALUES ('$uuid', '$nm_dokter', '$spec', '$alamat', '$tlp')") or die(mysqli_error($con));

    echo "
        <script>
            alert('Data berhasil ditambahkan..');
            window.location='" . base_url('dokter') .  "';
        </script>
    ";
} else if (isset($_POST['edit'])) {
    // ambil datanya
    $id = $_POST['id'];
    $nm_dokter = trim(mysqli_real_escape_string($con, $_POST['nama_dokter']));
    $spec = trim(mysqli_real_escape_string($con, $_POST['spesialis']));
    $alamat = trim(mysqli_real_escape_string($con, $_POST['alamat']));
    $tlp = trim(mysqli_real_escape_string($con, $_POST['no_telp']));

    mysqli_query($con, "UPDATE tb_dokter SET 
        nama_dokter = '$nm_dokter', 
        spesialis = '$spec',
        alamat = '$alamat',
        no_telp = '$tlp'
        WHERE id_dokter = '$id'
        ") or die(mysqli_error($con));

    echo "
        <script>
            alert('Data berhasil diedit..');
            window.location='" . base_url('dokter') .  "';
        </script>
    ";
}

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
    $nm_obat = trim(mysqli_real_escape_string($con, $_POST['nama_obat']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));

    mysqli_query($con, "INSERT INTO tb_obat (id_obat, nama_obat, ket_obat) VALUES ('$uuid', '$nm_obat', '$ket')") or die(mysqli_error($con));

    echo "
        <script>
            alert('Data berhasil ditambahkan..');
            window.location='" . base_url('obat') .  "';
        </script>
    ";
} else if (isset($_POST['edit'])) {
    // ambil datanya
    $id = $_POST['id'];
    $nm_obat = trim(mysqli_real_escape_string($con, $_POST['nama_obat']));
    $ket = trim(mysqli_real_escape_string($con, $_POST['ket']));

    mysqli_query($con, "UPDATE tb_obat SET 
        nama_obat = '$nm_obat', 
        ket_obat = '$ket'
        WHERE id_obat = '$id'
        ") or die(mysqli_error($con));

    echo "
        <script>
            alert('Data berhasil diedit..');
            window.location='" . base_url('obat') .  "';
        </script>
    ";
}

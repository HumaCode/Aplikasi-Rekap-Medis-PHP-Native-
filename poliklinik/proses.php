<?php
require_once "../_config/config.php";

// panggil library uuid
require "../_assets/libs/vendor/autoload.php";

use Ramsey\Uuid\Uuid;



// proses tambah
if (isset($_POST['add'])) {

    // ambil data yang di kirim
    $total = $_POST['total'];

    for ($i = 1; $i <= $total; $i++) {
        $uuid = Uuid::uuid4()->toString();
        $nm_poli = trim(mysqli_real_escape_string($con, $_POST['nama-' . $i]));
        $gedung = trim(mysqli_real_escape_string($con, $_POST['gedung-' . $i]));

        $sql = mysqli_query($con, "INSERT INTO tb_poliklinik (id_poli, nama_poli, gedung) VALUES ('$uuid', '$nm_poli', '$gedung')") or die(mysqli_error($con));
    }

    if ($sql) {
        echo "
            <script>
                alert('" . $total . " Data berhasil ditambahkan..');
                window.location='" . base_url('poliklinik') .  "';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('" . $total . " Data gagal ditambahkan..');
                window.location='" . base_url('poliklinik/generate.php') .  "';
            </script>
            ";
    }
} else if (isset($_POST['edit'])) {
    $total_data = count($_POST['id']);

    for ($i = 0; $i < $total_data; $i++) {
        $id = @$_POST['id'][$i];
        $nm_poli = @$_POST['nama'][$i];
        $gedung = @$_POST['gedung'][$i];

        $sql = mysqli_query(
            $con,
            "UPDATE tb_poliklinik SET
                        nama_poli = '$nm_poli',
                        gedung = '$gedung'
                        WHERE id_poli = '$id'"
        ) or die(mysqli_error($con));
    }

    echo "
            <script>
                alert('Data berhasil diedit..');
                window.location='" . base_url('poliklinik') .  "';
            </script>
            ";
}

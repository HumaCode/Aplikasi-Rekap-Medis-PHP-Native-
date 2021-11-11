<?php
require_once "../_config/config.php";

// ambil data yang di checklist
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "
        <script>
            alert('Pilih data yang ingin di hapus dahulu.!');
            window.location='" . base_url('dokter') .  "';
        </script>
        ";
} else {
    foreach ($chk as $id) {
        $sql = mysqli_query($con, "DELETE FROM tb_dokter WHERE id_dokter = '$id'") or die(mysqli_error($con));
    }

    if ($sql) {
        echo "
            <script>
                alert('" . count($chk) . " Data berhasil dihapus..');
                window.location='" . base_url('dokter') .  "';
            </script>
            ";
    } else {
        echo "
            <script>
                alert('" . count($chk) . " Data gagal dihapus..');
                window.location='" . base_url('dokter') .  "';
            </script>
            ";
    }
}

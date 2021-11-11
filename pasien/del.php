<?php
require_once "../_config/config.php";

$id = @$_GET['id'];

// echo $id;
mysqli_query($con, "DELETE FROM tb_pasien WHERE id_pasien = '$id'") or die(mysqli_error($con));

echo "
        <script>
            alert('Data pasien berhasil dihapus..');
            window.location='" . base_url('pasien') .  "';
        </script>
    ";

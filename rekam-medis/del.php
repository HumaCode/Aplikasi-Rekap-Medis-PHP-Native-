<?php
require_once "../_config/config.php";

$id = @$_GET['id'];

// echo $id;
mysqli_query($con, "DELETE FROM tb_rekammedis WHERE id_rm = '$id'") or die(mysqli_error($con));

echo "
        <script>
            alert('Data rekam medis berhasil dihapus..');
            window.location='" . base_url('rekam-medis') .  "';
        </script>
    ";

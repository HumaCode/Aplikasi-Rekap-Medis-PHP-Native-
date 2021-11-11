<?php
require_once "../_config/config.php";

$id = @$_GET['id'];

// echo $id;
mysqli_query($con, "DELETE FROM tb_obat WHERE id_obat = '$id'") or die(mysqli_error($con));

echo "
        <script>
            alert('Data berhasil dihapus..');
            window.location='" . base_url('obat') .  "';
        </script>
    ";

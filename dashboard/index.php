<?php

// load header
include_once('../_header.php');

$tanggal = mktime(date('m'), date("d"), date('Y'));
$tgl = date("d-m-Y", $tanggal);
date_default_timezone_set("Asia/Jakarta");
$jam = date("H:i:s");
$a = date("H");
if (($a >= 6) && ($a <= 11)) {
    $sapaan =  " <b>, Selamat Pagi !! </b>";
} else if (($a >= 11) && ($a <= 15)) {
    $sapaan = " , Selamat  Pagi !! ";
} elseif (($a > 15) && ($a <= 18)) {
    $sapaan = ", Selamat Siang !!";
} else {
    $sapaan = ", <b> Selamat Malam </b>";
}

$nama = $_SESSION['user']['nama_user'];
$status = $_SESSION['user']['level'];
if ($status == 1) {
    $stts = 'Admin';
} else {
    $stts = 'Petugas';
}
?>
<div class="row">
    <div class=" ">
        <span class="badge rounded-pill bg-info text-dark p-2 float-end">
            Tanggal : <?= $tgl . '' . $sapaan . ' ' . $stts ?>
        </span>
    </div>
</div>


<div class="row">
    <div class="col-lg-12">
        <h1>Dashboard</h1>
        <p>Selamat Datang <?= $nama ?> di website Rekap Medis</p>

    </div>
</div>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
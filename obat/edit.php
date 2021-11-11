<?php
// include header 
include_once('../_header.php');

$id = @$_GET['id'];
$sql_obat = mysqli_query($con, "SELECT * FROM tb_obat WHERE id_obat = '$id'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql_obat);

?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Data Obat</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Edit</strong>
            <a href="<?= base_url('obat') ?>" class="btn btn-outline-danger btn-sm float-end m-1"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="proses.php" method="POST">

                        <input type="hidden" name="id" id="id" value="<?= $data['id_obat'] ?>">

                        <div class="mb-3">
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" id="nama_obat" value="<?= $data['nama_obat'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="ket" name="ket" rows="3" required><?= $data['ket_obat'] ?></textarea>
                        </div>
                        <div class="form-group float-end">
                            <button type="submit" name="edit" class="btn btn-primary btn-sm">Ubah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- load footer -->
<?php include_once('../_footer.php'); ?>
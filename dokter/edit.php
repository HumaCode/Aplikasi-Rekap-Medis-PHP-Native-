<?php
// include header 
include_once('../_header.php');

$id = @$_GET['id'];
$sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter WHERE id_dokter = '$id'") or die(mysqli_error($con));
$data = mysqli_fetch_array($sql_dokter);

?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Data Dokter</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Edit</strong>
            <a href="<?= base_url('dokter') ?>" class="btn btn-outline-danger btn-sm float-end m-1"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="proses.php" method="POST">

                        <input type="hidden" name="id" id="id" value="<?= $data['id_dokter'] ?>">

                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" name="nama_dokter" id="nama_dokter" value="<?= $data['nama_dokter'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="spesialis" class="form-label">Spesialis</label>
                            <input type="text" class="form-control" name="spesialis" id="spesialis" value="<?= $data['spesialis'] ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $data['alamat'] ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No. Telepon</label>
                            <input type="text" class="form-control" name="no_telp" id="no_telp" value="<?= $data['no_telp'] ?>" required>
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
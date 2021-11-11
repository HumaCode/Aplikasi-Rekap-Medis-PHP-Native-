<?php
// include header 
include_once('../_header.php');

?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Tambah Data Dokter</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Tambah</strong>
            <a href="<?= base_url('obat') ?>" class="btn btn-outline-danger btn-sm float-end m-1"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="proses.php" method="POST">
                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <input type="text" class="form-control" name="nama_dokter" id="nama_dokter" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="spesialis" class="form-label">Spesialis</label>
                            <input type="text" class="form-control" name="spesialis" id="spesialis" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No. Telepon</label>
                            <input type="number" min="0" class="form-control" name="telp" id="telp" required autofocus>
                        </div>
                        <div class="form-group float-end">
                            <button type="submit" name="add" class="btn btn-primary btn-sm">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- load footer -->
<?php include_once('../_footer.php'); ?>
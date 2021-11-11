<?php
// include header 
include_once('../_header.php');

?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Tambah Data Obat</h1>
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
                            <label for="nama_obat" class="form-label">Nama Obat</label>
                            <input type="text" class="form-control" name="nama_obat" id="nama_obat" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="ket" class="form-label">Keterangan</label>
                            <textarea class="form-control" id="ket" name="ket" rows="3" required></textarea>
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
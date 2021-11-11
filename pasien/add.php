<?php
// include header 
include_once('../_header.php');

?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Tambah Data Pasien</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Tambah</strong>
            <a href="<?= base_url('pasien') ?>" class="btn btn-outline-danger btn-sm float-end m-1"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="proses.php" method="POST">
                        <div class="mb-3">
                            <label for="identitas" class="form-label">Nomor Identitas</label>
                            <input type="number" min="0" class="form-control" name="identitas" id="identitas" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                            <input type="text" class="form-control" name="nama_pasien" id="nama_pasien" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Jenis Kelamin</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault1" value="L" required>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    Laki-laki
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jk" id="flexRadioDefault2" value="P">
                                <label class="form-check-label" for="flexRadioDefault2">
                                    Perempuan
                                </label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="telp" class="form-label">No. Telepon</label>
                            <input type="number" min="0" class="form-control" name="telp" id="telp" required>
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
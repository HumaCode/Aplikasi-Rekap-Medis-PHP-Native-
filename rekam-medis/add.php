<?php
// include header 
include_once('../_header.php');

// query data pasien
$sql_pasien = mysqli_query($con, "SELECT * FROM tb_pasien") or die (mysqli_error($con));

// query data dokter
$sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die (mysqli_error($con));

// query data poliklinik
$sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die (mysqli_error($con));

// query data obat
$sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die (mysqli_error($con));

?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Tambah Data Rekam Medis</h1>
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
                            <label for="nama_pasien" class="form-label">Nama Pasien</label>
                            <select name="nama_pasien" id="nama_pasien" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <?php while($pasien = mysqli_fetch_array($sql_pasien)) { ?>
                                    <option value="<?= $pasien['id_pasien'] ?>"><?= $pasien['nama_pasien'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="keluhan" class="form-label">Keluhan</label>
                            <textarea class="form-control" id="keluhan" name="keluhan" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nama_dokter" class="form-label">Nama Dokter</label>
                            <select name="nama_dokter" id="nama_dokter" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <?php while($dokter = mysqli_fetch_array($sql_dokter)) { ?>
                                    <option value="<?= $dokter['id_dokter'] ?>"><?= $dokter['nama_dokter'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="diagnosa" class="form-label">Diagnosa</label>
                            <textarea class="form-control" id="diagnosa" name="diagnosa" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="nama_poli" class="form-label">Poliklinik</label>
                            <select name="nama_poli" id="nama_poli" class="form-control" required>
                                <option value="">-- Pilih --</option>
                                <?php while($poli = mysqli_fetch_array($sql_poli)) { ?>
                                    <option value="<?= $poli['id_poli'] ?>"><?= $poli['nama_poli'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="obat" class="form-label">Obat</label>
                            <select multiple name="obat[]" id="obat" class="form-control" required size="7">
                                <?php while($obat = mysqli_fetch_array($sql_obat)) { ?>
                                    <option value="<?= $obat['id_obat'] ?>"><?= $obat['nama_obat'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="tgl_periksa" class="form-label">Tanggal Periksa</label>
                            <input type="date" class="form-control" name="tgl_periksa" id="tgl_periksa" required value="<?= date('Y-m-d') ?>">
                        </div>
                        <div class="form-group float-end">
                            <button type="submit" name="add" class="btn btn-primary btn-sm">Simpan</button>
                            <button type="reset"  class="btn btn-secondary btn-sm">Reset</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- load footer -->
<?php include_once('../_footer.php'); ?>
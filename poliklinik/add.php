<!-- load header -->
<?php include_once('../_header.php');

// ambil data yang di kirimkan dari tambah multiple
$field = @$_POST['count_add'];


?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Tambah Data Poliklinik</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Tambah</strong>
            <a href="<?= base_url('poliklinik') ?>" class="btn btn-outline-warning btn-sm float-end m-1"> Data</a>
            <a href="<?= base_url('poliklinik/generate.php') ?>" class="btn btn-outline-danger btn-sm float-end m-1"> Tambah Data Lagi</a>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="proses.php" method="POST">
                        <input type="hidden" name="total" value="<?= $field ?>">

                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Nama Poliklinik</th>
                                <th>Gedung</th>
                            </tr>
                            <?php for ($i = 1; $i <= $field; $i++) { ?>
                                <tr>
                                    <td><?= $i ?></td>
                                    <td>
                                        <input type="text" class="form-control" name="nama-<?= $i ?>" required>
                                    </td>
                                    <td>
                                        <input type="text" class="form-control" name="gedung-<?= $i ?>" required>
                                    </td>
                                </tr>
                            <?php } ?>
                        </table>

                        <button type="submit" name="add" class="btn btn-primary btn-sm float-end">Simpan Semua</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
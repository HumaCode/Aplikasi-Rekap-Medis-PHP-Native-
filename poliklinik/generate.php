<!-- load header -->
<?php include_once('../_header.php'); ?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-plus"></i> Multiple Tambah Data</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Tambah</strong>
            <a href="<?= base_url('poliklinik') ?>" class="btn btn-outline-danger btn-sm float-end m-1"><i class="fas fa-chevron-left"></i> Kembali</a>
        </div>
        <div class="card-body">

            <div class="row">
                <div class="col-md-6 m-auto">
                    <form action="add.php" method="post">
                        <div class="mb-3">
                            <label for="count_add" class="form-label">Banyak record yang ditambahkan</label>
                            <input type="text" class="form-control" id="count_add" name="count_add" maxlength="2" pattern="[0-9]+" required>
                        </div>
                        <button type="submit" name="generate" class="btn btn-success btn-sm float-end">Generate</button>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
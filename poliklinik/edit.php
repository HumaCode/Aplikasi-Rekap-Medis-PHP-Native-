<!-- load header -->
<?php include_once('../_header.php');

// ambil data yang di checklist
$chk = $_POST['checked'];
if (!isset($chk)) {
    echo "
        <script>
            alert('Pilih data yang ingin di edit.!');
            window.location='" . base_url('poliklinik') .  "';
        </script>
        ";
} else {


?>

    <div class="box">
        <h1 class="mb-4"><i class="fas fa-edit"></i> Edit Data Poliklinik</h1>
        <div class="card ">
            <div class="card-header bg-info">
                <strong>Edit</strong>
                <a href="<?= base_url('poliklinik') ?>" class="btn btn-outline-danger btn-sm float-end m-1"><i class="fas fa-chevron-left"></i> Kembali</a>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-6 m-auto">
                        <form action="proses.php" method="POST">
                            <input type="hidden" name="total" value="<?= @$_POST['count_add'] ?>">

                            <table class="table">
                                <tr>
                                    <th>#</th>
                                    <th>Nama Poliklinik</th>
                                    <th>Gedung</th>
                                </tr>
                                <?php $i = 1;
                                foreach ($chk as $id) {
                                    $sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik WHERE id_poli = '$id'") or die(mysqli_error($con));
                                    while ($data = mysqli_fetch_array($sql_poli)) {
                                ?>
                                        <tr>
                                            <td><?= $i++ ?></td>
                                            <td>
                                                <input type="hidden" name="id[]" value="<?= $data['id_poli'] ?>">
                                                <input type="text" class="form-control" name="nama[]" value="<?= $data['nama_poli'] ?>" required>
                                            </td>
                                            <td>
                                                <input type="text" class="form-control" name="gedung[]" value="<?= $data['gedung'] ?>" required>
                                            </td>
                                        </tr>
                                <?php }
                                } ?>
                            </table>

                            <button type="submit" name="edit" class="btn btn-primary btn-sm float-end">Edit Semua</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- load footer -->
<?php }
include_once('../_footer.php'); ?>
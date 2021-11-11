<!-- load header -->
<?php include_once('../_header.php');

// query obat
$sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die(mysqli_error($con));
?>


<div class="box">
    <h1 class="mb-4"><i class="fas fa-pills"></i> Data Obat</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Data Obat</strong>
            <a href="<?= base_url('obat/add.php') ?>" class="btn btn-outline-secondary btn-sm float-end m-1"><i class="fas fa-plus-circle "></i> Tambah</a>

            <a href="" class="btn btn-outline-warning btn-sm float-end  m-1"><i class="fas fa-redo-alt"></i></a>
        </div>



        <div class="card-body ">
            <div class="table-responsive">

                <table id="tb-obat" class="table table-striped table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="50">No</th>
                            <th>Nama Obat</th>
                            <th>Keterangan</th>
                            <th><i class="fas fa-star-of-life"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($sql_obat) > 0) { ?>
                            <?php $i = 1;
                            while ($data = mysqli_fetch_array($sql_obat)) { ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= $data['nama_obat'] ?></td>
                                    <td><?= $data['ket_obat'] ?></td>
                                    <td class="text-center">
                                        <a href="<?= base_url('obat/edit.php?id=') . $data['id_obat'] ?>" class="btn btn-info btn-sm mt-2" title="Edit"><i class="fas fa-edit"></i></a>

                                        <a href="<?= base_url('obat/del.php?id=') . $data['id_obat'] ?> " class="btn btn-danger btn-sm mt-2" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data ini.?')"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php $i++;
                            } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $('#tb-obat').DataTable();
        });
    </script>


</div>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
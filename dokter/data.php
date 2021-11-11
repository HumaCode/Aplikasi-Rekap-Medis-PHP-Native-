<!-- load header -->
<?php include_once('../_header.php');

// query obat
$sql_dokter = mysqli_query($con, "SELECT * FROM tb_dokter") or die(mysqli_error($con));
?>













<div class="box">
    <h1 class="mb-4"><i class="fas fa-user-md"></i> Data Dokter</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Data Dokter</strong>
            <a href="<?= base_url('dokter/add.php') ?>" class="btn btn-outline-secondary btn-sm float-end m-1"><i class="fas fa-plus-circle "></i> Tambah</a>

            <a href="" class="btn btn-outline-warning btn-sm float-end  m-1"><i class="fas fa-redo-alt"></i></a>
        </div>



        <div class="card-body ">

            <form method="post" name="proses">
                <div class="table-responsive">
                    <table id="tb-dokter" class="table table-striped table-bordered table-hover">
                        <thead class="table-dark text-center">
                            <tr>
                                <th>
                                    <input class="form-check-input" type="checkbox" id="select_all" value="">
                                </th>
                                <th width="50">No</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>Alamat</th>
                                <th>No. Telepon</th>
                                <th><i class="fas fa-star-of-life"></i></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($sql_dokter) > 0) { ?>
                                <?php $i = 1;
                                while ($data = mysqli_fetch_array($sql_dokter)) { ?>
                                    <tr>
                                        <td class="text-center">
                                            <input class="form-check-input check" type="checkbox" name="checked[]" value="<?= $data['id_dokter'] ?>">
                                        </td>
                                        <td class="text-center">
                                            <?= $i ?></td>
                                        <td><?= $data['nama_dokter'] ?></td>
                                        <td><?= $data['spesialis'] ?></td>
                                        <td><?= $data['alamat'] ?></td>
                                        <td class="text-center"><?= $data['no_telp'] ?></td>
                                        <td class="text-center">
                                            <a href="<?= base_url('dokter/edit.php?id=') . $data['id_dokter'] ?>" class="btn btn-success btn-sm mt-2" title="Edit"><i class="fas fa-edit"></i></a>


                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </form>

        </div>

        <div class="card-footer mt-3">
            <div class="row">
                <div class="">
                    <button class="btn btn-danger btn-sm float-end m-1" onclick="hapus()"><i class="fas fa-trash"></i> Hapus</button>
                </div>
            </div>
        </div>

    </div>


    <script>
        $(document).ready(function() {
            $('#tb-dokter').DataTable({
                columnDefs: [{
                    "searchable": false,
                    "orderable": false,
                    "targets": [0, 6]
                }],
                "order": [1, "asc"]
            });

            // select multiple atas
            $('#select_all').on('click', function() {
                if (this.checked) {
                    $('.check').each(function() {
                        this.checked = true;
                    });
                } else {
                    $('.check').each(function() {
                        this.checked = false;
                    });
                }
            });

            // select multiple bawah
            $('.check').on('click', function() {
                if ($('.check:checked').length == $('.check').length) {
                    $('#select_all').prop('checked', true)
                } else {
                    $('#select_all').prop('checked', false)
                }
            })
        });


        // function hapus
        function hapus() {
            var conf = confirm('Apakah anda yakin akan menghapus data ini.?');
            if (conf) {
                document.proses.action = 'del.php';
                document.proses.submit();
            }
        }
    </script>


</div>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
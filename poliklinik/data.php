<!-- load header -->
<?php include_once('../_header.php');

// query poli
$sql_poli = mysqli_query($con, "SELECT * FROM tb_poliklinik ORDER BY nama_poli ASC") or die(mysqli_error($con));
?>

<div class="box">
    <h1 class="mb-4"><i class="fas fa-clinic-medical"></i> Data Poliklinik</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Data Poliklinik</strong>
            <a href="generate.php" class="btn btn-outline-secondary btn-sm float-end m-1"><i class="fas fa-plus-circle "></i> Tambah</a>

            <a href="" class="btn btn-outline-warning btn-sm float-end  m-1"><i class="fas fa-redo-alt"></i></a>
        </div>



        <div class="card-body ">
            <div class="table-responsive">

                <form name="proses" method="post">
                    <table id="tb-poli" class="table table-striped table-bordered table-hover">
                        <thead class="table-dark text-center">
                            <tr>
                                <th width="50">No</th>
                                <th>Nama Poli</th>
                                <th>Gedung</th>
                                <th>
                                    <input class="form-check-input" type="checkbox" id="select_all" value="">
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (mysqli_num_rows($sql_poli) > 0) { ?>
                                <?php $i = 1;
                                while ($data = mysqli_fetch_array($sql_poli)) { ?>
                                    <tr>
                                        <td class="text-center"><?= $i ?></td>
                                        <td><?= $data['nama_poli'] ?></td>
                                        <td><?= $data['gedung'] ?></td>
                                        <td class="text-center">
                                            <input class="form-check-input check" type="checkbox" name="checked[]" value="<?= $data['id_poli'] ?>">
                                        </td>
                                    </tr>
                                <?php $i++;
                                } ?>
                            <?php } ?>
                        </tbody>
                    </table>
                </form>
            </div>
            <div class="card-footer mt-3">
                <div class="row">
                    <div class="">
                        <button class="btn btn-warning btn-sm float-end m-1" onclick="edit()"><i class="fas fa-edit"></i> Edit</button>
                        <button class="btn btn-danger btn-sm float-end m-1" onclick="hapus()"><i class="fas fa-trash"></i> Hapus</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#tb-poli').DataTable({
            columnDefs: [{
                "searchable": false,
                "orderable": false,
                "targets": [3]
            }]
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
    })

    // function edit
    function edit() {
        document.proses.action = 'edit.php';
        document.proses.submit();
    }

    // function hapus
    function hapus() {
        var conf = confirm('Apakah anda yakin akan menghapus data ini.?');
        if (conf) {
            document.proses.action = 'del.php';
            document.proses.submit();
        }
    }
</script>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
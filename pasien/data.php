<!-- load header -->
<?php include_once('../_header.php');

// query obat
$sql_obat = mysqli_query($con, "SELECT * FROM tb_obat") or die(mysqli_error($con));
?>


<div class="box">
    <h1 class="mb-4"><i class="fas fa-user-injured"></i> Data Pasien</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Data Pasien</strong>
            <a href="<?= base_url('pasien/add.php') ?>" class="btn btn-outline-secondary btn-sm float-end m-1"><i class="fas fa-plus-circle "></i> Tambah</a>

            <a href="" class="btn btn-outline-warning btn-sm float-end  m-1"><i class="fas fa-redo-alt"></i></a>
        </div>



        <div class="card-body ">
            <div class="table-responsive">

                <table id="tb-pasien" class="table table-striped table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th>No. Identitas</th>
                            <th>Nama Pasien</th>
                            <th>Jenis Kelamin</th>
                            <th>Alamat</th>
                            <th>No. Telepon</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {

            $('#tb-pasien').DataTable({
                "processing": true,
                "serverSide": true,
                "ajax": "data-pasien.php",


                columnDefs: [
                    // {
                    //     "targets": [0],
                    //     "visible": false,
                    //     "searchable": false
                    // },
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": 5,
                        "render": function(data, type, row) {
                            var btn = "<center><a href = \"edit.php?id=" + data + " \" class=\"btn btn-outline-success btn-sm\" title=\"Edit\"><i class=\"fas fa-edit\"></i></a> <a href = \"del.php?id=" + data + "\" onClick=\"return confirm('Apakah anda yakin akan menghapus data ini.?')\" class=\"btn btn-outline-danger btn-sm\" title=\"Hapus\"><i class=\"fas fa-trash\"></i></a ></center>";
                            return btn;
                        }
                    }
                ]

            });
        });
    </script>

</div>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
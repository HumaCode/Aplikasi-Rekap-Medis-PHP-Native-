<!-- load header -->
<?php include_once('../_header.php');

// query obat
$sql_rekammedis = mysqli_query($con, "SELECT * FROM tb_rekammedis 
            INNER JOIN tb_pasien ON tb_rekammedis.id_pasien = tb_pasien.id_pasien
            INNER JOIN tb_dokter ON tb_rekammedis.id_dokter = tb_dokter.id_dokter
            INNER JOIN tb_poliklinik ON tb_rekammedis.id_poli = tb_poliklinik.id_poli
            ") or die(mysqli_error($con));


?>


<div class="box">
    <h1 class="mb-4"><i class="fas fa-book-medical"></i> Data Rekam Medis</h1>
    <div class="card ">
        <div class="card-header bg-info">
            <strong>Data Rekam Medis</strong>
            <a href="<?= base_url('rekam-medis/add.php') ?>" class="btn btn-outline-secondary btn-sm float-end m-1"><i class="fas fa-plus-circle "></i> Tambah</a>

            <a href="" class="btn btn-outline-warning btn-sm float-end  m-1"><i class="fas fa-redo-alt"></i></a>
        </div>



        <div class="card-body ">
            <div class="table-responsive">

                <table id="tb-rm" class="table table-striped table-bordered table-hover">
                    <thead class="table-dark text-center">
                        <tr>
                            <th width="50">No</th>
                            <th>Tanggal Periksa</th>
                            <th>Nama Pasien</th>
                            <th>Keluhan</th>
                            <th>Nama Dokter</th>
                            <th>Poliklinik</th>
                            <th>Obat</th>
                            <th><i class="fas fa-star-of-life"></i></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (mysqli_num_rows($sql_rekammedis) > 0) { ?>
                            <?php $i = 1;
                            while ($data = mysqli_fetch_array($sql_rekammedis)) { ?>
                                <tr>
                                    <td class="text-center"><?= $i ?></td>
                                    <td><?= tgl_indo($data['tgl_periksa']) ?></td>
                                    <td><?= $data['nama_pasien'] ?></td>
                                    <td><?= $data['keluhan'] ?></td>
                                    <td><?= $data['nama_dokter'] ?></td>
                                    <td><?= $data['nama_poli'] ?></td>
                                    <td>
                                        <?php
                                        $sql_obat = mysqli_query($con, "SELECT * FROM tb_rm_obat JOIN tb_obat ON tb_rm_obat.id_obat = tb_obat.id_obat WHERE id_rm = '$data[id_rm]'") or die(mysqli_error($con));

                                        while ($data_obat = mysqli_fetch_array($sql_obat)) { ?>
                                            <ul>
                                                <li><?= $data_obat['nama_obat'] ?> </li>
                                            </ul>
                                        <?php } ?>
                                    </td>
                                    <td class="text-center">

                                        <a href="<?= base_url('rekam-medis/del.php?id=') . $data['id_rm'] ?> " class="btn btn-danger btn-sm mt-2" title="Hapus" onclick="return confirm('Apakah anda yakin akan menghapus data ini.?')"><i class="fas fa-trash"></i></a>
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
            $('#tb-rm').DataTable();
        });
    </script>


</div>

<!-- load footer -->
<?php include_once('../_footer.php'); ?>
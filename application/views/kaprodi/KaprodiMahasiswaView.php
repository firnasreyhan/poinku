<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar Mahasiswa</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>Tahun Aturan</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>NRP</th>
                            <th>Tahun Aturan</th>
                            <th>Prodi</th>
                            <th>Angkatan</th>
                            <th>Nilai</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($mahasiswa as $key) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $key->NRP; ?></td>
                                <td><?php echo $key->TAHUN; ?></td>
                                <td><?php echo $key->PRODI; ?></td>
                                <td><?php echo $key->ANGKATAN; ?></td>
                                <td><?php echo $key->NILAI; ?></td>
                                <td style="text-align:right">
                                    <a href="<?php echo site_url("daftarMahasiswa/detail/" . $key->NRP); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-external-link-alt"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
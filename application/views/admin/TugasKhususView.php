<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Validasi Tugas Khusus</h1>
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Validasi Tugas Khusus</h6>
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
                        foreach ($tugas_khusus as $key) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $key->NRP; ?></td>
                                <td><?php echo $key->TAHUN; ?></td>
                                <td><?php echo $key->PRODI; ?></td>
                                <td><?php echo $key->ANGKATAN; ?></td>
                                <td><?php echo $key->NILAI; ?></td>
                                <td>
                                    <a href="<?php echo site_url("tugaskhusus/detail/" . $key->NRP); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a data-toggle="modal" data-target="#mdlDelete" data-id="<?php echo $key->NRP; ?>" class="btn btn-success btn-icon-split mdlDelete">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check-square"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a data-toggle="modal" data-target="#mdlDelete" data-id="<?php echo $key->NRP; ?>" class="btn btn-danger btn-icon-split mdlDelete">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-window-close"></i>
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

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Tambah User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("user/insert"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="EMAIL" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="NAMA" placeholder="Nama" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="TELEPON" placeholder="Telepon" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="mdlDelete" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Hapus User</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("user/delete"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus user ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="EMAIL" placeholder="Email" id="INPUT_EMAIL">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script>
    $('#dataTable tbody').on('click', '.mdlDelete', function() {
        const id = $(this).data('id')
        $('#INPUT_EMAIL').val(id)
    })
</script>
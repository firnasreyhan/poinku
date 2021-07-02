<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('aturanView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <h1 class="h3 mb-2 text-gray-800">Aturan</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Aturan</h6>
                </div>
                <div class="col-6">
                    <a data-toggle="modal" data-target="#mdlAdd" style="float:right;" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>
                            <th>Kategori</th>
                            <th>Aktif</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($aturans as $key) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $key->TAHUN; ?></td>
                                <td><?php echo $key->KETERANGAN; ?></td>
                                <td><?php if ($key->KATEGORI ==  "0") {
                                        echo "Reguler";
                                    } else {
                                        echo "Profesional";
                                    } ?></td>
                                <td><?php if ($key->AKTIF ==  "0") {
                                        echo "Tidak Aktif";
                                    } else {
                                        echo "Aktif";
                                    } ?></td>
                                <td style="text-align:right">
                                    <a href="<?php echo site_url("aturan/detail/" . $key->ID_ATURAN); ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-external-link-alt"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a href="<?php echo site_url("aturan/detail/" . $key->ID_ATURAN); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a data-toggle="modal" data-target="#mdlAktif" data-aturan="<?php echo $key->ID_ATURAN; ?>" data-kategori="<?php echo $key->KATEGORI; ?>" class="btn btn-success btn-icon-split mdlAktif" <?php if ($key->AKTIF ==  "1") {
                                                                                                                                                                                                                                    echo "hidden";
                                                                                                                                                                                                                                } ?>>
                                        <span class="icon text-white-50">
                                            <i class="fas fa-check-square"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a data-toggle="modal" data-target="#mdlDelete" data-id="<?php echo $key->ID_ATURAN; ?>" class="btn btn-danger btn-icon-split mdlDelete">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
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
                <h5 class="modal-title" id="mdlAdd">Tambah Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("aturan/insert"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="TAHUN" placeholder="Tahun" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="KETERANGAN" placeholder="Keterangan" required>
                    </div>
                    <div class="form-group">
                        <h5>Kategori</h5>
                        <input type="radio" name="KATEGORI" value="0" checked /> Reguler
                        <br />
                        <input type="radio" name="KATEGORI" value="1" /> Profesional
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
                <h5 class="modal-title" id="mdlAdd">Hapus Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("aturan/delete"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_ATURAN" placeholder="Keterangan" id="INPUT_ID_ATURAN">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Aktif -->
<div class="modal fade" id="mdlAktif" tabindex="-1" aria-labelledby="mdlAktif" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAktif">Aktifkan Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("aturan/updateAturanAktif"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_ATURAN" placeholder="Keterangan" id="INPUT_ATURAN">
                    <input type="hidden" class="form-control" name="KATEGORI" placeholder="Keterangan" id="INPUT_ID_KATEGORI">
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
        const id = $(this).data('id');
        $('#INPUT_ID_ATURAN').val(id);
    })

    $('#dataTable tbody').on('click', '.mdlAktif', function() {
        const aturan = $(this).data('aturan');
        const kategori = $(this).data('kategori');

        $('#INPUT_ATURAN').val(aturan);
        $('#INPUT_ID_KATEGORI').val(kategori);
    })
</script>
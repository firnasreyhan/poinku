<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('kriteriaView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('aturan/detail/' . $nilai[0]->ID_ATURAN) ?>"><i class="fas fa-chevron-left"></i></a> Kriteria Penilaian</h1>
    &nbsp;
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kriteria Penilaian</h6>
                </div>
                <div class="col-6">
                    <a href="<?php echo site_url("aturan/poin/kriteria/insert/" . $nilai[0]->ID_NILAI); ?>" style="float:right;" class="btn btn-primary btn-icon-split">
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
                            <th>Jenis Kegiatan</th>
                            <th>Lingkup</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Jenis Kegiatan</th>
                            <th>Lingkup</th>
                            <th>Jumlah</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($kriteria as $key) {
                        ?>
                            <tr>
                                <td><?php echo $no; ?></td>
                                <td><?php echo $key->JENIS; ?></td>
                                <td><?php echo $key->LINGKUP; ?></td>
                                <td><?php echo $key->JUMLAH; ?></td>
                                <td style="text-align:right">
                                    <a href="<?php echo site_url("aturan/nilai/kriteria/update/" . $key->ID_KRITERIA); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a data-toggle="modal" data-target="#mdlDelete" data-id="<?php echo $key->ID_KRITERIA; ?>" class="btn btn-danger btn-icon-split mdlDelete">
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
                <h5 class="modal-title" id="mdlAdd">Tambah Jenis Kegiatan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("jeniskegiatan/insert"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="JENIS" placeholder="Jeis Kegiatan" required>
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
                <h5 class="modal-title" id="mdlAdd">Hapus Kriteria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("kriteria/delete"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_KRITERIA" id="INPUT_ID_KRITERIA">
                    <input type="hidden" class="form-control" name="ID_NILAI" value="<?php echo $kriteria[0]->ID_NILAI ?>">
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
        $('#INPUT_ID_KRITERIA').val(id)
    })
</script>
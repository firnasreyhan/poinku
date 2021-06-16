<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-3">

        </div>
        <div class="col-xl-6 col-md-6 mb-6">
            <?php echo $this->session->tempdata('daftar'); ?>
            <div class="card shadow h-100">
                <div class="card-body">
                    <img src="<?php echo $detail_event[0]->POSTER; ?>" width="100%">
                    &nbsp;
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $detail_event[0]->JUDUL; ?></div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?php echo $detail_event[0]->JENIS; ?>
                            </div>
                            <hr />
                            <div class="row">
                                <div class="col md-4">
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Tanggal
                                    </div>
                                    <div class="text-md text-dark text-uppercase mb-1">
                                        <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo $detail_event[0]->TANGGAL_ACARA; ?>
                                    </div>
                                    <div class="text-md text-dark text-uppercase mb-1">
                                        <i class="fas fa-clock"></i>&nbsp;&nbsp;&nbsp;<?php echo substr($detail_event[0]->JAM_MULAI, 0, 5); ?> - <?php echo substr($detail_event[0]->JAM_SELESAI, 0, 5); ?>
                                    </div>
                                </div>
                                <div class="col md-4">
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Lokasi
                                    </div>
                                    <div class="text-md text-dark text-uppercase mb-1">
                                        <i class="fas fa-map-marker-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo $detail_event[0]->LOKASI; ?>
                                    </div>
                                </div>
                                <div class="col md-4">
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Kuota
                                    </div>
                                    <div class="text-md text-dark text-uppercase mb-1">
                                        <i class="fas fa-users"></i>&nbsp;&nbsp;&nbsp;<?php echo $detail_event[0]->PENDAFTAR; ?> / <?php echo $detail_event[0]->KUOTA; ?>
                                    </div>
                                </div>
                            </div>
                            <hr />
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Deskripsi
                            </div>
                            <div class="text-md text-dark">
                                <?php echo $detail_event[0]->DESKRIPSI; ?>
                            </div>
                            <?php
                            if ($detail_event[0]->PENDAFTAR < $detail_event[0]->KUOTA) {
                            ?>
                                <hr />
                                <a data-toggle="modal" data-target="#mdlAdd" class="btn btn-primary btn-icon-split" style="width: 100%;">
                                    <span class="text">Daftar</span>
                                </a>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">

        </div>
    </div>
</div>
&nbsp;
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Daftar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("daftarUserEksternal"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="EMAIL" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="NAMA" placeholder="Nama Lengkap" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_EVENT" value="<?php echo $detail_event[0]->ID_EVENT; ?>" />
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
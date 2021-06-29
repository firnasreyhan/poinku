                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-6">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('kegiatan') ?>"><i class="fas fa-chevron-left"></i></a> Detail Kegiatan</h1>
                        </div>
                        <div class="col-6">
                            <div style="float:right;">
                                <a data-toggle="modal" data-target="#mdlAcc" data-id="<?php echo $detail_kegiatan[0]->ID_TUGAS_KHUSUS; ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                    <span class="text">Terima</span>
                                </a>
                                &nbsp;
                                <a data-toggle="modal" data-target="#mdlTolak" data-id="<?php echo $detail_kegiatan[0]->ID_TUGAS_KHUSUS; ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-window-close"></i>
                                    </span>
                                    <span class="text">Tolak</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    &nbsp;

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach ($detail_kegiatan as $data) { ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Judul Kegiatan</h4>
                                            <p><?php echo $data->JUDUL ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Jenis Kegiatan</h4>
                                            <p><?php echo $data->JENIS ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Lingkup Kegiatan</h4>
                                            <p><?php echo $data->LINGKUP ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Peran Kegiatan</h4>
                                            <p><?php echo $data->PERAN ?></p>
                                        </div>
                                    </div>

                                    <?php
                                    if ($data->ID_JENIS == '15') {
                                    ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Media Konten</h4>
                                                <p><?php echo $konten[0]->MEDIA_KONTEN ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Jenis Konten</h4>
                                                <p><?php echo $konten[0]->JENIS_KONTEN ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Keterangan</h4>
                                                <p><?php echo $kegiatan[0]->KETERANGAN ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Bukti Kegiatan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12" style="text-align: center;">
                                    <?php 
                                        if (strpos($detail_kegiatan[0]->BUKTI, ".pdf")) {
                                    ?>
                                    <iframe src="<?php echo $detail_kegiatan[0]->BUKTI ?>" width="100%" style="height:750px"></iframe>
                                    <?php        
                                        } else {
                                    ?>
                                    <img style="width: 750px;" class="img-responsive" src="<?php echo $detail_kegiatan[0]->BUKTI ?>">
                                    <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal Acc -->
                <div class="modal fade" id="mdlAcc" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mdlAdd">Terima Kegiatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url("kegiatan/acc"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin mnenerima kegiatan ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" name="ID_TUGAS_KHUSUS" placeholder="Email" id="INPUT_EMAIL" value="<?php echo $detail_kegiatan[0]->ID_TUGAS_KHUSUS; ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Iya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <!-- Modal Tolak -->
                <div class="modal fade" id="mdlTolak" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mdlAdd">Tolak Kegiatan</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url("kegiatan/tolak"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin tolak kegiatan ini?</p>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" name="ID_TUGAS_KHUSUS" placeholder="Email" id="ID" value="<?php echo $detail_kegiatan[0]->ID_TUGAS_KHUSUS; ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Iya</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

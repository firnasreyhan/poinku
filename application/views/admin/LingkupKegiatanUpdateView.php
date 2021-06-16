                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('lingkupkegiatan') ?>"><i class="fas fa-chevron-left"></i></a> Update lingkup kegiatan</h1>
                    &nbsp;

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data lingkup kegiatan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("lingkupkegiatan/update"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Lingkup
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $detail_lingkup_kegiatan[0]->LINGKUP; ?>" type="text" class="form-control" name="LINGKUP" placeholder="Jneis Kegiatan" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $detail_lingkup_kegiatan[0]->ID_LINGKUP; ?>" type="hidden" class="form-control" name="ID_LINGKUP" placeholder="Keterangan" id="INPUT_ID_JENIS">
                                    <a class="btn btn-secondary" href="<?php echo site_url('lingkupkegiatan') ?>">Batal</a>
                                    <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
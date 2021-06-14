                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('perankegiatan') ?>"><i class="fas fa-chevron-left"></i></a> Update peran kegiatan</h1>
                    &nbsp;

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data peran kegiatan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("perankegiatan/update"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input value="<?php echo $detail_peran_kegiatan[0]->PERAN; ?>" type="text" class="form-control" name="PERAN" placeholder="Peran Kegiatan" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $detail_peran_kegiatan[0]->ID_PERAN; ?>" type="hidden" class="form-control" name="ID_PERAN" placeholder="Keterangan" id="INPUT_ID_PERAN">
                                    <a class="btn btn-secondary" href="<?php echo site_url('perankegiatan') ?>">Batal</a>
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
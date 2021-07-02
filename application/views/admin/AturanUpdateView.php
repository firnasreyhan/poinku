                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('aturan') ?>"><i class="fas fa-chevron-left"></i></a> Update Aturan</h1>
                    &nbsp;

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Aturan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("aturan/update"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="TAHUN" placeholder="Tahun" value="<?php echo $detail_aturan[0]->TAHUN; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="KETERANGAN" placeholder="Keterangan" value="<?php echo $detail_aturan[0]->KETERANGAN; ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <h5>Kategori</h5>
                                        <input type="radio" name="KATEGORI" value="0" <?php if ($detail_aturan[0]->KATEGORI == 0) {
                                            echo "checked";
                                        } ?> /> Reguler
                                        <br />
                                        <input type="radio" name="KATEGORI" value="1" <?php if ($detail_aturan[0]->KATEGORI == 1) {
                                            echo "checked";
                                        } ?>/> Profesional
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $detail_aturan[0]->ID_ATURAN; ?>" type="hidden" class="form-control" name="ID_ATURAN">
                                    <a class="btn btn-secondary" href="<?php echo site_url('aturan') ?>">Batal</a>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
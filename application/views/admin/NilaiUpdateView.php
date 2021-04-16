                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
                        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("nilai/update"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <input value="<?php echo $detail_nilai[0]->NILAI; ?>" type="text" class="form-control" name="NILAI" placeholder="Jneis Kegiatan" required>
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $detail_nilai[0]->POIN_MINIMAL; ?>" type="text" class="form-control" name="POIN_MINIMAL" placeholder="Jneis Kegiatan" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $detail_nilai[0]->ID_NILAI; ?>" type="hidden" class="form-control" name="ID_NILAI">
                                    <input value="<?php echo $detail_nilai[0]->ID_ATURAN; ?>" type="hidden" class="form-control" name="ID_ATURAN">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
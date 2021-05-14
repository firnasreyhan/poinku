                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('aturan/nilai/kriteria/'.$detail_kriteria[0]->ID_NILAI)?>"><i class="fas fa-chevron-left"></i></a> Update Kriteria</h1>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data kriteria</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("kriteria/update"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select name="ID_JENIS" class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                            foreach ($jenis as $key) {
                                            ?>
                                                <option value="<?php echo $key->ID_JENIS ?>" <?php if($key->ID_JENIS == $detail_kriteria[0]->ID_JENIS) {echo 'selected';} ?>><?php echo $key->JENIS; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="ID_LINGKUP" class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                            foreach ($lingkup as $key) {
                                            ?>
                                                <option value="<?php echo $key->ID_LINGKUP ?>" <?php if($key->ID_LINGKUP == $detail_kriteria[0]->ID_LINGKUP) {echo 'selected';} ?>><?php echo $key->LINGKUP; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $detail_kriteria[0]->JUMLAH; ?>" type="number" class="form-control" name="JUMLAH" placeholder="Jumlah" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $detail_kriteria[0]->ID_KRITERIA; ?>" type="hidden" class="form-control" name="ID_KRITERIA">
                                    <input value="<?php echo $detail_kriteria[0]->ID_NILAI; ?>" type="hidden" class="form-control" name="ID_NILAI">
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
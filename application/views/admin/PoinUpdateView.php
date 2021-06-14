                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('aturan/detail/' . $detail_poin[0]->ID_ATURAN) ?>"><i class="fas fa-chevron-left"></i></a> Update Poin</h1>
                    &nbsp;

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data update poin</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("poin/update"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <select name="ID_JENIS" class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                            foreach ($jenis as $key) {
                                            ?>
                                                <option value="<?php echo $key->ID_JENIS ?>" <?php if ($key->ID_JENIS == $detail_poin[0]->ID_JENIS) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $key->JENIS; ?></option>
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
                                                <option value="<?php echo $key->ID_LINGKUP ?>" <?php if ($key->ID_LINGKUP == $detail_poin[0]->ID_LINGKUP) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $key->LINGKUP; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <select name="ID_PERAN" class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                            foreach ($peran as $key) {
                                            ?>
                                                <option value="<?php echo $key->ID_PERAN ?>" <?php if ($key->ID_PERAN == $detail_poin[0]->ID_PERAN) {
                                                                                                    echo 'selected';
                                                                                                } ?>><?php echo $key->PERAN; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $detail_poin[0]->POIN; ?>" type="number" class="form-control" name="POIN" placeholder="Poin" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $detail_poin[0]->ID_POIN; ?>" type="hidden" class="form-control" name="ID_POIN">
                                    <input value="<?php echo $detail_poin[0]->ID_ATURAN; ?>" type="hidden" class="form-control" name="ID_ATURAN">
                                    <a class="btn btn-secondary" href="<?php echo site_url('aturan/detail/' . $detail_poin[0]->ID_ATURAN) ?>">Batal</a>
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
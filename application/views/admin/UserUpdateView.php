                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('user') ?>"><i class="fas fa-chevron-left"></i></a> Update User</h1>
                    &nbsp;

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Update User</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("user/update"); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Email
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $user[0]->EMAIL; ?>" type="text" class="form-control" disabled>
                                    </div>
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Nama
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $user[0]->NAMA; ?>" type="text" class="form-control" name="NAMA" disabled>
                                    </div>
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Telepon
                                    </div>
                                    <div class="form-group">
                                        <input value="<?php echo $user[0]->TELEPON; ?>" type="text" class="form-control" name="TELEPON" disabled>
                                    </div>
                                    <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                        Role
                                    </div>
                                    <div class="form-group">
                                        <select name="ID_ROLE" class="form-control" id="exampleFormControlSelect1">
                                            <?php
                                            foreach ($role as $key) {
                                            ?>
                                                <option value="<?php echo $key->ID_ROLE ?>" <?php if ($key->ID_ROLE == $user[0]->ID_ROLE) {
                                                                                                echo 'selected';
                                                                                            } ?>><?php echo $key->ROLE; ?></option>
                                            <?php
                                            }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input value="<?php echo $user[0]->EMAIL; ?>" type="hidden" class="form-control" name="EMAIL">
                                    <a class="btn btn-secondary" href="<?php echo site_url('user') ?>">Batal</a>
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
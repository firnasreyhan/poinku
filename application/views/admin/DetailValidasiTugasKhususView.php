                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('tugaskhusus') ?>"><i class="fas fa-chevron-left"></i></a> Detail Tugas Khusus</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Tugas Khusus</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Nama</h4>
                                            <p>Nama</p>
                                        </div>
                                        <div class="form-group">
                                            <h4>NRP</h4>
                                            <p><?php echo $mahasiswa[0]->NRP ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Email</h4>
                                            <p><?php echo $mahasiswa[0]->EMAIL ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Program Studi</h4>
                                            <p><?php echo $mahasiswa[0]->PRODI ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Angkatan</h4>
                                            <p><?php echo $mahasiswa[0]->ANGKATAN ?></p>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Tahun Aturan Digunakan</h4>
                                            <p><?php echo $mahasiswa[0]->TAHUN ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Keterangan Aturan</h4>
                                            <p><?php echo $mahasiswa[0]->KETERANGAN ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Nilai</h4>
                                            <p><?php echo $mahasiswa[0]->NILAI ?></p>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
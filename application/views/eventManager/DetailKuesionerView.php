                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url("daftarEvent/detail/" . $kuesioner[0]->ID_EVENT); ?>"><i class="fas fa-chevron-left"></i></a> Detail Kuesioner</h1>
                    &nbsp;
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Detail Kuesioner</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Bagaimana tanggapan Anda tentang materi pada kegiatan ini?
                            </div>
                            <label class="form-check-label">
                                <?php
                                if ($kuesioner[0]->JAWAB_1 == 5) {
                                    echo '- Sangat menarik';
                                } elseif ($kuesioner[0]->JAWAB_1 == 4) {
                                    echo '- Manarik';
                                } elseif ($kuesioner[0]->JAWAB_1 == 3) {
                                    echo '- Biasa';
                                } elseif ($kuesioner[0]->JAWAB_1 == 2) {
                                    echo '- Kurang menarik';
                                } elseif ($kuesioner[0]->JAWAB_1 == 1) {
                                    echo '- Sangat kurang menarik';
                                }
                                ?>
                            </label>
                            <br />
                            <br />
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Bagaimana tanggapan Anda tentang pemateri?
                            </div>
                            <label class="form-check-label">
                                <?php
                                if ($kuesioner[0]->JAWAB_2 == 5) {
                                    echo '- Sangat Baik';
                                } elseif ($kuesioner[0]->JAWAB_2 == 4) {
                                    echo '- Baik';
                                } elseif ($kuesioner[0]->JAWAB_2 == 3) {
                                    echo '- Cukup';
                                } elseif ($kuesioner[0]->JAWAB_2 == 2) {
                                    echo '- Kurang';
                                } elseif ($kuesioner[0]->JAWAB_2 == 1) {
                                    echo '- Sangat Kurang';
                                }
                                ?>
                            </label>
                            <br />
                            <br />
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Menurut Anda apakah kegiatan ini bermanfaat?
                            </div>
                            <label class="form-check-label">
                                <?php
                                if ($kuesioner[0]->JAWAB_3 == 3) {
                                    echo '- Iya';
                                } elseif ($kuesioner[0]->JAWAB_3 == 2) {
                                    echo '- Mungkin';
                                } elseif ($kuesioner[0]->JAWAB_3 == 1) {
                                    echo '- Tidak';
                                }
                                ?>
                            </label>
                            <br />
                            <br />
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Apakah dengan mengikuti kegiatan ini dapat menambah wawasan Anda?
                            </div>
                            <label class="form-check-label">
                                <?php
                                if ($kuesioner[0]->JAWAB_4 == 3) {
                                    echo '- Iya';
                                } elseif ($kuesioner[0]->JAWAB_4 == 2) {
                                    echo '- Mungkin';
                                } elseif ($kuesioner[0]->JAWAB_4 == 1) {
                                    echo '- Tidak';
                                }
                                ?>
                            </label>
                            <br />
                            <br />
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Bagaimana tanggapan Anda terkait pelaksanaan kegiatan ini?
                            </div>
                            <label class="form-check-label">
                                <?php
                                if ($kuesioner[0]->JAWAB_5 == 5) {
                                    echo '- Sangat Baik';
                                } elseif ($kuesioner[0]->JAWAB_5 == 4) {
                                    echo '- Baik';
                                } elseif ($kuesioner[0]->JAWAB_5 == 3) {
                                    echo '- Cukup';
                                } elseif ($kuesioner[0]->JAWAB_5 == 2) {
                                    echo '- Kurang';
                                } elseif ($kuesioner[0]->JAWAB_5 == 1) {
                                    echo '- Sangat Kurang';
                                }
                                ?>
                            </label>
                            <br />
                            <br />
                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                Saran
                            </div>
                            <div class="form-group">
                                <textarea class="form-control" name="SARAN" placeholder="Saran" disabled><?php echo $kuesioner[0]->SARAN;?></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
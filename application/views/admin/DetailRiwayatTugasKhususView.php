                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-6">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('riwayatTugasKhusus') ?>"><i class="fas fa-chevron-left"></i></a> Detail Mahasiswa</h1>
                        </div>
                    </div>
                    &nbsp;
                    <!-- DataTales Example -->
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <h6 class="m-0 font-weight-bold text-primary">Data Mahasiswa</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Nama</h4>
                                                <p><?php echo $mahasiswa[0]->NAMA ?></p>
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
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Angkatan</h4>
                                                <p><?php echo $mahasiswa[0]->ANGKATAN ?></p>
                                            </div>
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
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Kegiatan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartKegiatan" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kegiatan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Lingkup</th>
                                            <th>Peran</th>
                                            <th>Judul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Jenis</th>
                                            <th>Lingkup</th>
                                            <th>Peran</th>
                                            <th>Judul</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($tugas_khusus as $key) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $key->JENIS; ?></td>
                                                <td><?php echo $key->LINGKUP; ?></td>
                                                <td><?php echo $key->PERAN; ?></td>
                                                <td><?php echo $key->JUDUL; ?></td>
                                                <td style="text-align:right">
                                                    <a href="<?php echo site_url("riwayatTugasKhusus/kegiatan/" . $key->ID_TUGAS_KHUSUS); ?>" class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </span>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
                <script>
                    var ctx = document.getElementById('chartKegiatan').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($jumlah_kegiatan as $key) {
                                    echo "'" . $key->JENIS . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($jumlah_kegiatan as $key) {
                                        echo $key->TOTAL . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    '#f34235',
                                    '#3e50b4',
                                    '#4bae4f',
                                    '#fe9700',
                                    '#e81d62',
                                    '#785447',
                                    '#9d9d9d',
                                    '#feea3a',
                                    '#00bbd3',
                                    '#9b26af',
                                    '#009587',
                                    '#5f7c8a',
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

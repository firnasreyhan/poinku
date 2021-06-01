                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="row">
                        <div class="col-6">
                            <!-- Page Heading -->
                            <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('tugaskhusus') ?>"><i class="fas fa-chevron-left"></i></a> Detail Tugas Khusus</h1>
                        </div>
                        <div class="col-6">
                            <div style="float:right;">
                                <a data-toggle="modal" data-target="#mdlAcc" data-id="<?php echo $mahasiswa[0]->NRP; ?>" class="btn btn-success btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-check-square"></i>
                                    </span>
                                    <span class="text">Terima</span>
                                </a>
                                &nbsp;
                                <a data-toggle="modal" data-target="#mdlTolak" data-id="<?php echo $mahasiswa[0]->NRP; ?>" class="btn btn-danger btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-window-close"></i>
                                    </span>
                                    <span class="text">Tolak</span>
                                </a>
                            </div>
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
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                                            <div class="dropdown-header">Dropdown Header:</div>
                                            <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a>
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="#">Something else here</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-pie pt-4 pb-2"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                                        <canvas id="myPieChart" style="display: block; width: 301px; height: 245px;" width="301" height="245" class="chartjs-render-monitor"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-primary"></i> Direct
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Social
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-info"></i> Referral
                                        </span>
                                    </div>
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
                                                    <a href="<?php echo site_url("tugaskhusus/kegiatan/" . $key->ID_TUGAS_KHUSUS); ?>" class="btn btn-warning btn-icon-split">
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

                <!-- Modal Acc -->
<div class="modal fade" id="mdlAcc" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Terima Tugas Khusus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("tugaskhusus/acc"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin menerima tugas khusus ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="NRP" placeholder="Email" value="<?php echo $mahasiswa[0]->NRP; ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Tolak -->
<div class="modal fade" id="mdlTolak" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Tolak Tugas Khusus</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("tugaskhusus/tolak"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin tolak tugas khusus ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="NRP" placeholder="Email" value="<?php echo $mahasiswa[0]->NRP; ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php
                    // if ($this->session->flashdata('message')) {
                    echo $this->session->tempdata('message');
                    // }
                    // $this->session->sess_destroy(); 
                    ?>
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('daftarEvent') ?>"><i class="fas fa-chevron-left"></i></a> Detail Daftar Event</h1>
                    &nbsp;
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Event</h6>
                                </div>
                                <div class="col-6">
                                    <!-- <a title="Hapus Event" data-toggle="modal" data-target="#mdlDelete" data-id="<?php echo $data->ID_EVENT ?>" class="btn btn-danger btn-icon-split mdlDelete">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a> -->
                                    <a data-toggle="modal" data-target="#mdlSertifikat" style="float:right;" class="btn btn-primary btn-icon-split mdlSertifikat">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-paper-plane"></i>
                                        </span>
                                        <span class="text">Kirim Sertifikat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach ($detail_event as $data) { ?>
                                <div class="modal-body">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4>Jenis Event</h4>
                                                <p><?php echo $data->JENIS ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Lingkup Event</h4>
                                                <p><?php echo $data->LINGKUP ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Judul Event</h4>
                                                <p><?php echo $data->JUDUL ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Deskripsi</h4>
                                                <p><?php echo $data->DESKRIPSI ?></p>
                                            </div>

                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4>Pembicara</h4>
                                                <p><?php echo $data->PEMBICARA ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Lokasi</h4>
                                                <p><?php echo $data->LOKASI ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Tanggal Acara</h4>
                                                <p><?php echo $data->TANGGAL_ACARA ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Jam Mulai</h4>
                                                <p><?php echo $data->JAM_MULAI ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Jam Selesai</h4>
                                                <p><?php echo $data->JAM_SELESAI ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Kuota</h4>
                                                <p><?php echo $data->KUOTA ?></p>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <h4>Poster</h4>
                                                <img src="<?php echo $data->POSTER ?>" width="300">
                                            </div>
                                            <div class="form-group">
                                                <h4>QR Code Absen</h4>
                                                <img src="<?php echo $data->QR_CODE ?>" width="300">
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                                </div>
                        </div>

                    </div>

                    <div class="row">
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Kehadiran</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartKehadiran" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Peserta</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartPeserta" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Program Studi</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartProdi" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Angkatan</h6>\
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartAngkatan" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Materi Kegiatan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartMateri" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pemateri</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartPemateri" height="214px"></canvas>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Bermanfaat</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartBermanfaat" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Menambah Wawasan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartMenambahWawasan" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Pelaksanaan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartPelaksanaan" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Daftar Peserta</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>NAMA</th>
                                            <th>Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>NAMA</th>
                                            <th>Kehadiran</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($presensi as $key) {
                                        ?>
                                            <tr>
                                                <td><?php echo $no; ?></td>
                                                <td><?php echo $key->EMAIL; ?></td>
                                                <td><?php echo $key->NAMA; ?></td>
                                                <td><?php if ($key->STATUS == "0") {
                                                        echo "<span class='badge badge-pill badge-danger'>Tidak Hadir</span>";
                                                    } else {
                                                        echo "<span class='badge badge-pill badge-success'>Hadir</span>";
                                                    } ?></td>
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
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Modal Add -->
                <div class="modal fade" id="mdlSertifikat" tabindex="-1" aria-labelledby="mdlSertifikat" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mdlSertifikat">Upload Template Sertifikat</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="<?php echo site_url('daftarEvent/print/' . $detail_event[0]->ID_EVENT); ?>" enctype="multipart/form-data" method="post">
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Template Sertifikat</label>
                                        <input type="file" class="form-control" name="TEMPLATE_SERTIFIKAT" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" class="form-control" name="ID_EVENT" value="<?php echo $detail_event[0]->ID_EVENT; ?>">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream

                <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

=======

                <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

>>>>>>> Stashed changes
=======

                <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

>>>>>>> Stashed changes
=======

                <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

>>>>>>> Stashed changes
                <script>
                    var ctx = document.getElementById('chartKehadiran').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($kehadiran as $key) {
                                    if ($key->STATUS == 1) {
                                        echo "'Hadir',";
                                    } else {
                                        echo "'Tidak Hadir',";
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($kehadiran as $key) {
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
                                    foreach ($kehadiran as $key) {
                                        if ($key->STATUS == 1) {
                                            echo "'#1cc88a',";
                                        } else {
                                            echo "'#e74a3b',";
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
<<<<<<< Updated upstream
                     }    
                ?>
             ],
            datasets: [{
                data: [
                    <?php 
                        foreach ($kehadiran as $key) {
                            echo $key->JUMLAH.',';
                        }    
                    ?>
                ],
                backgroundColor: [
                    '#1cc88a',
                    '#e74a3b',
                ],
                hoverOffset: 4
            }]
        }
    });
</script>
=======
=======
=======
=======
                    });
                </script>

                <script>
                    var ctx = document.getElementById('chartPeserta').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($peserta as $key) {
                                    if ($key->IS_EKSTERNAL == 1) {
                                        echo "'Eksternal',";
                                    } else {
                                        echo "'Internal',";
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($peserta as $key) {
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
                                    foreach ($peserta as $key) {
                                        if ($key->IS_EKSTERNAL == 1) {
                                            echo "'#5f7c8a',";
                                        } else {
                                            echo "'#3e50b4',";
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
                    var ctx = document.getElementById('chartProdi').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($prodi as $key) {
                                    echo "'" . $key->PRODI . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($prodi as $key) {
                                        echo $key->JUMLAH . ',';
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

                <script>
                    var ctx = document.getElementById('chartAngkatan').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($angkatan as $key) {
                                    echo "'" . $key->ANGKATAN . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($angkatan as $key) {
                                        echo $key->JUMLAH . ',';
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
>>>>>>> Stashed changes
                    });
                </script>

                <script>
<<<<<<< Updated upstream
                    var ctx = document.getElementById('chartPeserta').getContext('2d');
=======
                    var ctx = document.getElementById('chartMateri').getContext('2d');
>>>>>>> Stashed changes
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
<<<<<<< Updated upstream
                                foreach ($peserta as $key) {
                                    if ($key->IS_EKSTERNAL == 1) {
                                        echo "'Eksternal',";
                                    } else {
                                        echo "'Internal',";
=======
                                foreach ($materi as $key) {
                                    if ($key->JAWAB_1 == 5) {
                                        echo "'Sangat Menarik',";
                                    } else if ($key->JAWAB_1 == 4) {
                                        echo "'Manarik',";
                                    } else if ($key->JAWAB_1 == 3) {
                                        echo "'Biasa',";
                                    } else if ($key->JAWAB_1 == 2) {
                                        echo "'Kurang Menarik',";
                                    } else if ($key->JAWAB_1 == 1) {
                                        echo "'Sangat Kurang Menarik',";
>>>>>>> Stashed changes
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
<<<<<<< Updated upstream
                                    foreach ($peserta as $key) {
=======
                                    foreach ($materi as $key) {
>>>>>>> Stashed changes
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
<<<<<<< Updated upstream
                                    foreach ($peserta as $key) {
                                        if ($key->IS_EKSTERNAL == 1) {
                                            echo "'#5f7c8a',";
                                        } else {
                                            echo "'#3e50b4',";
=======
                                    foreach ($materi as $key) {
                                        if ($key->JAWAB_1 == 5) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_1 == 4) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_1 == 3) {
                                            echo "'#9b26af',";
                                        } else if ($key->JAWAB_1 == 2) {
                                            echo "'#009587',";
                                        } else if ($key->JAWAB_1 == 1) {
                                            echo "'#5f7c8a',";
>>>>>>> Stashed changes
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
<<<<<<< Updated upstream
                    var ctx = document.getElementById('chartProdi').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($prodi as $key) {
                                    echo "'" . $key->PRODI . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($prodi as $key) {
                                        echo $key->JUMLAH . ',';
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

                <script>
                    var ctx = document.getElementById('chartAngkatan').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($angkatan as $key) {
                                    echo "'" . $key->ANGKATAN . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($angkatan as $key) {
                                        echo $key->JUMLAH . ',';
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
>>>>>>> Stashed changes
                    });
                </script>

                <script>
<<<<<<< Updated upstream
                    var ctx = document.getElementById('chartPeserta').getContext('2d');
=======
                    var ctx = document.getElementById('chartMateri').getContext('2d');
>>>>>>> Stashed changes
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
<<<<<<< Updated upstream
                                foreach ($peserta as $key) {
                                    if ($key->IS_EKSTERNAL == 1) {
                                        echo "'Eksternal',";
                                    } else {
                                        echo "'Internal',";
=======
                                foreach ($materi as $key) {
                                    if ($key->JAWAB_1 == 5) {
                                        echo "'Sangat Menarik',";
                                    } else if ($key->JAWAB_1 == 4) {
                                        echo "'Manarik',";
                                    } else if ($key->JAWAB_1 == 3) {
                                        echo "'Biasa',";
                                    } else if ($key->JAWAB_1 == 2) {
                                        echo "'Kurang Menarik',";
                                    } else if ($key->JAWAB_1 == 1) {
                                        echo "'Sangat Kurang Menarik',";
>>>>>>> Stashed changes
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
<<<<<<< Updated upstream
                                    foreach ($peserta as $key) {
=======
                                    foreach ($materi as $key) {
>>>>>>> Stashed changes
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
<<<<<<< Updated upstream
                                    foreach ($peserta as $key) {
                                        if ($key->IS_EKSTERNAL == 1) {
                                            echo "'#5f7c8a',";
                                        } else {
                                            echo "'#3e50b4',";
=======
                                    foreach ($materi as $key) {
                                        if ($key->JAWAB_1 == 5) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_1 == 4) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_1 == 3) {
                                            echo "'#9b26af',";
                                        } else if ($key->JAWAB_1 == 2) {
                                            echo "'#009587',";
                                        } else if ($key->JAWAB_1 == 1) {
                                            echo "'#5f7c8a',";
>>>>>>> Stashed changes
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
<<<<<<< Updated upstream
                    var ctx = document.getElementById('chartProdi').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($prodi as $key) {
                                    echo "'" . $key->PRODI . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($prodi as $key) {
                                        echo $key->JUMLAH . ',';
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

                <script>
                    var ctx = document.getElementById('chartAngkatan').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($angkatan as $key) {
                                    echo "'" . $key->ANGKATAN . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($angkatan as $key) {
                                        echo $key->JUMLAH . ',';
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
>>>>>>> Stashed changes
                    });
                </script>

                <script>
<<<<<<< Updated upstream
                    var ctx = document.getElementById('chartPeserta').getContext('2d');
=======
                    var ctx = document.getElementById('chartMateri').getContext('2d');
>>>>>>> Stashed changes
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
<<<<<<< Updated upstream
                                foreach ($peserta as $key) {
                                    if ($key->IS_EKSTERNAL == 1) {
                                        echo "'Eksternal',";
                                    } else {
                                        echo "'Internal',";
=======
                                foreach ($materi as $key) {
                                    if ($key->JAWAB_1 == 5) {
                                        echo "'Sangat Menarik',";
                                    } else if ($key->JAWAB_1 == 4) {
                                        echo "'Manarik',";
                                    } else if ($key->JAWAB_1 == 3) {
                                        echo "'Biasa',";
                                    } else if ($key->JAWAB_1 == 2) {
                                        echo "'Kurang Menarik',";
                                    } else if ($key->JAWAB_1 == 1) {
                                        echo "'Sangat Kurang Menarik',";
>>>>>>> Stashed changes
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
<<<<<<< Updated upstream
                                    foreach ($peserta as $key) {
=======
                                    foreach ($materi as $key) {
>>>>>>> Stashed changes
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
<<<<<<< Updated upstream
                                    foreach ($peserta as $key) {
                                        if ($key->IS_EKSTERNAL == 1) {
                                            echo "'#5f7c8a',";
                                        } else {
                                            echo "'#3e50b4',";
=======
                                    foreach ($materi as $key) {
                                        if ($key->JAWAB_1 == 5) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_1 == 4) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_1 == 3) {
                                            echo "'#9b26af',";
                                        } else if ($key->JAWAB_1 == 2) {
                                            echo "'#009587',";
                                        } else if ($key->JAWAB_1 == 1) {
                                            echo "'#5f7c8a',";
>>>>>>> Stashed changes
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
<<<<<<< Updated upstream
                    var ctx = document.getElementById('chartProdi').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($prodi as $key) {
                                    echo "'" . $key->PRODI . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($prodi as $key) {
                                        echo $key->JUMLAH . ',';
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

                <script>
                    var ctx = document.getElementById('chartAngkatan').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($angkatan as $key) {
                                    echo "'" . $key->ANGKATAN . "',";
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($angkatan as $key) {
                                        echo $key->JUMLAH . ',';
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
>>>>>>> Stashed changes

                <script>
                    var ctx = document.getElementById('chartMateri').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($materi as $key) {
                                    if ($key->JAWAB_1 == 5) {
                                        echo "'Sangat Menarik',";
                                    } else if ($key->JAWAB_1 == 4) {
                                        echo "'Manarik',";
                                    } else if ($key->JAWAB_1 == 3) {
                                        echo "'Biasa',";
                                    } else if ($key->JAWAB_1 == 2) {
                                        echo "'Kurang Menarik',";
                                    } else if ($key->JAWAB_1 == 1) {
                                        echo "'Sangat Kurang Menarik',";
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($materi as $key) {
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
                                    foreach ($materi as $key) {
                                        if ($key->JAWAB_1 == 5) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_1 == 4) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_1 == 3) {
                                            echo "'#9b26af',";
                                        } else if ($key->JAWAB_1 == 2) {
                                            echo "'#009587',";
                                        } else if ($key->JAWAB_1 == 1) {
                                            echo "'#5f7c8a',";
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
=======
>>>>>>> Stashed changes
                    var ctx = document.getElementById('chartPemateri').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($pemateri as $key) {
                                    if ($key->JAWAB_2 == 5) {
                                        echo "'Sangat Baik',";
                                    } else if ($key->JAWAB_2 == 4) {
                                        echo "'Baik',";
                                    } else if ($key->JAWAB_2 == 3) {
                                        echo "'Cukup',";
                                    } else if ($key->JAWAB_2 == 2) {
                                        echo "'Kurang',";
                                    } else if ($key->JAWAB_2 == 1) {
                                        echo "'Sangat Kurang',";
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($pemateri as $key) {
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
                                    foreach ($pemateri as $key) {
                                        if ($key->JAWAB_2 == 5) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_2 == 4) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_2 == 3) {
                                            echo "'#9b26af',";
                                        } else if ($key->JAWAB_2 == 2) {
                                            echo "'#009587',";
                                        } else if ($key->JAWAB_2 == 1) {
                                            echo "'#5f7c8a',";
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
                    var ctx = document.getElementById('chartBermanfaat').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($bermanfaat as $key) {
                                    if ($key->JAWAB_3 == 3) {
                                        echo "'Iya',";
                                    } else if ($key->JAWAB_3 == 2) {
                                        echo "'Mungkin',";
                                    } else if ($key->JAWAB_3 == 1) {
                                        echo "'Tidak',";
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($bermanfaat as $key) {
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
                                    foreach ($bermanfaat as $key) {
                                        if ($key->JAWAB_3 == 3) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_3 == 2) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_3 == 1) {
                                            echo "'#9b26af',";
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
                    var ctx = document.getElementById('chartMenambahWawasan').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($menambah_wawasan as $key) {
                                    if ($key->JAWAB_4 == 3) {
                                        echo "'Iya',";
                                    } else if ($key->JAWAB_4 == 2) {
                                        echo "'Mungkin',";
                                    } else if ($key->JAWAB_4 == 1) {
                                        echo "'Tidak',";
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($menambah_wawasan as $key) {
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
                                    foreach ($menambah_wawasan as $key) {
                                        if ($key->JAWAB_4 == 3) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_4 == 2) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_4 == 1) {
                                            echo "'#9b26af',";
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>

                <script>
                    var ctx = document.getElementById('chartPelaksanaan').getContext('2d');
                    var myChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                            labels: [
                                <?php
                                foreach ($pelaksanaan as $key) {
                                    if ($key->JAWAB_5 == 5) {
                                        echo "'Sangat Baik',";
                                    } else if ($key->JAWAB_5 == 4) {
                                        echo "'Baik',";
                                    } else if ($key->JAWAB_5 == 3) {
                                        echo "'Cukup',";
                                    } else if ($key->JAWAB_5 == 2) {
                                        echo "'Kurang',";
                                    } else if ($key->JAWAB_5 == 1) {
                                        echo "'Sangat Kurang',";
                                    }
                                }
                                ?>
                            ],
                            datasets: [{
                                data: [
                                    <?php
                                    foreach ($pelaksanaan as $key) {
                                        echo $key->JUMLAH . ',';
                                    }
                                    ?>
                                ],
                                backgroundColor: [
                                    <?php
                                    foreach ($pelaksanaan as $key) {
                                        if ($key->JAWAB_5 == 5) {
                                            echo "'#feea3a',";
                                        } else if ($key->JAWAB_5 == 4) {
                                            echo "'#00bbd3',";
                                        } else if ($key->JAWAB_5 == 3) {
                                            echo "'#9b26af',";
                                        } else if ($key->JAWAB_5 == 2) {
                                            echo "'#009587',";
                                        } else if ($key->JAWAB_5 == 1) {
                                            echo "'#5f7c8a',";
                                        }
                                    }
                                    ?>
                                ],
                                hoverOffset: 4
                            }]
                        }
                    });
                </script>
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
                                    <a data-target="#mdlAdd" style="float:right;" class="btn btn-primary btn-icon-split" href="<?php echo site_url('daftarEvent/print/' . $detail_event[0]->ID_EVENT) ?>">
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
                                        <div class="col-md-6">
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
                                            <div class="form-group">
                                                <h4>Poster</h4>
                                                <img src="<?php echo $data->POSTER ?>" width="300">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
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
                        <div class="col-xl-4 col-lg-5">
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
                        <div class="col-xl-4 col-lg-5">
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
                        <div class="col-xl-4 col-lg-5">
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
                                            <th>NRP</th>
                                            <th>Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>No</th>
                                            <th>Email</th>
                                            <th>NRP</th>
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
                                                <td><?php echo $key->NRP; ?></td>
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

<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

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

<script>
   var ctx = document.getElementById('chartProdi').getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'doughnut',
       data: {
           labels: [
                <?php 
                   foreach ($prodi as $key) {
                       echo "'".$key->PRODI."',";
                   }    
                ?>
            ],
           datasets: [{
               data: [
                   <?php 
                        foreach ($prodi as $key) {
                            echo $key->JUMLAH.',';
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
                       echo "'".$key->ANGKATAN."',";
                   }    
                ?>
            ],
           datasets: [{
               data: [
                   <?php 
                        foreach ($angkatan as $key) {
                            echo $key->JUMLAH.',';
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
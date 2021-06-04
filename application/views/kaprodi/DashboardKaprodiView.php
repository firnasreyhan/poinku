<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Kaprodi</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

            <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-3">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Mahasiswa Terdaftar</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_mahasiswa; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-3">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                        Jumlah Pengajuan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_pengajuan; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-3">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Jumlah Pengajuan Diteriam</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_diterima; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-3 col-md-6 mb-3">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Jumlah Jumlah Pengajuan Ditolak</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_ditolak; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
                    <div class="row">
                        <!-- Pie Chart -->
                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Angkatan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartAngkatan" height="214px"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Aturan</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartAturan" height="214px"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-5">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Nilai</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartNilai" height="214px"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>
<script>
   var ctx = document.getElementById('chartAngkatan').getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'doughnut',
       data: {
           labels: [
                <?php 
                   foreach ($jumlah_angkatan as $key) {
                       echo "'".$key->ANGKATAN."',";
                   }    
                ?>
            ],
           datasets: [{
               data: [
                   <?php 
                        foreach ($jumlah_angkatan as $key) {
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
   var ctx = document.getElementById('chartAturan').getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'doughnut',
       data: {
           labels: [
                <?php 
                   foreach ($jumlah_aturan as $key) {
                       if ($key->KATEGORI == 0) {
                        echo "'".$key->TAHUN." - Reguler',";
                       } else {
                        echo "'".$key->TAHUN." - Profesional',";
                       }
                   }    
                ?>
            ],
           datasets: [{
               data: [
                   <?php 
                        foreach ($jumlah_aturan as $key) {
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
   var ctx = document.getElementById('chartNilai').getContext('2d');
   var myChart = new Chart(ctx, {
       type: 'doughnut',
       data: {
           labels: [
                <?php 
                    foreach ($jumlah_nilai as $key) {
                        echo "'".$key->NILAI."',";
                    }  
                ?>
            ],
           datasets: [{
               data: [
                   <?php 
                        foreach ($jumlah_nilai as $key) {
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
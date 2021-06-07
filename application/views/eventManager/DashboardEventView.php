<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Dashboard Event Manager</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

            <div class="row">

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Jumlah Kegiatan</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_kegiatan; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Jumlah Kehadiran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_hadir; ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Earnings (Monthly) Card Example -->
<div class="col-xl-4 col-md-6 mb-4">
    <div class="card border-left-danger shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                        Jumlah Kehadiran</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $jumlah_tidak_hadir; ?></div>
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
                        <!-- Area Chart -->
                        <div class="col-xl-8 col-lg-7">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Statistik Kehadiran</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <canvas id="chartHadir" height="100px"></canvas>
                                </div>
                            </div>
                        </div>

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
                    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>
<script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

<script>
    var ctx = document.getElementById('chartHadir').getContext('2d');
    // const labels = Utils.months({count: 7});

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: [
                <?php 
                    foreach ($kehadiran_kegiatan as $key) {
                       echo '"'.$key->JUDUL.'",';
                    }    
                ?>
             ],
            datasets: [{
                label: 'Kehadiran',
                data: [
                    <?php 
                    foreach ($kehadiran_kegiatan as $key) {
                       echo '"'.$key->JUMLAH.'",';
                    }    
                ?>
                ],
                fill: true,
                backgroundColor: '#1cc88a',
                tension: 0.1
            }]
        }
    });
</script>

<script>
    var ctx = document.getElementById('chartKehadiran').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: [
                'Hadir',
                'Tidak Hadir',
             ],
            datasets: [{
                data: [<?php echo $jumlah_hadir; ?>, <?php echo $jumlah_tidak_hadir; ?>],
                backgroundColor: [
                    '#1cc88a',
                    '#e74a3b',
                ],
                hoverOffset: 4
            }]
        }
    });
</script>
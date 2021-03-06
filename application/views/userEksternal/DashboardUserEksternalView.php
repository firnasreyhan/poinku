<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <div class="row">
        <?php
        foreach ($event as $data) {
        ?>
            <div class="col-xl-3 col-md-6 mb-3">
                <a href="<?php echo site_url("detailKegiatan/" . $data->ID_EVENT); ?>" style="text-decoration:none">
                    <div class="card shadow h-100">
                        <img src="<?php echo $data->POSTER; ?>">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $data->JUDUL; ?></div>
                                    &nbsp;
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        <i class="fas fa-calendar-alt"></i>&nbsp;&nbsp;&nbsp;<?php echo $data->TANGGAL_ACARA; ?>
                                    </div>
                                    <div class="text-md font-weight-bold text-primary text-uppercase mb-1">
                                        <i class="fas fa-map"></i>&nbsp;&nbsp;&nbsp;<?php echo $data->LOKASI; ?>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </a>
            </div>
        <?php
        }
        ?>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url("tugaskhusus/detail/" . $detail_kegiatan[0]->NRP); ?>"><i class="fas fa-chevron-left"></i></a> Detail Kegiatan</h1>
                    &nbsp;
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Kegiatan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <?php foreach ($detail_kegiatan as $data) { ?>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Judul Kegiatan</h4>
                                            <p><?php echo $data->JUDUL ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Jenis Kegiatan</h4>
                                            <p><?php echo $data->JENIS ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Lingkup Kegiatan</h4>
                                            <p><?php echo $data->LINGKUP ?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Peran Kegiatan</h4>
                                            <p><?php echo $data->PERAN ?></p>
                                        </div>
                                    </div>

                                    <?php
                                    if ($data->ID_JENIS == '15') {
                                    ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Media Konten</h4>
                                                <p><?php echo $konten[0]->MEDIA_KONTEN ?></p>
                                            </div>
                                            <div class="form-group">
                                                <h4>Jenis Konten</h4>
                                                <p><?php echo $konten[0]->JENIS_KONTEN ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <h4>Keterangan</h4>
                                                <p><?php echo $kegiatan[0]->KETERANGAN ?></p>
                                            </div>
                                        </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Bukti Kegiatan</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <img src="<?php echo $detail_kegiatan[0]->BUKTI ?>">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
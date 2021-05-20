                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('kegiatan')?>"><i class="fas fa-chevron-left"></i></a> Detail Validasi Kegiatan</h1>
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
                             <?php foreach($detail_kegiatan as $data){ ?>
                                <div class="modal-body">  
                                    
                                <div class="row">
                                    <div class="col-md-6">  
                                        <div class="form-group">
                                            <h4>Jenis Kegiatan</h4>
                                            <p><?php echo $data->JENIS?></p>
                                        </div> 
                                        <div class="form-group">
                                            <h4>Lingkup Kegiatan</h4>
                                            <p><?php echo $data->LINGKUP?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Judul Kegiatan</h4>
                                            <p><?php echo $data->JUDUL?></p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <h4>Bukti</h4>
                                            <img src="<?php echo $data->BUKTI?>" width="300">
                                        </div>
                                    </div>
                                    
                                </div>
                                <?php }?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
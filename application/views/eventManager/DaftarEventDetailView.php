                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <?php echo $this->session->flashdata('message'); ?>
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('daftarEvent')?>"><i class="fas fa-chevron-left"></i></a> Detail Daftar Event</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Event</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                             <?php foreach($detail_event as $data){ ?>
                                <div class="modal-body">  
                                    
                                <div class="row">
                                    <div class="col-md-6">  
                                        <div class="form-group">
                                            <h4>Jenis Event</h4>
                                            <p><?php echo $data->JENIS?></p>
                                        </div> 
                                        <div class="form-group">
                                            <h4>Lingkup Event</h4>
                                            <p><?php echo $data->LINGKUP?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Judul Event</h4>
                                            <p><?php echo $data->JUDUL?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Deskripsi</h4>
                                            <p><?php echo $data->DESKRIPSI?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Poster</h4>
                                            <img src="<?php echo $data->POSTER?>" width="300">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <h4>Tanggal Acara</h4>
                                            <p><?php echo $data->TANGGAL_ACARA?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Jam Mulai</h4>
                                            <p><?php echo $data->JAM_MULAI?></p>
                                        </div>
                                        <div class="form-group">
                                            <h4>Jam Selesai</h4>
                                            <p><?php echo $data->JAM_SELESAI?></p>
                                        </div>
                                        
                                        <div class="form-group">
                                            <h4>Kuota</h4>
                                            <p><?php echo $data->KUOTA?></p>
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-success" href="<?php echo site_url('daftarEvent/print/'.$data->ID_EVENT)?>">Kirim Sertifikat</a>
                                <?php }?>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
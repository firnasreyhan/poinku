                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('daftarEvent')?>"><i class="fas fa-chevron-left"></i></a> Update Daftar Event</h1>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="row">
                                <div class="col-6">
                                    <h6 class="m-0 font-weight-bold text-primary">Data Update</h6>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php echo site_url("daftarEvent/update"); ?>" enctype="multipart/form-data" method="post">
                                <?php foreach($detail_event as $data){ ?>
                                <div class="modal-body">    
                                    <div class="form-group">
                                        <label>Jenis Event</label>
                                        <input type="hidden" class="form-control" name="IDEVENT" value="<?php echo $data->ID_EVENT?>" placeholder="Judul" required>
                                        <select class="form-control" name="JENISEVENT" placeholder="Jenis Event" required>
                                            <option value="">-- Pilih Jenis Event --</option>
                                            <?php foreach($jenis as $dataa){ ?>
                                                <option value="<?php echo $dataa->ID_JENIS?>" <?php if($dataa->ID_JENIS==$data->ID_JENIS) echo 'selected="selected"'; ?>><?php echo $dataa->JENIS?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Lingkup Event</label>
                                        <select class="form-control" name="LINGKUP" placeholder="Lingkup" required>
                                            <option value="">-- Pilih Lingkup Event --</option>
                                            <?php foreach($lingkup as $dataa){ ?>
                                                <option value="<?php echo $dataa->ID_LINGKUP?>" <?php if($dataa->ID_LINGKUP==$data->ID_LINGKUP) echo 'selected="selected"'; ?>><?php echo $dataa->LINGKUP?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="JUDUL" value="<?php echo $data->JUDUL?>" placeholder="Judul" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <textarea class="form-control" name="DESKRIPSI" placeholder="Deskripsi" required><?php echo $data->DESKRIPSI?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Acara</label>
                                        <input type="date" class="form-control" name="TANGGALACARA" value="<?php echo $data->TANGGAL_ACARA?>" placeholder="Tanggal Acara" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jam Mulai</label>
                                        <input type="time" class="form-control" name="JAMMULAI" value="<?php echo $data->JAM_MULAI?>" placeholder="Lingkup" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Jam Selesai</label>
                                        <input type="time" class="form-control" name="JAMSELESAI" value="<?php echo $data->JAM_SELESAI?>" placeholder="Lingkup" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Poster</label>
                                        <input type="file" class="form-control" name="POSTER" value="<?php echo $data->POSTER?>" placeholder="Lingkup">
                                        <img src="<?php echo $data->POSTER?>" width="400">
                                    </div>
                                    <div class="form-group">
                                        <label>Kuota</label>
                                        <input type="text" class="form-control" name="KUOTA" placeholder="Kuota" value="<?php echo $data->KUOTA?>" required>
                                    </div>
                                 </div>
                                
                                <div class="modal-footer">
                                     <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                                <?php }?>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
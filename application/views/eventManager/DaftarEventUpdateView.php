                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('daftarEvent') ?>"><i class="fas fa-chevron-left"></i></a> Update Daftar Event</h1>
                    &nbsp;
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
                                <?php foreach ($detail_event as $data) { ?>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                                Jenis Kegiatan
                                            </div>
                                            <input type="hidden" class="form-control" name="IDEVENT" value="<?php echo $data->ID_EVENT ?>" placeholder="Judul" required>
                                            <select class="form-control" name="JENISEVENT" placeholder="Jenis Event" required>
                                                <option value="">-- Pilih Jenis Event --</option>
                                                <?php foreach ($jenis as $dataa) { ?>
                                                    <option value="<?php echo $dataa->ID_JENIS ?>" <?php if ($dataa->ID_JENIS == $data->ID_JENIS) echo 'selected="selected"'; ?>><?php echo $dataa->JENIS ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Lingkup Kegiatan
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control" name="LINGKUP" placeholder="Lingkup" required>
                                                <option value="">-- Pilih Lingkup Event --</option>
                                                <?php foreach ($lingkup as $dataa) { ?>
                                                    <option value="<?php echo $dataa->ID_LINGKUP ?>" <?php if ($dataa->ID_LINGKUP == $data->ID_LINGKUP) echo 'selected="selected"'; ?>><?php echo $dataa->LINGKUP ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Judul
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="JUDUL" value="<?php echo $data->JUDUL ?>" placeholder="Judul" required>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Pembicara
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="PEMBICARA" value="<?php echo $data->PEMBICARA ?>" placeholder="Pembicara" required>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Lokasi
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="LOKASI" value="<?php echo $data->LOKASI ?>" placeholder="Lokasi" required>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Deskripsi
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="DESKRIPSI" placeholder="Deskripsi" required><?php echo $data->DESKRIPSI ?></textarea>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Tanggal Acara
                                        </div>
                                        <div class="form-group">
                                            <input type="date" class="form-control" name="TANGGALACARA" value="<?php echo $data->TANGGAL_ACARA ?>" placeholder="Tanggal Acara" required>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Jam Mulai
                                        </div>
                                        <div class="form-group">
                                            <input type="time" class="form-control" name="JAMMULAI" value="<?php echo $data->JAM_MULAI ?>" placeholder="Lingkup" required>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Jam Selesai
                                        </div>
                                        <div class="form-group">
                                            <input type="time" class="form-control" name="JAMSELESAI" value="<?php echo $data->JAM_SELESAI ?>" placeholder="Lingkup" required>
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Poster
                                        </div>
                                        <div class="form-group">
                                            <input type="file" class="form-control" name="POSTER" value="<?php echo $data->POSTER ?>" placeholder="Lingkup">
                                            <br />
                                            <img src="<?php echo $data->POSTER ?>" width="400">
                                        </div>
                                        <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                            Kuota
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="KUOTA" placeholder="Kuota" value="<?php echo $data->KUOTA ?>" required>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <a class="btn btn-secondary" href="<?php echo site_url('daftarEvent') ?>">Batal</a>
                                        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button> -->
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                <?php } ?>
                            </form>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->
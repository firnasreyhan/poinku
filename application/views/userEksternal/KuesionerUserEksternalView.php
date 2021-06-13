<!-- Begin Page Content -->
<div class="container-fluid">
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <div class="row">
        <div class="col-xl-3 col-md-6 mb-3">

        </div>
        <div class="col-xl-6 col-md-6 mb-6">
            <?php echo $this->session->tempdata('presensi'); ?>
            <div class="card shadow h-100">
                <div class="card-body">
                    <img src="<?php echo $detail_event[0]->POSTER; ?>" width="100%">
                    &nbsp;
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $detail_event[0]->JUDUL; ?></div>
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <?php echo $detail_event[0]->JENIS; ?>
                            </div>
                            <hr />
                            <form action="<?php echo site_url("kuesionerKegiatanPresensi"); ?>" enctype="multipart/form-data" method="post">
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Email Terdaftar
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="EMAIL" placeholder="Email" required>
                                </div>
                                <br/>
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Bagaimana tanggapan Anda tentang materi pada kegiatan ini?
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="JAWABAN_1" value="5">
                                    <label class="form-check-label">
                                        Sangat menarik
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_1" value="4">
                                    <label class="form-check-label">
                                        Manarik
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_1" value="3" checked>
                                    <label class="form-check-label">
                                        Biasa
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_1" value="2">
                                    <label class="form-check-label">
                                        Kurang menarik
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_1" value="1">
                                    <label class="form-check-label">
                                        Sangat kurang menarik
                                    </label>
                                </div>
                                <br />
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Bagaimana tanggapan Anda tentang pemateri?
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="JAWABAN_2" value="5">
                                    <label class="form-check-label">
                                        Sangat Baik
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_2" value="4">
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_2" value="3" checked>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_2" value="2">
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_2" value="1">
                                    <label class="form-check-label">
                                        Sangat Kurang
                                    </label>
                                </div>
                                <br />
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Menurut Anda apakah kegiatan ini bermanfaat?
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="JAWABAN_3" value="3">
                                    <label class="form-check-label">
                                        Iya
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_3" value="2" checked>
                                    <label class="form-check-label">
                                        Mungkin
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_3" value="1">
                                    <label class="form-check-label">
                                        Tidak
                                    </label>
                                </div>
                                <br />
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Apakah dengan mengikuti kegiatan ini dapat menambah wawasan Anda?
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="JAWABAN_4" value="3">
                                    <label class="form-check-label">
                                        Iya
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_4" value="2" checked>
                                    <label class="form-check-label">
                                        Mungkin
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_4" value="1">
                                    <label class="form-check-label">
                                        Tidak
                                    </label>
                                </div>
                                <br />
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Bagaimana tanggapan Anda terkait pelaksanaan kegiatan ini?
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="JAWABAN_5" value="5">
                                    <label class="form-check-label">
                                        Sangat Baik
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_5" value="4">
                                    <label class="form-check-label">
                                        Baik
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_5" value="3" checked>
                                    <label class="form-check-label">
                                        Cukup
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_5" value="2">
                                    <label class="form-check-label">
                                        Kurang
                                    </label>
                                    <br />
                                    <input class="form-check-input" type="radio" name="JAWABAN_5" value="1">
                                    <label class="form-check-label">
                                        Sangat Kurang
                                    </label>
                                </div>
                                <br/>
                                <div class="text-md font-weight-bold text-dark text-uppercase mb-1">
                                    Saran
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="SARAN" placeholder="Saran"></textarea>
                                </div>
                                <hr />
                                <input type="hidden" class="form-control" name="ID_EVENT" value="<?php echo $detail_event[0]->ID_EVENT; ?>" />
                                <button type="submit" style="width: 100%;" class="btn btn-primary">Kirim</button>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-md-6 mb-3">

        </div>
    </div>
    &nbsp;
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('daftarEventView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <h1 class="h3 mb-2 text-gray-800">Event</h1>
    &nbsp;
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Event</h6>
                </div>
                <div class="col-6">
                    <a data-toggle="modal" data-target="#mdlAdd" style="float:right;" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Lingkup</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Jenis</th>
                            <th>Lingkup</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($event as $data) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo $data->JENIS; ?></td>
                                <td><?php echo $data->LINGKUP; ?></td>
                                <td><?php echo $data->JUDUL; ?></td>
                                <td style="text-align:right">
                                    <a title="Detail Event" href="<?php echo site_url("daftarEvent/detail/" . $data->ID_EVENT); ?>" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-external-link-alt"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a title="QR Code" data-toggle="modal" data-target="#mdlQRCODE" data-qrcode="<?php echo $data->QR_CODE ?>" class="btn btn-dark btn-icon-split mdlQRCODE">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-qrcode"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a title="Edit Event" href="<?php echo site_url("daftarEvent/update/" . $data->ID_EVENT); ?>" class="btn btn-warning btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-edit"></i>
                                        </span>
                                    </a>
                                    &nbsp;
                                    <a title="Hapus Event" data-toggle="modal" data-target="#mdlDelete" data-id="<?php echo $data->ID_EVENT ?>" class="btn btn-danger btn-icon-split mdlDelete">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-trash"></i>
                                        </span>
                                    </a>
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add -->
<div class="modal fade" id="mdlAdd" tabindex="-1" aria-labelledby="mdlAdd" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Tambah Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("daftarEvent/insert"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" class="form-control" value="<?php echo $this->session->userdata('email') ?>" name="EMAIL" placeholder="Email" required>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="JENISEVENT" placeholder="Jenis Event" required>
                            <option value="">-- Pilih Jenis Event --</option>
                            <?php foreach ($jenis as $data) { ?>
                                <option value="<?php echo $data->ID_JENIS ?>"><?php echo $data->JENIS ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <select class="form-control" name="LINGKUP" placeholder="Lingkup" required>
                            <option value="">-- Pilih Lingkup Event --</option>
                            <?php foreach ($lingkup as $data) { ?>
                                <option value="<?php echo $data->ID_LINGKUP ?>"><?php echo $data->LINGKUP ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="JUDUL" placeholder="Judul" required>
                    </div>
                    <div class="form-group">
                        <textarea class="form-control" name="DESKRIPSI" placeholder="Deskripsi" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="PEMBICARA" placeholder="Pembicara" required />
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="LOKASI" placeholder="Lokasi" required />
                    </div>
                    <div class="form-group">
                        <label>Tanggal Acara</label>
                        <input type="date" class="form-control" name="TANGGALACARA" placeholder="Tanggal Acara" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Mulai</label>
                        <input type="time" class="form-control" name="JAMMULAI" placeholder="Lingkup" required>
                    </div>
                    <div class="form-group">
                        <label>Jam Selesai</label>
                        <input type="time" class="form-control" name="JAMSELESAI" placeholder="Lingkup" required>
                    </div>
                    <div class="form-group">
                        <label>Poster</label>
                        <input type="file" class="form-control" name="POSTER" placeholder="Lingkup" required>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-control" name="KUOTA" placeholder="Kuota" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete -->
<div class="modal fade" id="mdlDelete" tabindex="-1" aria-labelledby="mdlDelete" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Hapus Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("daftarEvent/delete"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="IDEVENT" placeholder="Keterangan" id="INPUT_ID_EVENT">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal QR Code -->
<div class="modal fade" id="mdlQRCODE" tabindex="-1" aria-labelledby="mdlQRCODE" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlQRCODE">QR Code</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="text-align: center;">
                <img id="INPUT_IMG" width="300">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>


<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script>
    $('#dataTable tbody').on('click', '.mdlDelete', function() {
        const id = $(this).data('id')
        $('#INPUT_ID_EVENT').val(id)
    })

    $('#dataTable tbody').on('click', '.mdlQRCODE', function() {
        const qrcode = $(this).data('qrcode')
        $('#INPUT_IMG').attr("src", qrcode)
    })
</script>
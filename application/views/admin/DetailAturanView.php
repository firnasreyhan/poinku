<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <?php
    // if ($this->session->flashdata('message')) {
    echo $this->session->tempdata('detailAturanView');
    // }
    // $this->session->sess_destroy(); 
    ?>
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('aturan') ?>"><i class="fas fa-chevron-left"></i></a> <?php echo $tahun . ' - ' . $keterangan; ?></h1>
    &nbsp;
    <!-- </div> -->
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="pills-nilai-tab" data-toggle="pill" href="#pills-nilai" role="tab" aria-controls="pills-nilai" aria-selected="true" style="text-align: center;">Nilai</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-poin-tab" data-toggle="pill" href="#pills-poin" role="tab" aria-controls="pills-poin" aria-selected="false" style="text-align: center;">Poin</a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" id="pills-mahasiswa-tab" data-toggle="pill" href="#pills-mahasiswa" role="tab" aria-controls="pills-mahasiswa" aria-selected="false" style="text-align: center;">Mahasiswa</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="card-body">
            <!-- <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Tahun</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        
                    </tbody>
                </table>
            </div> -->
            <!-- Tab Navigation -->
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-nilai" role="tabpanel" aria-labelledby="pills-nilai-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Nilai</h6>
                                <a data-toggle="modal" data-target="#mdlAddNilai" style="float:right;" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-nilai" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Nilai</th>
                                            <th>Poin Minimal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Nilai</th>
                                            <th>Poin Minimal</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($nilai as $key) {
                                        ?>
                                            <tr>
                                                <td><?php echo $key->NILAI; ?></td>
                                                <td><?php echo $key->POIN_MINIMAL; ?></td>
                                                <td style="text-align:right">
                                                    <a href="<?php echo site_url("aturan/nilai/kriteria/" . $key->ID_NILAI); ?>" class="btn btn-primary btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-external-link-alt"></i>
                                                        </span>
                                                    </a>
                                                    &nbsp;
                                                    <a href="<?php echo site_url("aturan/nilai/update/" . $key->ID_NILAI); ?>" class="btn btn-warning btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>
                                                    &nbsp;
                                                    <a data-toggle="modal" data-target="#mdlDeleteNilai" data-id="<?php echo $key->ID_NILAI; ?>" data-aturan="<?php echo $key->ID_ATURAN; ?>" class="btn btn-danger btn-icon-split mdlDeleteNilai">
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
                <div class="tab-pane fade" id="pills-poin" role="tabpanel" aria-labelledby="pills-poin-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Poin</h6>
                                <a href="<?php echo site_url("aturan/poin/" . $detail_aturan[0]->ID_ATURAN); ?>" style="float:right;" class="btn btn-primary btn-icon-split">
                                    <span class="icon text-white-50">
                                        <i class="fas fa-plus"></i>
                                    </span>
                                    <span class="text">Tambah</span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-poin" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Lingkup</th>
                                            <th>Peran</th>
                                            <th>Poin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Jenis</th>
                                            <th>Lingkup</th>
                                            <th>Peran</th>
                                            <th>Poin</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        foreach ($poin as $key) {
                                        ?>
                                            <tr>
                                                <td><?php echo $key->JENIS; ?></td>
                                                <td><?php echo $key->LINGKUP; ?></td>
                                                <td><?php echo $key->PERAN; ?></td>
                                                <td><?php echo $key->POIN; ?></td>
                                                <td style="text-align:right">
                                                    <a href="<?php echo site_url("aturan/poin/update/" . $key->ID_POIN); ?>" class="btn btn-warning btn-icon-split">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-edit"></i>
                                                        </span>
                                                    </a>
                                                    &nbsp;
                                                    <a data-toggle="modal" data-target="#mdlDeletePoin" data-id="<?php echo $key->ID_POIN; ?>" class="btn btn-danger btn-icon-split mdlDeletePoin">
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
                <div class="tab-pane fade" id="pills-mahasiswa" role="tabpanel" aria-labelledby="pills-mahasiswa-tab">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <div class="d-sm-flex align-items-center justify-content-between">
                                <h6 class="m-0 font-weight-bold text-primary">Daftar Mahasiswa</h6>
                                <button style="float:right;" class="btn btn-warning btn-icon-split" id="downloadMultiple" data-toggle="modal" data-target="#mdlDownloadMulti" disabled>
                                    <span class="icon text-white-50">
                                        <i class="fas fa-edit"></i>
                                    </span>
                                    <span class="text">Ubah Aturan</span>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="table-mahasiswa" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>
                                                <div class="custom-control custom-checkbox" style="text-align:center;">
                                                    <input type="checkbox" class="custom-control-input" id="checkAll">
                                                    <label class="custom-control-label" for="checkAll">Check</label>
                                                </div>
                                            </th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>Angkatan</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>Check</th>
                                            <th>NRP</th>
                                            <th>Nama</th>
                                            <th>Prodi</th>
                                            <th>Angkatan</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($mahasiswa as $key) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php
                                                    if ($key->STATUS != 0 && $key->STATUS != 1) {
                                                    ?>
                                                        <div class="custom-control custom-checkbox" style="text-align:center;">
                                                            <input type="checkbox" class="custom-control-input checkItem" id="chck_<?php echo $no; ?>" value="<?php echo $key->NRP; ?>">
                                                            <label class="custom-control-label" for="chck_<?php echo $no; ?>"></label>
                                                        </div>
                                                    <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $key->NRP; ?></td>
                                                <td><?php echo $key->NAMA; ?></td>
                                                <td><?php echo $key->PRODI; ?></td>
                                                <td><?php echo $key->ANGKATAN; ?></td>
                                                <td><?php
                                                    if ($key->STATUS == null) {
                                                        echo "<span class='badge badge-pill badge-warning'>Belum Melakukan Pengajuan Validasi</span>";
                                                    } else {
                                                        if ($key->STATUS == 0) {
                                                            echo "<span class='badge badge-pill badge-warning'>Pengajuan Sedang Diproses</span>";
                                                        } else {
                                                            if ($key->STATUS == 1) {
                                                                echo "<span class='badge badge-pill badge-success'>Pengajuan Tugas Khusus Diterima</span>";
                                                            } else {
                                                                echo "<span class='badge badge-pill badge-danger'>Pengajuan Tugas Khusus Ditolak</span>";
                                                            }
                                                        }
                                                    } ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $no++;
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Modal Add Nilai -->
<div class="modal fade" id="mdlAddNilai" tabindex="-1" aria-labelledby="mdlAddNilai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAddNilai">Tambah Nilai</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("nilai/insert"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" class="form-control" name="NILAI" placeholder="Nilai" required>
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control" name="POIN_MINIMAL" placeholder="Poin Minimal" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <input value="<?php echo $detail_aturan[0]->ID_ATURAN; ?>" type="hidden" class="form-control" name="ID_ATURAN">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete Nilai -->
<div class="modal fade" id="mdlDeleteNilai" tabindex="-1" aria-labelledby="mdlDeleteNilai" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlAdd">Hapus Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("nilai/delete"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_NILAI" placeholder="Keterangan" id="INPUT_ID_NILAI">
                    <input value="<?php echo $detail_aturan[0]->ID_ATURAN; ?>" type="hidden" class="form-control" name="ID_ATURAN">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Delete Poin -->
<div class="modal fade" id="mdlDeletePoin" tabindex="-1" aria-labelledby="mdlDeletePoin" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlDeletePoin">Hapus Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("poin/delete"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <p>Apakah anda yakin ingin mengahpus data ini?</p>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="ID_POIN" placeholder="Keterangan" id="INPUT_ID_POIN">
                    <input value="<?php echo $detail_aturan[0]->ID_ATURAN; ?>" type="hidden" class="form-control" name="ID_ATURAN">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-primary">Iya</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Download Multiple -->
<div class="modal fade" id="mdlDownloadMulti" tabindex="-1" aria-labelledby="mdlGenerate" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="mdlGenerate">Ubah Aturan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?php echo site_url("aturan/updateAturanMahasiswa"); ?>" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <select class="form-control" name="ID_ATURAN">
                            <option value="">-- Pilih Aturan --</option>
                            <?php
                            foreach ($aturan as $row) {
                            ?>
                                <option value="<?php echo $row->ID_ATURAN ?>">
                                    <?php
                                    $kategori = null;
                                    if ($row->KATEGORI == 0) {
                                        $kategori = "Reguler";
                                    } else {
                                        $kategori = "Profesional";
                                    }

                                    echo $row->TAHUN . " / " . $kategori;
                                    ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" class="form-control" name="NRP" id="INPUT_NRP">
                    <input type="hidden" class="form-control" name="ID_ATURAN_AKTIF" value="<?php echo $id_aturan_aktif; ?>">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        $('#table-nilai').DataTable();
        $('#table-poin').DataTable();
        $('#table-mahasiswa').DataTable();
    });

    $('#table-nilai tbody').on('click', '.mdlDeleteNilai', function() {
        const id = $(this).data('id')
        $('#INPUT_ID_NILAI').val(id)
    })

    $('#table-poin tbody').on('click', '.mdlDeletePoin', function() {
        const id = $(this).data('id')
        $('#INPUT_ID_POIN').val(id)
    })

    //MultipleItem
    $('#downloadMultiple').click(function() {
        const dnIds = $('.checkItem:checkbox:checked').map((_, elm) => elm.value).get()
        $('#INPUT_NRP').val(dnIds.toString())
        console.log(dnIds);
    })
    $('#checkAll').change(function() {
        const isChecked = $(this).prop('checked')
        if (isChecked) {
            $('.checkItem').prop('checked', true)
        } else {
            $('.checkItem').prop('checked', false)
        }
        buttonMultipleAvailable()
    })
    $('.checkItem').change(function() {
        buttonMultipleAvailable()
    })
    const buttonMultipleAvailable = () => {
        const isChecked = $('.checkItem:checkbox:checked').prop('checked')
        if (isChecked)
            $('#downloadMultiple').attr('disabled', false)
        else
            $('#downloadMultiple').attr('disabled', true)
    }
</script>
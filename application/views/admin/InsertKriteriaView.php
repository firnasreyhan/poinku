<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
    <h1 class="h3 mb-2 text-gray-800"><a href="<?php echo site_url('aturan/nilai/kriteria/' . $detail_kriteria[0]->ID_KRITERIA) ?>"><i class="fas fa-chevron-left"></i></a> Tambah Kriteria</h1>
    &nbsp;
    <!-- </div> -->
    <!-- <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p> -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-6">
                    <h6 class="m-0 font-weight-bold text-primary">Daftar Kriteria</h6>
                </div>
                <!-- <div class="col-6">
                    <a data-toggle="modal" data-target="#mdlAdd" style="float:right;" class="btn btn-primary btn-icon-split">
                        <span class="icon text-white-50">
                            <i class="fas fa-plus"></i>
                        </span>
                        <span class="text">Tambah</span>
                    </a>
                </div> -->
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <div class="form-group">
                    <form method="POST" action="<?php echo site_url('kriteria/insert') ?>">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dynamic_field">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Lingkup</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis</th>
                                        <th>Lingkup</th>
                                        <th>Jumlah</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            <select name="FORM[0][ID_JENIS]" class="form-control" id="exampleFormControlSelect1">
                                                <?php
                                                foreach ($jenis as $key) {
                                                ?>
                                                    <option value="<?php echo $key->ID_JENIS ?>"><?php echo $key->JENIS; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <select name="FORM[0][ID_LINGKUP]" class="form-control" id="exampleFormControlSelect1">
                                                <?php
                                                foreach ($lingkup as $key) {
                                                ?>
                                                    <option value="<?php echo $key->ID_LINGKUP ?>"><?php echo $key->LINGKUP; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="number" name="FORM[0][JUMLAH]" placeholder="Jumlah" class="form-control name_list" required />
                                            <input type="hidden" name="FORM[0][ID_NILAI]" value="<?php echo $nilai ?>" />
                                        </td>
                                        <td></td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="col-12">
                                <div style="float:right;">
                                    <a id="add" class="btn btn-success btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-plus"></i>
                                        </span>
                                        <span class="text">Tambah Daftar Kriteria</span>
                                    </a>
                                    &nbsp;
                                    <input type="submit" id="submit" class="btn btn-primary" value="Simpan" />
                                    <!-- <a data-toggle="modal" data-target="#mdlAdd" class="btn btn-primary btn-icon-split">
                                        <span class="icon text-white-50">
                                            <i class="fas fa-save"></i>
                                        </span>
                                        <span class="text">Simpan</span>
                                    </a> -->
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- <button type="button" id="add" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#0C9;color:#FFF;border-radius:50px;text-align:center;box-shadow: 2px 2px 3px #999;">
        <i class="fa fa-plus my-float"></i>
    </button> -->
    <!-- <a href="#" style="position:fixed;width:60px;height:60px;bottom:40px;right:40px;background-color:#0C9;color:#FFF;border-radius:50px;text-align:center;box-shadow: 2px 2px 3px #999;">
        <i style="margin-top:22px;" class="fa fa-plus my-float"></i>
    </a> -->

</div>
<!-- /.container-fluid -->

<!-- End of Main Content -->
</div>

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script>
    $(document).ready(function() {
        var i = 1;
        $('#add').click(function() {
            $.ajax({
                url: '<?php echo site_url('aturan/ajxGetData') ?>',
                method: 'get',
                dataType: 'json',
                success: (res) => {
                    const htmlJenis = res.jenis.map(obj => (`<option value="${obj.ID_JENIS}">${obj.JENIS}</option>`))
                    const htmlLingkup = res.lingkup.map(obj => (`<option value="${obj.ID_LINGKUP}">${obj.LINGKUP}</option>`))
                    $('#dynamic_field').append(
                        `<tr id="row-${i}" class="dynamic-added">
                            <td>
                                ${i+1}
                            </td>
                            <td>
                                <select name="FORM[${i}][ID_JENIS]" class="form-control" id="exampleFormControlSelect1">
                                    ${htmlJenis.toString()}
                                </select>
                            </td>
                            <td>
                                <select name="FORM[${i}][ID_LINGKUP]" class="form-control" id="exampleFormControlSelect1">
                                    ${htmlLingkup.toString()}
                                </select>
                            </td>
                            <td>
                                <input type="number" name="FORM[${i}][JUMLAH]" placeholder="Jumlah" class="form-control name_list" required/>
                                <input type="hidden" name="FORM[${i}][ID_NILAI]" value="<?php echo $nilai ?>" />
                            </td>
                            <td>
                                <button type="button" id="${i}" class="btn btn-danger btn_remove">X</button>
                            </td>
                        </tr>`
                    );
                    i++;
                }
            })
        });

        $(document).on('click', '.btn_remove', function() {
            var button_id = $(this).attr("id");
            $('#row-' + button_id + '').remove();
        });
    });
</script>
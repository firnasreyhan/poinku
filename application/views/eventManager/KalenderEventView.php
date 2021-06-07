<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <!-- <div class="d-sm-flex align-items-center justify-content-between mb-4"> -->
        <h1 class="h3 mb-0 text-gray-800">Kalender Event Manager</h1>
    &nbsp;
    <!-- </div> -->
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div id="calendar">
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->

<!-- Bootstrap core JavaScript-->
<script src="<?php echo base_url('assets/jquery/jquery.min.js') ?>"></script>

<script type="text/javascript">
    $(document).ready(function() {
        var my_calendar = $("#calendar").dnCalendar({
            minDate: "2020-01-01",
            maxDate: "2025-12-31",
            defaultDate: "<?php echo date('Y-m-d'); ?>",
            monthNames: [ "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember" ], 
            monthNamesShort: [ 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des' ],
            dayNames: [ 'Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu'],
            dayNamesShort: [ 'Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab' ],
            dataTitles: { defaultDate: 'Hari ini', today : 'hari ini' },
            notes: [
                    <?php foreach($event as $data){ ?>
                        { "date": "<?php echo $data->TANGGAL_ACARA?>", "note": ["<?php echo $data->JUDUL.' ('.substr($data->JAM_MULAI,0,5).' - '.substr($data->JAM_SELESAI,0,5).')' ?>"] },
                    <?php }?>
                    ],
            showNotes: true,
            startWeek: 'monday',
            // dayClick: function(date, view) {
            //     alert(date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear());
            // }
        });

        // init calendar
        my_calendar.build();

        // update calendar
        // my_calendar.update({
        // 	minDate: "2016-01-05",
        // 	defaultDate: "2016-05-04"
        // });
    });
    </script>
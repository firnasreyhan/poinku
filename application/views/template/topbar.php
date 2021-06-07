<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
        </form>

        <!-- Topbar Search -->
        <!-- <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                    </button>
                </div>
            </div>
        </form> -->

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>

            <?php 
                if ($this->session->userdata('role') == "Admin") {
            ?>
            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1 list-pengajuan">
                <?php 
                    $dataPengajuan      = $this->db->query('SELECT * FROM mahasiswa WHERE STATUS = 0 ORDER BY TANGGAL_VALIDASI DESC LIMIT 3')->result();
                    $countDataPengajuan = $this->db->query('SELECT * FROM mahasiswa WHERE STATUS = 0')->num_rows();
                ?>
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter"><?php echo $countDataPengajuan;?></span>
                </a>
                <?php if($countDataPengajuan > 0){ ?>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <?php foreach($dataPengajuan as $data){ ?>
                    <a class="dropdown-item d-flex align-items-center notifikasi" href="<?php echo site_url('tugaskhusus') ?>">
                    <!-- <a class="dropdown-item d-flex align-items-center notifikasi" href="http://facebook.com"> -->
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="font-weight-bold">NRP <?php echo $data->NRP ?></div>
                            <span class="small text-gray-500">Mengajukan Validasi Tugas Khusus</span>
                        </div>
                    </a>
                    <?php }?>
                    <a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url('tugaskhusus') ?>">Show All Alerts</a>
                </div>
                <?php }?>
            </li>
            <?php
                }
            ?>

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1 list-pemberitahuan">
                <?php 
                    $dataNotif      = $this->db->query('SELECT * FROM tugas_khusus WHERE STATUS_VALIDASI = 0 ORDER BY TANGGAL_DATA DESC LIMIT 3')->result();
                    $countDataNotif = $this->db->query('SELECT * FROM tugas_khusus WHERE STATUS_VALIDASI = 0')->num_rows();
                    if($this->session->userdata('role') == "Admin"){
                ?>
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter"><?php echo $countDataNotif;?></span>
                </a>
                <?php if($countDataNotif > 0){ ?>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <?php foreach($dataNotif as $data){ ?>
                    <a class="dropdown-item d-flex align-items-center notifikasi" href="<?php echo site_url('kegiatan') ?>">
                    <!-- <a class="dropdown-item d-flex align-items-center notifikasi" href="http://facebook.com"> -->
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="font-weight-bold">NRP <?php echo $data->NRP ?></div>
                            <span class="small text-gray-500">Mengajukan Validasi Kegiatan '<?php echo $data->JUDUL?>'</span>
                        </div>
                    </a>
                    <?php }?>
                    <a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url('kegiatan') ?>">Show All Alerts</a>
                </div>
                <?php }}?>
                
                <?php 
                    $dataNotif      = $this->db->query('SELECT event.JUDUL, presensi.EMAIL FROM presensi JOIN event ON event.ID_EVENT = presensi.ID_EVENT WHERE IS_SEEN = 0 ORDER BY ID_PRESENSI DESC LIMIT 3')->result();
                    $countDataNotif = $this->db->query('SELECT * FROM presensi WHERE IS_SEEN = 0')->num_rows();
                    if($this->session->userdata('role') == "Event Manager"){
                ?>
                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-bell fa-fw"></i>
                    <!-- Counter - Alerts -->
                    <span class="badge badge-danger badge-counter"><?php echo $countDataNotif;?></span>
                </a>
                <?php if($countDataNotif > 0){ ?>
                <!-- Dropdown - Alerts -->
                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                    <h6 class="dropdown-header">
                        Alerts Center
                    </h6>
                    <?php foreach($dataNotif as $data){ ?>
                    <a class="dropdown-item d-flex align-items-center notifikasi" href="<?php echo site_url('daftarEvent')?>">
                    <!-- <a class="dropdown-item d-flex align-items-center notifikasi" href="http://facebook.com"> -->
                        <div class="mr-3">
                            <div class="icon-circle bg-primary">
                                <i class="fas fa-file-alt text-white"></i>
                            </div>
                        </div>
                        <div>
                            <div class="font-weight-bold">Email <?php echo $data->EMAIL ?></div>
                            <span class="small text-gray-500">Mendaftar Event '<?php echo $data->JUDUL?>'</span>
                        </div>
                    </a>
                    <?php }?>
                    <a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url('daftarEvent')?>">Show All Alerts</a>
                </div>
                    <?php }}?>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata('nama')?></span>
                    <img class="img-profile rounded-circle" src="<?php echo base_url()?>assets/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                    </a>
                    <!--<a class="dropdown-item" href="#">-->
                    <!--    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>-->
                    <!--    Settings-->
                    <!--</a>-->
                    <!--<a class="dropdown-item" href="#">-->
                    <!--    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>-->
                    <!--    Activity Log-->
                    <!--</a>-->
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->
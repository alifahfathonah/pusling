<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

          <!-- Topbar Search -->
       

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <?php $notif = $this->db->select('*')->from('laporan')->where('status_notif','unread')->get()->result();?>
                <?php if(count($notif)>0){?>
                <span class="notification-indicator notification-indicator-primary notification-indicator-ripple"></span>
              <?php }else{?>
                <span class="badge badge-danger badge-counter"></span>
              <?php }?>
              </a>
              <!-- Dropdown - Alerts -->

              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <?php $list = $this->db->select('*')->from('laporan')->where('status_notif','unread')->limit(3)->order_by('created_at','DESC')->get()->result();?>
                <h6 class="dropdown-header">
                  Notifikasi Laporan Pusling
                </h6>
                <?php foreach($list as $n){?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo site_url('admin/laporan/set_notif/'.$n->id_laporan)?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-file-alt text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?= $n->created_at?></div>
                    <span class="font-weight-bold"><?= $n->nama?> melaporkan!</span>
                  </div>
                </a>
              <?php } ?>
                <a class="dropdown-item text-center small text-gray-500" href="<?php echo site_url()?>admin/laporan">Lihat Semua</a>
              </div>
            </li>

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->

            <div class="topbar-divider d-none d-sm-block"></div>
            

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $this->session->userdata("user_nama") ?></span>
                <img class="img-profile rounded-circle" src="<?php echo base_url('assets/avatar/avatar.png')?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="<?php echo site_url()?>home">
                  <i class="fas fa-home fa-sm fa-fw mr-2 text-gray-400"></i>
                  Kembali ke Home
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
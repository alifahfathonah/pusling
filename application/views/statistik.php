<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Pusling - Perpustakaan Keliling Kabupaten Indramayu</title>

    <!-- Favicon -->
    <link rel="icon" href="<?php echo base_url()?>images/indramayu.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url()?>landing_page/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

    <link href="<?php echo base_url('assets/fontawesome-free/css/all.min.css') ?>" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

   <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Top Header Area Start -->
        <div class="top-header-area">
            <div class="container">
                <div class="row">

                    <div class="col-6">
                        <div class="top-header-content">  
                            <?php
                            $no = 1; 
                            foreach($kontak as $kon){ 
                            ?>
                            <a href="tel://<?php echo $kon->no_hp ?>"><i class="fa fa-phone" aria-hidden="true"></i> <span>Call Us: <?php echo $kon->no_hp ?></span></a>
                            <a href="mailto:<?php echo $kon->email ?>"><i class="fa fa-envelope" aria-hidden="true"></i> <span>Email: <?php echo $kon->email ?></span></a>

                            <?php } ?>
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="top-header-content">
                            <!-- Login -->
                            <?php if($this->session->userdata('role') === 'superadmin'){
                                echo "<a href='admin/overview''><i class='fa fa-user' aria-hidden='true'></i> <span>Nama : ".$this->session->userdata("user_nama")."</span></a>";
                            }else if($this->session->userdata('role') === 'pustakawan'){
                                echo "<a href='pustakawan/overview''><i class='fa fa-user' aria-hidden='true'></i> <span>Nama : ".$this->session->userdata("user_nama")."</span></a>";
                            }else if($this->session->userdata('role') === 'kasi'){
                                echo "<a href='kasi/overview''><i class='fa fa-user' aria-hidden='true'></i> <span>Nama : ".$this->session->userdata("user_nama")."</span></a>";
                            }else{
                                echo " <a href='auth/login'><i class='fa fa-lock' aria-hidden='true'></i>Login</a>";
                            }?>


                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Top Header Area End -->

        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="hamiNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="<?php echo site_url()?>home"><p style="color: white;">Pusling.</p></a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li><a href="<?php echo site_url()?>home">Home</a></li>
                                    <li><a href="<?php echo site_url()?>galeri">Galeri</a></li>
                                    <li class="active"><a href="<?php echo site_url()?>statistik">Statistiks</a></li>
                                    <li><a href="<?php echo site_url()?>profil">Profil</a></li>
                                    <li><a href="<?php echo site_url()?>kontak">Kontak</a></li>
                                </ul>
                                <?php if($this->session->userdata('role') === 'superadmin'): ?>
                                    <div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                        <a href="<?php echo site_url()?>admin/overview" class="btn hami-btn live--chat--btn"><i class="fa fa-users" aria-hidden="true"></i> Dashboard</a>
                                    </div>
                                    <?php endif; ?>
                                    <?php if($this->session->userdata('role') === 'pustakawan'): ?>
                                    <div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                        <a href="<?php echo site_url()?>pustakawan/overview" class="btn hami-btn live--chat--btn"><i class="fa fa-users" aria-hidden="true"></i> Dashboard</a>
                                    </div>
                                    <?php endif; ?>
                                    
                                    <?php if($this->session->userdata('role') === 'kasi'): ?>
                                    <div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
                                        <a href="<?php echo site_url()?>kasi/overview" class="btn hami-btn live--chat--btn"><i class="fa fa-users" aria-hidden="true"></i> Dashboard</a>
                                    </div>
                                    <?php endif; ?>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Welcome Area Start -->
    <section class="welcome-area">

        <!-- Welcome Pattern -->
        <div class="welcome-pattern">
            <img src="<?php echo base_url()?>landing_page/img/core-img/welcome-pattern.png" alt="">
        </div>

        <!-- Welcome Slide -->
        <div class="welcome-slides owl-carousel">

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-9 col-lg-7">
                                <div class="welcome-text mb-50">
                                    <h3 data-animation="fadeInLeftBig" data-delay="200ms" data-duration="1s">Perpustakaan Keliling Kabupaten Indramayu</h3>
                                    <p data-animation="fadeInLeftBig" data-delay="600ms" data-duration="1s">
                                    <?php
                                    $no = 1; 
                                    foreach($kontak as $kon){ 
                                    ?><?php echo $kon->alamat ?>
                                      
                                  <?php } ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Welcome Thumbnail -->
                <div class="welcome-thumbnail">
                    <img src="<?php echo base_url()?>images/murid.png" >
                </div>
            </div>

            <!-- Single Welcome Slide -->
            <div class="single-welcome-slide">
                <!-- Welcome Content -->
                <div class="welcome-content h-100">
                    <div class="container h-100">
                        <div class="row h-100 align-items-center">
                            <!-- Welcome Text -->
                            <div class="col-12 col-md-9 col-lg-7">
                                <div class="welcome-text mb-50">
                                    <h3 data-animation="fadeInUpBig" data-delay="400ms" data-duration="1s">Perpustakaan Keliling Kabupaten Indramayu</h3>
                                    <p data-animation="fadeInUpBig" data-delay="600ms" data-duration="1s">
                                    <?php
                                    $no = 1; 
                                    foreach($kontak as $kon){ 
                                    ?><?php echo $kon->alamat ?>
                                      
                                  <?php } ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Welcome Thumbnail -->
                <div class="welcome-thumbnail">
                    <img src="<?php echo base_url()?>images/guru.png" alt="">
                </div>
            </div>

        </div>

        <!-- Clouds -->
        <div class="clouds">
            <img src="<?php echo base_url()?>landing_page/img/core-img/cloud-1.png" alt="" class="cloud-1">
            <img src="<?php echo base_url()?>landing_page/img/core-img/cloud-2.png" alt="" class="cloud-2">
            <img src="<?php echo base_url()?>landing_page/img/core-img/cloud-3.png" alt="" class="cloud-3">
            <img src="<?php echo base_url()?>landing_page/img/core-img/cloud-4.png" alt="" class="cloud-4">
            <img src="<?php echo base_url()?>landing_page/img/core-img/cloud-5.png" alt="" class="cloud-5">
        </div>
    </section>
    <!-- Welcome Area End -->

    <!-- Find Domain Area Start -->
    <section class="find-domain-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <!-- Section Heading -->
                <div class="col-12">
                    <div class="section-heading text-center">
                        <h2>Statistik</h2>
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pusling</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->count_all_results('laporan'); ?></div>
                      <div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Pusling Mobil</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $Mobil['count(*)'] ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-car fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Pusling Motor</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $Motor['count(*)'] ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-motorcycle fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Buku</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $this->db->count_all_results('buku'); ?></div>
                      <div>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>

            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-7">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Buku Terlaris</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Total Dibaca</th>
                    </tr>
                  </thead>
                  <tfoot>
                    <tr>
                      <th>No</th>
                      <th>Kode Buku</th>
                      <th>Total Dibaca</th>
                    </tr>
                  </tfoot>
                  <tbody>
                     <?php $i=0; 
                    $no = 1;  foreach ($buku as $value) {
                        $judul[$i]=$value->judul;
                        $cari_banyak[$i]=$this->db->query("Select count(*) from laporan_buku where judul='$judul[$i]'")->row_array();
                        $banyak[$i]=$cari_banyak[$i]['count(*)']; ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $judul[$i] ?></td>
                          <td><?= $banyak[$i] ?></td>
                        </tr>
                      <?php $i++; }?>
                  </tbody>
                </table>
              </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-5">
              <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Statistik Pusling</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">Dropdown Header:</div>
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  <div class="chart-pie pt-4 pb-2">
                    <canvas id="piemu"></canvas>
                  </div>
                  <div class="mt-4 text-center small">
                    <span class="mr-2">
                      <i class="fas fa-circle text-primary"></i> Mobil Pusling
                    </span>
                    <span class="mr-2">
                      <i class="fas fa-circle text-success"></i> Motor Pusling
                    </span>
                  </div>
                </div>
              </div>
            </div>
            </div>
        </div>

        <div class="support-pattern" style="background-image: url(<?php echo base_url()?>landing_page/img/core-img/support-pattern.png);"></div>
    </section>


    <!-- Footer Area Start -->
<footer class="footer-area section-padding-80-0 bg-gray">

        <!-- Main Footer Area -->
        <div class="main-footer-area">
            <div class="container">
                <div class="row justify-content-between">

                     <!-- Single Footer Widget Area -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Link Terkait</h5>

                            <!-- Footer Nav -->
                            <ul class="footer-nav">
                                <li><a href="#">Arsip Nasional Republik Indonesia</a></li>
                                <li><a href="#">Perpustakaan Nasional</a></li>
                                <li><a href="#">Indonesia One Search</a></li>
                                <li><a href="#">SLiMS</a></li>
                                <li><a href="#">Oleh-oleh Indramayu</a></li>
                                <li><a href="#">Lapor</a></li>
                                <li><a href="#">Website Resmi Pemprov Jabar</a></li>
                                <li><a href="#">Website Resmi Pemkab Indramayu</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- Single Footer Widget Area -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Menu</h5>

                                <!-- Footer Nav -->
                            <ul class="footer-nav">
                                <li><a href="<?= site_url()?>home">Home</a></li>
                                <li><a href="<?= site_url()?>galeri">Galeri</a></li>
                                <li><a href="<?= site_url()?>statistik">Statistiks</a></li>
                                <li><a href="<?= site_url()?>profil">Profil</a></li>
                                <li><a href="<?= site_url()?>kontak">Kontak</a></li>
                            </ul>
                        </div>
                    </div>

                    <!-- Single Footer Widget Area -->
                    <div class="col-6 col-sm-4 col-lg-2">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Alamat Lokasi</h5>

                                <!-- Footer Nav -->
                            <ul class="footer-nav">
                                <?php
                                    $no = 1; 
                                    foreach($kontak as $s){ ?>
                                <li><a href="<?= site_url()?>home"><?= $s->alamat ?></a></li>
                                <li><a href="<?= site_url()?>galeri"><?= $s->no_hp ?></a></li>
                                <li><a href="<?= site_url()?>statistik"><?= $s->email ?></a></li>
                            <?php } ?>
                            </ul>
                        </div>
                    </div>

                     <div class="col-12 col-sm-8 col-lg-4">
                        <div class="single-footer-widget mb-80">
                            <!-- Widget Title -->
                            <h5 class="widget-title">Temukan Kami</h5>


                            <!-- Social Info -->
                            <div class="social-info">
                                <a href="https://www.facebook.com/disarpusindramayu/" class="facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                <a href="https://www.instagram.com/disarpusindramayu/" class="instagram"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                <a href="https://twitter.com/perpusdaimyu" class="twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>

        <!-- Bottom Footer Area -->
        <div class="bottom-footer-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Perpustakaan Keliling Indramayu Kabupaten Indramayu 
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="<?php echo base_url('assets/chart.js/Chart.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('js/demo/chart-area-demo.js') ?>"></script>
  <script type="text/javascript">
        // Set new default font family and font color to mimic Bootstrap's default styling
    Chart.defaults.global.defaultFontFamily = 'Nunito', '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
    Chart.defaults.global.defaultFontColor = '#858796';

    // Pie Chart Example
    var ctx = document.getElementById("piemu");
    var myPieChart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: ["Mobil Pusling", "Motor Pusling"],
        datasets: [{
          data: [<?= $Mobil['count(*)'] ?>, <?= $Motor['count(*)'] ?>],
          backgroundColor: ['#4e73df', '#1cc88a', '#36b9cc'],
          hoverBackgroundColor: ['#2e59d9', '#17a673', '#2c9faf'],
          hoverBorderColor: "rgba(234, 236, 244, 1)",
        }],
      },
      options: {
        maintainAspectRatio: false,
        tooltips: {
          backgroundColor: "rgb(255,255,255)",
          bodyFontColor: "#858796",
          borderColor: '#dddfeb',
          borderWidth: 1,
          xPadding: 15,
          yPadding: 15,
          displayColors: false,
          caretPadding: 10,
        },
        legend: {
          display: false
        },
        cutoutPercentage: 80,
      },
    });
  </script>

  <script src="<?php echo base_url('js/demo/chart-bar-demo.js') ?>"></script>
    <script src="<?php echo base_url()?>landing_page/js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="<?php echo base_url()?>landing_page/js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="<?php echo base_url()?>landing_page/js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="<?php echo base_url()?>landing_page/js/hami.bundle.js"></script>
    <!-- Active -->
    <script src="<?php echo base_url()?>landing_page/js/default-assets/active.js"></script>

  <!-- Page level plugins -->
  <script src="<?php echo base_url('assets/datatables/jquery.dataTables.min.js') ?>"></script>
  <script src="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.js') ?>"></script>

  <!-- Page level custom scripts -->
  <script src="<?php echo base_url('js/demo/datatables-demo.js') ?>"></script>

</body>

</html>
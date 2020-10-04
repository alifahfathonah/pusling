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

   <!-- Custom styles for this page -->
  <link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />

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
                                    <li ><a href="<?php echo site_url()?>statistik">Statistiks</a></li>
                                    <li class="active"><a href="<?php echo site_url()?>profil">Profil</a></li>
                                    <li ><a href="<?php echo site_url()?>kontak">Kontak</a></li>
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
    <section class="site-section" id="contact-section">
      <div class="container">
        <div class="row mb-5">
        </div>
        <div class="row">
          <div class="col-md-12">
            <?php foreach ($profil as $key){ ?>
               <h2><?= $key->judul?></h2>
               <img src="<?php echo base_url('assets/images_profil/'.$key->gambar)?>">
               <div class="col-md-12" align="justify"><?= $key->isi?></div>
            <?php } ?> 
            <br>
            <br>
            <br>
          </div>
        </div>
      </div>
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
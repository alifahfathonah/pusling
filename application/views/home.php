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
	<!-- Custom styles for this page -->
	<link href="<?php echo base_url('assets/datatables/dataTables.bootstrap4.min.css') ?>" rel="stylesheet">
	<link rel="stylesheet" href="<?= base_url('assets/leaflet/leaflet.css') ?>" />

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
							<a href="tel://<?php echo $kon->no_hp ?>"><i class="fa fa-phone" aria-hidden="true"></i>
								<span>Call Us: <?php echo $kon->no_hp ?></span></a>
							<a href="mailto:<?php echo $kon->email ?>"><i class="fa fa-envelope" aria-hidden="true"></i>
								<span>Email: <?php echo $kon->email ?></span></a>

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
						<a class="nav-brand" href="<?php echo site_url()?>home">
							<p style="color: white;">Pusling.</p>
						</a>

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
									<li class="active"><a href="<?php echo site_url()?>home">Home</a></li>
									<li><a href="<?php echo site_url()?>galeri">Galeri</a></li>
									<li><a href="<?php echo site_url()?>statistik">Statistiks</a></li>
									<li><a href="<?php echo site_url()?>profil">Profil</a></li>
									<li><a href="<?php echo site_url()?>kontak">Kontak</a></li>
								</ul>
								<?php if($this->session->userdata('role') === 'superadmin'): ?>
								<div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
									<a href="<?php echo site_url()?>admin/overview"
										class="btn hami-btn live--chat--btn"><i class="fa fa-users"
											aria-hidden="true"></i> Dashboard</a>
								</div>
								<?php endif; ?>
								<?php if($this->session->userdata('role') === 'pustakawan'): ?>
								<div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
									<a href="<?php echo site_url()?>pustakawan/overview"
										class="btn hami-btn live--chat--btn"><i class="fa fa-users"
											aria-hidden="true"></i> Dashboard</a>
								</div>
								<?php endif; ?>
								<?php if($this->session->userdata('role') === 'kasi'): ?>
								<div class="live-chat-btn ml-5 mt-4 mt-lg-0 ml-md-4">
									<a href="<?php echo site_url()?>kasi/overview"
										class="btn hami-btn live--chat--btn"><i class="fa fa-users"
											aria-hidden="true"></i> Dashboard</a>
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
									<h3 data-animation="fadeInLeftBig" data-delay="200ms" data-duration="1s">
										Perpustakaan Keliling Kabupaten Indramayu</h3>
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
					<img src="<?php echo base_url()?>images/murid.png">
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
									<h3 data-animation="fadeInUpBig" data-delay="400ms" data-duration="1s">Perpustakaan
										Keliling Kabupaten Indramayu</h3>
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
						<h2>Statistik Pusling</h2>
					</div>
				</div>
			</div>

			<div class="row justify-content-center">

				<!-- Single Price Plan -->

				<div class="col-12 col-md-6 col-lg-4">
					<div class="single-price-plan mb-100">
						<!-- Title -->
						<div class="price-plan-title">
							<h4>Motor Pusling</h4>
						</div>
						<!-- Value -->
						<div class="price-plan-value">
							<h2 class="counter"><?= $Motor['count(*)'] ?></h2>
						</div>
						<!-- Button -->
						<a href="<?= site_url()?>statistik" class="btn hami-btn w-100 mb-30"><i
								class="fa fa-motorcycle"></i></a>
					</div>
				</div>

				<!-- Single Price Plan -->
				<div class="col-12 col-md-6 col-lg-4">
					<div class="single-price-plan mb-100">
						<!-- Title -->
						<div class="price-plan-title">
							<h4>Mobil Pusling</h4>
						</div>
						<!-- Value -->
						<div class="price-plan-value">
							<h2 class="counter"><?= $Mobil['count(*)'] ?></h2>
						</div>
						<!-- Button -->
						<a href="<?= site_url()?>statistik" class="btn hami-btn w-100 mb-30"><i
								class="fa fa-car"></i></a>
					</div>
				</div>

			</div>
		</div>
	</section>
	<!-- Find Domain Area End -->
	<section class="hami-features-area bg-gray section-padding-100">
		<div class="container">
			<div class="row">
				<!-- Section Heading -->
				<div class="col-12 ">
					<div class="section-heading text-center">
						<h2>Jadwal Pusling</h2>
						<div class="table-responsive single-price-plan" style="background: #fff;">
							<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>No</th>
										<th>Hari</th>
										<th>Tanggal</th>
										<th>Waktu</th>
										<th>Lokasi</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$hari = array ( 1 =>    'Senin',
										'Selasa',
										'Rabu',
										'Kamis',
										'Jumat',
										'Sabtu',
										'Minggu'
									);
									?>
									<?php
                                        $no = 1; 
                                        foreach($jadwal as $hasil){ 
                                    ?>
									<tr>
										<td><?php echo $no++ ?></td>
										<td><?= $hari[ date('N', strtotime($hasil->waktu)) ]  ?></td>
										<td><?= date('d F Y', strtotime($hasil->waktu)) ?></td>
										<td><?= date('H:i', strtotime($hasil->waktu))?></td>
										<td><?php echo $hasil->lokasi ?></td>
									</tr>
									<?php } ?>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Feature Pattern -->
		<div class="feature-pattern">
			<img src="<?php echo base_url()?>landing_page/img/core-img/welcome-pattern.png" alt="">
		</div>
	</section>

	<section class="hami-testimonial-area section-padding-0-100" style="padding-top: 100px;">
		<div class="container">
			<div class="row">

			</div>
		</div>

		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					<div class="testimonial-slide owl-carousel">
						<?php foreach ($testimoni as $key): ?>

						<!-- Single Testimonial Area -->
						<div class="single-testimonial-area">
							<div class="testimonial-content">
								<!-- Ratings & Quote -->
								<div class="ratings-icon d-flex align-items-center justify-content-between">

									<div class="quote-icon">
										<img src="<?php base_url()?>landing_page/img/core-img/quote.png" alt="">
									</div>
								</div>
								<h5><?= $key->komentar ?></h5>
							</div>
							<!-- Testimonial -->
							<div class="testimonial-thumbnail-title d-flex align-items-center">
								<div class="testimonial-thumbnail">
									<img src="<?php echo base_url('assets/images_testimoni/'.$key->gambar) ?>" alt=""
										style="height: 80px;">
								</div>
								<div class="testimonial-title">
									<h5><?= $key->nama ?></h5>
									<span><?= $key->jabatan ?></span>
								</div>
							</div>
						</div>


						<?php endforeach ?>

						<!-- Single Testimonial Area -->


					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- Features Area Start -->
	<section class="hami-features-area bg-gray section-padding-100">
		<div class="container">
			<div class="row">
				<!-- Section Heading -->
				<div class="col-12">
					<div class="section-heading text-center">
						<h2>Apa itu Pusling?</h2>
						<p>Perpustakaan keliling adalah perpustakaan yang bergerak dengan membawa buku buku perpustakaan
							untuk melayani sekolah sekolah bahkan masyarakat dari satu tempat ke tempat lain yang belum
							terjangkau oleh perpustakaan umum. Perpustakaan Keliling yang terbagi menjadi dua yaitu :
						</p>
					</div>
				</div>
			</div>

			<div class="row">

				<!-- Single Feature Area -->

				<div class="col-12 col-sm-6 col-lg-4">
					<div class="single-feature-area d-flex mb-50">
						<div class="feature-icon">
							<i class="fa fa-motorcycle"></i>
						</div>
						<div class="feature-text">
							<h5>Motor Pusling</h5>
							<p>Motor Pusling adalah bagian dari pelayanan perpustakaan kabupaten indramayu yang
								mendatangi atau mengunjungi pembacanya. Dengan motor perpustakaan keliling dapat
								meratakan layanan informasi dan bacaan kepada masyarakat sampai ke tempat-tempat yang
								belum memungkinkan adanya perpustakaan di sekolahnya.</p>
						</div>
					</div>
				</div>
				<div class="col-12 col-sm-6 col-lg-4">
				</div>
				<!-- Single Feature Area -->
				<div class="col-12 col-sm-6 col-lg-4">
					<div class="single-feature-area d-flex mb-50">
						<div class="feature-icon">
							<i class="fa fa-car"></i>
						</div>
						<div class="feature-text">
							<h5>Mobil Pusling</h5>
							<p>Mobil Pusling adalah bagian dari pelayanan perpustakaan kabupaten indramayu yang
								mendatangi atau mengunjungi pembacanya. Dengan mobil perpustakaan keliling dapat
								meratakan layanan informasi dan bacaan kepada masyarakat sampai ke tempat-tempat yang
								belum memungkinkan adanya perpustakaan di sekolahnya. </p>
						</div>
					</div>
				</div>

			</div>
		</div>

		<!-- Feature Pattern -->
		<div class="feature-pattern">
			<img src="<?php echo base_url()?>landing_page/img/core-img/welcome-pattern.png" alt="">
		</div>
	</section>
	<!-- Features Area End -->

	<!-- Features Area Start -->
	<section class="hami-features-area section-padding-100">
		<div class="container">
			<div class="row">
				<!-- Section Heading -->
				<div class="col-12">
					<div class="section-heading text-center">
						<h2>Peta Layanan Pusling</h2>
					</div>
				</div>
			</div>

			<div id="mapid" style="height: 600px;"></div>

		</div>

	</section>
	<!-- Features Area End -->

	<!-- Footer Area Start -->
	<footer class="footer-area section-padding-80-0">

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
								<a href="https://www.facebook.com/disarpusindramayu/" class="facebook"><i
										class="fa fa-facebook" aria-hidden="true"></i></a>
								<a href="https://www.instagram.com/disarpusindramayu/" class="instagram"><i
										class="fa fa-instagram" aria-hidden="true"></i></a>
								<a href="https://twitter.com/perpusdaimyu" class="twitter"><i class="fa fa-twitter"
										aria-hidden="true"></i></a>
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
							<p>
								<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								Copyright &copy;<script>
									document.write(new Date().getFullYear());

								</script> Perpustakaan Keliling Indramayu Kabupaten Indramayu
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

	<!-- Bootstrap core JavaScript-->
	<?php $this->load->view("admin/_partials/js.php") ?>
	<script src="<?= base_url('assets/leaflet/leaflet.js') ?>"></script>
	<script src="<?= base_url('assets/leaflet/leaflet.ajax.js') ?>"></script>

	<script>
		var mymap = L.map('mapid').setView([-6.45, 108.24], 11);
		L.tileLayer(
			'https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
				maxZoom: 18,
				attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
					'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
					'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
				id: 'mapbox/streets-v9',
				tileSize: 512,
				zoomOffset: -1
			}).addTo(mymap);


		function getColor(d) {
			return 'yellow'
		}

		"<?php foreach($alljadwal as $hasil) : ?>"
		L.circle(["<?= $hasil->latitude ?>", "<?= $hasil->longitude ?>"], {
			color: 'red',
			fillColor: 'red',
			fillOpacity: 1,
			radius: 100
		}).addTo(mymap);
		"<?php endforeach; ?>"



		function style(feature) {
			return {
				fillColor: getColor(feature.properties.KECAMATAN),
				weight: 2,
				opacity: 1,
				color: 'white',
				dashArray: '3',
				fillOpacity: 0.2
			};
		}


		function popUp(f, l) {
			var out = [];
			if (f.properties) {
				for (key in f.properties) {
					out.push(key + ": " + f.properties[key]);
				}
				l.bindPopup(out.join("<br />"));
			}
		}



		function whenClicked(e) {
			// e = event
			console.log(e);
			// You can make your ajax call declaration here
			//$.ajax... 
		}

		function onEachFeature(feature, layer) {
			//bind click
			layer.on({
				click: whenClicked
			});
		}

		var jsonTest = new L.GeoJSON.AJAX(["<?= base_url('assets/geojson/indramayu.geojson') ?>"], {
			onEachFeature: popUp,
			style: style
		}).addTo(mymap);

	</script>


</body>

</html>

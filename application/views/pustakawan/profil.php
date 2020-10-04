<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("pustakawan/_partials/head.php") ?>

	<!--   <script type="text/javascript" src="<?php echo base_url('js/instascan.min.js')?>"></script> -->
	<script src="https://unpkg.com/vue@2.6.10/dist/vue.min.js"></script>
	<script src="https://unpkg.com/vue-qrcode-reader@2.0.3/dist/vue-qrcode-reader.browser.js"></script>
	<link rel="stylesheet" href="https://unpkg.com/vue-qrcode-reader@2.0.3/dist/vue-qrcode-reader.css">

	<script>
		var baseurl = "<?php echo base_url("
		index.php / "); ?>"; // Buat variabel baseurl untuk nanti di akses pada file config.js

	</script>
	<script src="<?php echo base_url("js/jquery.min.js"); ?>"></script> <!-- Load library jquery -->
	<script src="<?php echo base_url("js/config.js"); ?>"></script> <!-- Load file process.js -->
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo site_url('pustakawan/overview')?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Pustakawan Pusling</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('pustakawan/overview')?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Menu
			</div>

			<!-- Entry data -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsebuatlaporan"
					aria-expanded="true" aria-controls="collapsebuatlaporan">
					<i class="fas fa-fw fa-folder"></i>
					<span>Buat Laporan</span>
				</a>
				<div id="collapsebuatlaporan" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo site_url('pustakawan/buat_laporan')?>">Laporan Pusling</a>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/buat_laporan_buku')?>">Buku Yang Dibaca</a>
					</div>
				</div>
			</li>

			<?php 
      $id = $this->session->userdata("user_id");
      $notif = $this->db->select('*')
                        ->from('laporan_buku')
                        ->where('id_users', $id)
                        ->where('status','baca')
                        ->get()->result();?>
			<!-- Nav Item - Laporan Collapse Menu -->
			<li class="nav-item">
				<?php if(count($notif)>0){?>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
					aria-controls="collapsePages">
					<i class="fas fa-fw fa-book"></i>
					<span>Laporan <span class="badge badge-danger"><?php echo count($notif)?></span></span>
				</a>
				<?php }else{?>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
					aria-controls="collapsePages">
					<i class="fas fa-fw fa-book"></i>
					<span>Laporan</span>
				</a>
				<?php }?>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_pusling')?>">Laporan Pusling</a>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_buku')?>">Buku Yang Dibaca</a>

						<?php if(count($notif)>0){?>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_buku/baca')?>">Sirkulasi Buku
							<span class="badge badge-danger"><?php echo count($notif)?></span></a>
						<?php }else{?>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_buku/baca')?>">Sirkulasi Buku</a>
						<?php }?>
					</div>
				</div>
			</li>



			<!-- Divider -->
			<hr class="sidebar-divider d-none d-md-block">

			<!-- Sidebar Toggler (Sidebar) -->
			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>

		</ul>
		<!-- End of Sidebar -->

		<!-- Content Wrapper -->
		<div id="content-wrapper" class="d-flex flex-column">

			<!-- Main Content -->
			<div id="content">

				<!-- Topbar -->
				<?php $this->load->view("pustakawan/_partials/navbar.php") ?>

				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Profil</h1>
					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<div>
								<?php if($this->session->flashdata('update') == TRUE): ?>
								<div class="alert alert-success alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata('update')?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php endif; ?>
								<?php if($this->session->flashdata('gagal') == TRUE): ?>
								<div class="alert alert-danger alert-dismissible fade show" role="alert">
									<?php echo $this->session->flashdata('gagal')?>
									<button type="button" class="close" data-dismiss="alert" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<?php endif; ?>
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="data-tab" data-toggle="tab" href="#data" role="tab"
											aria-controls="data" aria-selected="true">Data Diri</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="pass-tab" data-toggle="tab" href="#pass" role="tab" aria-controls="pass"
											aria-selected="false">Ubah Password</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="data" role="tabpanel" aria-labelledby="data-tab">
										<br>
										<?php foreach ($pustakawan as $form) { ?>
										<form method="POST" action="<?php echo site_url('pustakawan/profil/update')?>"
											enctype="multipart/form-data">
											<input type="hidden" name="id_pustakawan" value="<?= $form->id_pustakawan ?>">
											<div class="form-group">
												<label for="nama_pustakawan">Nama</label>
												<input type="text" class="form-control" id="nama_pustakawan"
													value="<?= $form->nama_pustakawan?>" name="nama_pustakawan">
												<span style="color: red;"><?=form_error('nama_pustakawan')?></span>
											</div>
											<div class="form-group">
												<label for="nama_pustakawan">Telp</label>
												<input type="text" class="form-control" id="telp_pustakawan"
													value="<?= $form->telp_pustakawan?>" name="telp_pustakawan">
												<span style="color: red;"><?=form_error('telp_pustakawan')?></span>
											</div>
											<div class="form-group">
												<label for="nama_pustakawan">Alamat</label>
												<input type="text" class="form-control" id="alamat_pustakawan"
													value="<?= $form->alamat_pustakawan?>" name="alamat_pustakawan">
												<span style="color: red;"><?=form_error('alamat_pustakawan')?></span>
											</div>
											<button type="submit" class="btn btn-primary">Submit</button>
										</form>
										<?php } ?>
									</div>
									<div class="tab-pane fade" id="pass" role="tabpanel" aria-labelledby="pass-tab">
										<br>
										<?php foreach ($pustakawan as $pass) { ?>
										<form method="POST" action="<?php echo site_url('pustakawan/profil/update_password')?>"
											enctype="multipart/form-data">
											<input type="hidden" name="id_users" value="<?= $this->session->userdata("user_id")?>">
											<div class="form-group">
												<label for="nama_pustakawan">Password Lama</label>
												<input type="password" class="form-control" id="password_lama" value="" name="password_lama">
												<span style="color: red;"><?=form_error('password_lama')?></span>
											</div>
											<div class="form-group">
												<label for="nama_pustakawan">Password Baru</label>
												<input type="password" class="form-control" id="password_baru" value="" name="password_baru">
												<span style="color: red;"><?=form_error('password_baru')?></span>
											</div>
											<div class="form-group">
												<label for="nama_pustakawan">Konfirmasi Password Baru</label>
												<input type="password" class="form-control" id="konfir_password_baru" value=""
													name="konfir_password_baru">
												<span style="color: red;"><?=form_error('konfir_password_baru')?></span>
											</div>
											<button type="submit" class="btn btn-primary">Submit</button>
										</form>
										<?php }?>
									</div>
									<div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
								</div>

							</div>
						</div>

					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view("pustakawan/_partials/footer.php") ?>

			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- modal video -->


	<!--  <script type="text/javascript">

      let scanner = new Instascan.Scanner({ video: document.getElementById('preview') });


      scanner.addListener('scan', function (content) {

      	document.getElementById("kode_buku").innerHTML=content;
        document.getElementById("deteksi").innerHTML=content;



      });

      Instascan.Camera.getCameras().then(function (cameras) {

        if (cameras.length > 0) {

          scanner.start(cameras[0]);

        } else {

          console.error('No cameras found.');

        }

      }).catch(function (e) {

        console.error(e);

      });

    </script> -->


	<!-- Logout Modal-->
	<?php $this->load->view("pustakawan/_partials/modal.php") ?>

	<!-- Bootstrap core JavaScript-->
	<?php $this->load->view("pustakawan/_partials/js.php") ?>


</body>

</html>

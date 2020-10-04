<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo site_url('admin/overview')?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-book"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Admin Pusling</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/overview')?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Menu
			</div>

			<!-- Nav Item - Profil -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/profil')?>">
					<i class="fas fa-fw fa-user"></i>
					<span>Profil</span></a>
			</li>

			<!-- Nav Item - Galeri -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/galeri')?>">
					<i class="fas fa-fw fa-image"></i>
					<span>Galeri</span></a>
			</li>

			<!-- Nav Item - Testimoni -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/testimoni')?>">
					<i class="fas fa-fw fa-star"></i>
					<span>Testimoni</span></a>
			</li>


			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/jadwal')?>">
					<i class="fas fa-fw fa-calendar"></i>
					<span>Jadwal</span></a>
			</li>

			<!-- Nav Item - Kontak -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/kontak')?>">
					<i class="fas fa-fw fa-phone"></i>
					<span>Kontak</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Nav Item - User Management -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
					aria-expanded="true" aria-controls="collapseUtilities">
					<i class="fas fa-fw fa-users"></i>
					<span>User Management</span>
				</a>
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<h6 class="collapse-header">Data :</h6>
						<a class="collapse-item" href="<?php echo site_url('admin/user')?>">User Management</a>
						<a class="collapse-item" href="<?php echo site_url('admin/pustakawan')?>">Pustakawan</a>
					</div>
				</div>
			</li>

			<!-- Nav Item - Laporan -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/laporan')?>">
					<i class="fas fa-fw fa-table"></i>
					<span>Laporan</span></a>
			</li>

			<!-- Nav Item - Daftar Buku -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo site_url('admin/buku')?>">
					<i class="fas fa-fw fa-book"></i>
					<span>Daftar Buku</span></a>
			</li>

			<!-- Nav Item - Daftar Buku -->
			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/kendaraan')?>">
					<i class="fas fa-fw fa-car"></i>
					<span>Data Kendaraan</span></a>
			</li>

			<!-- Nav Item - data Klasifikasi -->
			<!-- <li class="nav-item ">
        <a class="nav-link" href="<?php echo site_url('admin/klasifikasi')?>">
          <i class="fas fa-fw fa-book"></i>
          <span>Data klasifikasi</span></a>
      </li> -->

			<li class="nav-item">
				<a class="nav-link" href="<?php echo site_url('admin/cetakqr')?>">
					<i class="fas fa-fw fa-qrcode"></i>
					<span>Cetak QR</span></a>
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
				<?php $this->load->view("admin/_partials/navbar.php") ?>

				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<form method="POST" action="<?php echo site_url('admin/buku/update')?>" enctype="multipart/form-data">
								<div class="form-group">
									<label for="text">Kode Buku</label>
									<input type="text" name="kode_buku" class="form-control" value="<?php echo $buku->kode_buku ?>"
										placeholder="Masukkan Kode Buku" autofocus>
									<input type="hidden" value="<?php echo $buku->id_buku ?>" name="id_buku">
									<span style="color: red;"><?=form_error('kode_buku')?></span>
								</div>
								<div class="form-group">
									<label for="text">Judul</label>
									<input type="text" name="judul" value="<?php echo $buku->judul ?>" class="form-control"
										placeholder="Masukkan Judul">
									<input type="hidden" value="<?php echo $buku->id_buku ?>" name="id_buku">
									<span style="color: red;"><?=form_error('judul')?></span>
								</div>
								<div class="form-group">
									<label for="text">Pengarang</label>
									<input type="text" name="pengarang" class="form-control" value="<?php echo $buku->pengarang ?>"
										placeholder="Masukkan Pengarang">
									<input type="hidden" value="<?php echo $buku->id_buku ?>" name="id_buku">
									<span style="color: red;"><?=form_error('pengarang')?></span>
								</div>
								<div class="form-group">
									<label for="text">Penerbit</label>
									<input type="text" name="penerbit" class="form-control" value="<?php echo $buku->penerbit ?>"
										placeholder="Masukkan Penerbit">
									<input type="hidden" value="<?php echo $buku->id_buku ?>" name="id_buku">
									<span style="color: red;"><?=form_error('penerbit')?></span>
								</div>
								<div class="form-group">
									<label for="text">Tempat Terbit</label>
									<input type="text" name="tempat_terbit" class="form-control"
										value="<?php echo $buku->tempat_terbit ?>" placeholder="Masukkan Tempat Terbit">
									<input type="hidden" value="<?php echo $buku->id_buku ?>" name="id_buku">
									<span style="color: red;"><?=form_error('tempat_terbit')?></span>
								</div>
								<div class="form-group">
									<label>Klasifikasi</label>
									<select class="form-control" name="id_klasifikasi" id="id_klasifikasi" required>
										<?php echo $buku->klasifikasi ?>
										<option value="">--Pilih--</option>
										<?php
                  foreach ($klasifikasi as $hasil){?>
										<option value="<?=$hasil->id_klasifikasi?>"
											<?php if($buku_klasifikasi['id_klasifikasi']=="$hasil->id_klasifikasi"){echo "selected";} ?>>
											<?= $hasil->klasifikasi?></option>
										<?php } ?>
									</select>
									<span style="color: red;"><?=form_error('klasifikasi')?></span>
								</div>
								<!-- <div class="form-group">
                <label for="text">Klasifikasi</label>
                <input type="text" name="klasifikasi" class="form-control" value="<?=set_value('klasifikasi')?>" placeholder="Masukkan Klasifikasi" >
                <span style="color: red;"><?=form_error('klasifikasi')?></span>
              </div> -->
								<button type="submit" class="btn btn-md btn-success" name="submit">Simpan</button>
								<a href="<?php echo site_url()?>admin/buku" class="btn btn-md btn-primary">Back</a>
							</form>
						</div>
					</div>

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view("admin/_partials/footer.php") ?>

			<!-- End of Footer -->

		</div>
		<!-- End of Content Wrapper -->

	</div>
	<!-- End of Page Wrapper -->

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<!-- Logout Modal-->
	<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
		aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
					<button class="close" type="button" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">×</span>
					</button>
				</div>
				<div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
				<div class="modal-footer">
					<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
					<a class="btn btn-primary" href="login.html">Logout</a>
				</div>
			</div>
		</div>
	</div>

	<!-- Bootstrap core JavaScript-->
	<?php $this->load->view("admin/_partials/js.php") ?>


</body>

</html>

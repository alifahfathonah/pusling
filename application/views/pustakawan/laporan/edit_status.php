<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("pustakawan/_partials/head.php") ?>
	<?php $this->load->view("pustakawan/_partials/geo.php") ?>

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
			<li class="nav-item ">
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
			<li class="nav-item active">
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

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<?php if($this->session->flashdata('tambah') == TRUE): ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?php echo $this->session->flashdata('tambah')?>
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
							<form method="POST" action="<?php echo site_url('pustakawan/laporan_buku/update')?>"
								enctype="multipart/form-data">
								<div class="form-group">
									<label for="text">Ubah Status *</label>
									<select name="status" class="form-control">
										<option <?php if($baca->status=="baca"){echo "selected";} ?> value="baca">Baca</option>
										<option <?php if($baca->status=="kembali"){echo "selected";} ?> value="kembali">Kembali</option>
									</select><br />

									<input type="hidden" value="<?php echo $baca->id_laporan_buku ?>" name="id_laporan_buku">
								</div>

								<!-- <div class="form-group">
                <label>Jenis Kendaraan</label>
                <select class="form-control" name="jenis_kendaraan" value="<?=set_value('jenis_kendaraan')?>" id="jenis_kendaraan">
                  <option value="" selected="" disabled="">--Pilih--</option>
                  <option value="Motor">Motor</option>
                  <option value="Mobil">Mobil</option>
                  ?>
                </select>
                <span style="color: red;"><?=form_error('jenis_kendaraan')?></span>
              </div> -->
								<!-- <div class="form-group">
                <label for="text">Klasifikasi</label>
                <input type="text" name="klasifikasi" class="form-control" value="<?=set_value('klasifikasi')?>" placeholder="Masukkan Klasifikasi" >
                <span style="color: red;"><?=form_error('klasifikasi')?></span>
              </div> -->
								<button type="submit" class="btn btn-md btn-success" name="submit">Simpan</button>
								<a href="<?php echo site_url()?>pustakawan/laporan_buku/baca" class="btn btn-md btn-primary">Back</a>
							</form>
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

	<!-- Logout Modal-->
	<?php $this->load->view("pustakawan/_partials/modal.php") ?>

	<!-- Bootstrap core JavaScript-->
	<?php $this->load->view("pustakawan/_partials/js.php") ?>

	<script>
		$(document).ready(function () {
			$('#kode_kendaraan_motor').hide();
			$('#kode_kendaraan_mobil').hide();
			$('#label_motor').hide();
			$('#label_mobil').hide();

			$('#jenis_pusling').on('change', function () {
				var value = $(this).val();
				if (value == "Mobil") {
					$('#label_mobil').show();
					$('#kode_kendaraan_mobil').show();
					$('#kode_kendaraan_motor').hide();
					$('#label_motor').hide();
				} else if (value == "Motor") {
					$('#label_motor').show();
					$('#kode_kendaraan_motor').show();
					$('#kode_kendaraan_mobil').hide();
					$('#label_mobil').hide();
				} else {
					$('#kode_kendaraan_motor').hide();
					$('#kode_kendaraan_mobil').hide();
					$('#label_motor').hide();
					$('#label_mobil').hide();
				}
			});
		});

	</script>


</body>

</html>

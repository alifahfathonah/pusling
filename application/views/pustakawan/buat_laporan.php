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
			<li class="nav-item active">
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

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<div class="progress">
								<div class="progress-bar progress-bar-striped active" role="progressbar" aria-valuemin="0"
									aria-valuemax="100"></div>
							</div>
							<br>
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
							<form id="regiration_form" method="POST" action="<?php echo site_url('pustakawan/buat_laporan/simpan')?>"
								enctype="multipart/form-data">

								<fieldset>
									<h4>Step 1: Data Diri</h4>
									<div class="tab form-group">
										<label for="text"><strong>Nama :</strong></label>
										<input class="form-control" type="text" placeholder="Masukan Nama anda"
											value="<?php echo $this->session->userdata('user_nama') ?>" name="nama" readonly>
										<span style="color: red;"><?=form_error('nama')?></span>
										<br>
										<label for="text"><strong>Pustakwan :</strong></label>
										<select class="form-control" name="nama_ast" id="nama_ast">
											<option selected disabled="disabled">--Pilih Pustakwan--</option>
											<?php
                  foreach ($pustakawan as $hasil){
                    echo "<option value='$hasil[nama_pustakawan]'>$hasil[nama_pustakawan]</option>";
                  }
                  ?>
										</select>
										<span style="color: red;"><?=form_error('nama_ast')?></span>
										<br>
										<label for="text"><strong>Supir :</strong></label>
										<select class="form-control" name="nama_sup" id="nama_sup">
											<option selected disabled="disabled">--Pilih Supir--</option>
											<?php
                  foreach ($pustakawan as $hasil){
                    echo "<option value='$hasil[nama_pustakawan]'>$hasil[nama_pustakawan]</option>";
                  }
                  ?>
										</select>
										<span style="color: red;"><?=form_error('nama_sup')?></span>
									</div>
									<input type="button" name="password" class="next btn btn-info" value="Lanjut" />
								</fieldset>
								<fieldset>
									<h4> Step 2: Data Pusling</h4>
									<div class="tab form-group">
										<label for="text"><strong>Jenis Pusling</strong></label>
										<select name="jenis_pusling" class="form-control" id="jenis_pusling">
											<option selected disabled="disabled">-- Pilih Jenis Pusling --</option>
											<option value="Mobil">Mobil Pusling</option>
											<option value="Motor">Motor Pusling</option>
										</select>
										<span style="color: red;"><?=form_error('jenis_pusling')?></span>
										<br>
										<label for="text" id="label_motor"><strong>Kode Kendaraan :</strong></label>
										<label for="text" id="label_mobil"><strong>Kode Kendaraan :</strong></label>
										<select class="form-control" name="kode_kendaraan" id="kode_kendaraan_motor">
											<option selected disabled="disabled">--Pilih Kode Kendaraan--</option>
											<?php
                  foreach ($kendaraan_motor as $hasil){
                    echo "<option value='$hasil[kode_kendaraan]'>$hasil[kode_kendaraan]</option>";
                  }
                  ?>
										</select>
										<select class="form-control" name="kode_kendaraan" id="kode_kendaraan_mobil">
											<option selected disabled="disabled">--Pilih Kode Kendaraan--</option>
											<?php
                  foreach ($kendaraan_mobil as $hasil){
                    echo "<option value='$hasil[kode_kendaraan]'>$hasil[kode_kendaraan]</option>";
                  }
                  ?>
										</select>
										<span style="color: red;"><?=form_error('kode_kendaraan')?></span>
										<br>

										<!-- display google map -->

										<div class="form-group input-group">
											<input type="text" id="search_location" class="form-control" placeholder="Cari Lokasi!">
											<div class="input-group-btn">
												<button class="btn btn-default get_map" type="submit">
													Locate
												</button>
											</div>
										</div>
										<div id="geomap"></div>

										<br>

										<label for="text"><strong>Alamat Lokasi </strong>:</label>
										<input class="form-control search_addr" type="text" name="alamat_lokasi"
											value="<?=set_value('alamat_lokasi')?>">
										<span style="color: red;"><?=form_error('alamat_lokasi')?></span>
										<br>
										<label for="text"><strong>Nama Pengelola :</strong></label>
										<input class="form-control" type="text" placeholder="Masukan Nama Pengelola" name="nama_pengelola"
											value="<?=set_value('nama_pengelola')?>">
										<span style="color: red;"><?=form_error('nama_pengelola')?></span>
										<br>
										<label for="text"><strong>No Hp Pengelola :</strong></label>
										<input class="form-control" type="text" placeholder="Masukan No Hp" name="no_pengelola"
											value="<?=set_value('no_pengelola')?>">
										<span style="color: red;"><?=form_error('no_pengelola')?></span>
										<br>
									</div>
									<input type="button" name="previous" class="previous btn btn-default" value="Kembali" />
									<input type="button" name="next" class="next btn btn-info" value="Lanjut" />
								</fieldset>
								<fieldset>
									<h4>Step 3: Data Laporan Pusling</h4>
									<div class="tab form-group">
										<label for="number"><strong>Total Pengunjung :</strong></label>
										<input type="number" min="0" class="form-control" placeholder="Masukan Total Pengunjung"
											name="tot_pengunjung" value="<?php
                      $this->db->select("COUNT(jenis_kelamin) as pria");
                      $this->db->where('id_users', $this->session->userdata("user_id"));
                      $this->db->where('tanggal', date('Y-m-d'));
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->pria;
                      ?>" readonly />
										<span style="color: red;"><?=form_error('tot_pengunjung')?></span>
										<br>
										<label for="number"><strong>Laki-Laki :</strong></label>
										<input type="number" min="0" class="form-control" placeholder="Masukan Jumlah Pengunjung Laki-Laki"
											name="tot_lk" value="<?php
                      $this->db->select("COUNT(jenis_kelamin) as pria");
                      $this->db->where('jenis_kelamin', 'Pria');
                      $this->db->where('id_users', $this->session->userdata("user_id"));
                      $this->db->where('tanggal', date('Y-m-d'));
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->pria;
                      ?>" readonly />
										<span style="color: red;"><?=form_error('tot_lk')?></span>
										<br>
										<label for="number"><strong>Perempuan :</strong></label>
										<input type="number" min="0" class="form-control" placeholder="Masukan Jumlah Pengunjung Perempuan"
											name="tot_pr" value="<?php
                      $this->db->select("COUNT(jenis_kelamin) as wanita");
                      $this->db->where('jenis_kelamin', 'Wanita');
                      $this->db->where('id_users', $this->session->userdata("user_id"));
                      $this->db->where('tanggal', date('Y-m-d'));
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->wanita;
                      ?>" readonly />
										<span style="color: red;"><?=form_error('tot_pr')?></span>
										<br>
										<label for="text"><strong>Image : </strong></label>
										<input type="file" name="gambar"><br>
										<span style="color: red;"><?=form_error('gambar')?></span>
										<label for="text"><strong>Image : </strong></label>
										<input type="file" name="gambar2"><br>
										<span style="color: red;"><?=form_error('gambar2')?></span>
										<br>
									</div>
									<input type="button" name="previous" class="previous btn btn-default" value="Kembali" />
									<button type="submit" name="submit" class="btn btn-md btn-success">Selesai</button>
								</fieldset>
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

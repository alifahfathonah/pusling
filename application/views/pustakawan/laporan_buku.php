<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("pustakawan/_partials/head.php") ?>
	<link rel="stylesheet" href="<?php echo base_url('assets/jquery-ui/jquery-ui.min.css'); ?>" />
	<!-- Load file css jquery-ui -->
	<script src="<?php echo base_url('js/jquery.min.js'); ?>"></script> <!-- Load file jquery -->
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
				<div id="collapsebuatlaporan" class="collapse" aria-labelledby="headingPages"
					data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo site_url('pustakawan/buat_laporan')?>">Laporan
							Pusling</a>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/buat_laporan_buku')?>">Buku Yang
							Dibaca</a>
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
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
					aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-book"></i>
					<span>Laporan <span class="badge badge-danger"><?php echo count($notif)?></span></span>
				</a>
				<?php }else{?>
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
					aria-expanded="true" aria-controls="collapsePages">
					<i class="fas fa-fw fa-book"></i>
					<span>Laporan</span>
				</a>
				<?php }?>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_pusling')?>">Laporan
							Pusling</a>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_buku')?>">Buku Yang
							Dibaca</a>

						<?php if(count($notif)>0){?>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_buku/baca')?>">Sirkulasi
							Buku
							<span class="badge badge-danger"><?php echo count($notif)?></span></a>
						<?php }else{?>
						<a class="collapse-item" href="<?php echo site_url('pustakawan/laporan_buku/baca')?>">Sirkulasi
							Buku</a>
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
						<h1 class="h3 mb-0 text-gray-800">Laporan</h1>
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
								class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
					</div>
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Tabel Laporan</h6>
						</div>
						<?php if($this->session->flashdata('hapus') == TRUE): ?>
						<div class="alert alert-danger alert-dismissible fade show" role="alert">
							<?php echo $this->session->flashdata('hapus')?>
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<?php endif; ?>
						<div class="card-body">
							<form method="get" action="" class="col col-lg-6">

								<div class="row">
									<label>Filter Berdasarkan</label><br>
									<select name="filter" id="filter" class="form-control">
										<option value="">Pilih</option>
										<option value="1">Per Tanggal</option>
										<option value="2">Per Bulan</option>
										<option value="3">Per Tahun</option>
									</select>
									<br /><br />

									<div id="form-tanggal" class="form-group col-sm">
										<label>Tanggal</label><br>
										<input type="text" name="tanggal" class="input-tanggal form-control" />
										<br /><br />
									</div>

									<div id="form-bulan" class="form-group col-sm">
										<label>Bulan</label><br>
										<select name="bulan" class="form-control">
											<option value="">Pilih</option>
											<option value="1">Januari</option>
											<option value="2">Februari</option>
											<option value="3">Maret</option>
											<option value="4">April</option>
											<option value="5">Mei</option>
											<option value="6">Juni</option>
											<option value="7">Juli</option>
											<option value="8">Agustus</option>
											<option value="9">September</option>
											<option value="10">Oktober</option>
											<option value="11">November</option>
											<option value="12">Desember</option>
										</select>
										<br /><br />
									</div>

									<div id="form-tahun" class="form-group col-sm">
										<label>Tahun</label><br>
										<select name="tahun" class="form-control">
											<option value="">Pilih</option>
											<?php
                          foreach($option_tahun as $data){ // Ambil data tahun dari model yang dikirim dari controller
                              echo '<option value="'.$data->tahun.'">'.$data->tahun.'</option>';
                          }
                          ?>
										</select>
										<br /><br />
									</div>

								</div>








								<button type="submit" class="btn btn-primary">Tampilkan</button>
								<a href="<?php echo base_url('pustakawan/laporan_buku'); ?>"
									class="btn btn-danger">Reset Filter</a>
								<a href="<?php echo $url_cetak; ?>" target="_blank" class="btn btn-success"
									style="margin-top: 20px; margin-right: 20px; margin-bottom: 20px;">Cetak</a>
							</form>


							<hr />
							<center><b><?php echo $ket; ?></b></center>
							<br>
							<br>

							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Kode Buku</th>
											<th>Judul</th>
											<th>Pengarang</th>
											<th>Penerbit</th>
											<th>Tempat Terbit</th>
											<th>Klasifikasi</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Kode Buku</th>
											<th>Judul</th>
											<th>Pengarang</th>
											<th>Penerbit</th>
											<th>Tempat Terbit</th>
											<th>Klasifikasi</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
                    $no = 1; 
                    foreach($buku as $hasil){ 
                    ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $hasil->tanggal ?></td>
											<td><?php echo $hasil->kode_buku ?></td>
											<td><?php echo $hasil->judul ?></td>
											<td><?php echo $hasil->pengarang?></td>
											<td><?php echo $hasil->penerbit?></td>
											<td><?php echo $hasil->tempat_terbit?></td>
											<td><?php echo $hasil->klasifikasi?></td>
										</tr>
										<?php } ?>
								</table>
							</div>
						</div>
					</div>


				</div>
				<!-- /.container-fluid -->

			</div>
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
	<script src="<?php echo base_url('assets/jquery-ui/jquery-ui.min.js'); ?>"></script>
	<!-- Load file plugin js jquery-ui -->
	<script>
		$(document).ready(function () { // Ketika halaman selesai di load
			$('.input-tanggal').datepicker({
				dateFormat: 'yy-mm-dd' // Set format tanggalnya jadi yyyy-mm-dd
			});

			$('#form-tanggal, #form-bulan, #form-tahun')
				.hide(); // Sebagai default kita sembunyikan form filter tanggal, bulan & tahunnya

			$('#filter').change(function () { // Ketika user memilih filter
				if ($(this).val() == '1') { // Jika filter nya 1 (per tanggal)
					$('#form-bulan, #form-tahun').hide(); // Sembunyikan form bulan dan tahun
					$('#form-tanggal').show(); // Tampilkan form tanggal
				} else if ($(this).val() == '2') { // Jika filter nya 2 (per bulan)
					$('#form-tanggal').hide(); // Sembunyikan form tanggal
					$('#form-bulan, #form-tahun').show(); // Tampilkan form bulan dan tahun
				} else { // Jika filternya 3 (per tahun)
					$('#form-tanggal, #form-bulan').hide(); // Sembunyikan form tanggal dan bulan
					$('#form-tahun').show(); // Tampilkan form tahun
				}

				$('#form-tanggal input, #form-bulan select, #form-tahun select').val(
					''); // Clear data pada textbox tanggal, combobox bulan & tahun
			})
		})

	</script>


</body>

</html>

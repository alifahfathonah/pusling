<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("pustakawan/_partials/head.php") ?>
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
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Laporan Baca Buku</h1>
						<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
								class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
					</div>
					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Tabel Laporan Baca Buku</h6>
						</div>

						<div class="card-body">
							<?php if($this->session->flashdata('sukses') == TRUE): ?>
							<div class="alert alert-success alert-dismissible fade show" role="alert">
								<?php echo $this->session->flashdata('sukses')?>
								<button type="button" class="close" data-dismiss="alert" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<?php endif; ?>

							<div class="table-responsive">
								<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
									<thead>
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Kode Buku</th>
											<th>Nama Pembaca</th>
											<th>Kategori</th>
											<th>Judul</th>
											<th>Pengarang</th>
											<th>Penerbit</th>
											<th>Tempat Terbit</th>
											<th>Klasifikasi</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>No</th>
											<th>Tanggal</th>
											<th>Kode Buku</th>
											<th>Nama Pembaca</th>
											<th>Kategori</th>
											<th>Judul</th>
											<th>Pengarang</th>
											<th>Penerbit</th>
											<th>Tempat Terbit</th>
											<th>Klasifikasi</th>
											<th>Status</th>
											<th>Aksi</th>
										</tr>
									</tfoot>
									<tbody>
										<?php
                    $no = 1; 
                    foreach($laporan_baca as $hasil){ 
                    ?>
										<tr>
											<td><?php echo $no++ ?></td>
											<td><?php echo $hasil->tanggal ?></td>
											<td><?php echo $hasil->kode_buku ?></td>
											<td><?php echo $hasil->nama_pembaca ?></td>
											<td><?php echo $hasil->kategori ?></td>
											<td><?php echo $hasil->judul ?></td>
											<td><?php echo $hasil->pengarang?></td>
											<td><?php echo $hasil->penerbit?></td>
											<td><?php echo $hasil->tempat_terbit?></td>
											<td><?php echo $hasil->klasifikasi?></td>
											<td><span class="badge badge-danger"><?php echo $hasil->status?></span></td>
											<td style="text-align: center;">
												<a href="<?php echo base_url() ?>pustakawan/laporan_buku/edit/<?php echo $hasil->id_laporan_buku ?>"
													class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
											</td>
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


</body>

</html>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("kasi/_partials/head.php") ?>
</head>

<body id="page-top">

	<!-- Page Wrapper -->
	<div id="wrapper">

		<!-- Sidebar -->
		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<!-- Sidebar - Brand -->
			<a class="sidebar-brand d-flex align-items-center justify-content-center"
				href="<?php echo site_url('kasi/overview')?>">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-laugh-wink"></i>
				</div>
				<?php
          $this->load->model('admin');
        ?>
				<div class="sidebar-brand-text mx-2">
					<?= $this->admin->is_role() == 'kasi' ? 'Kepala Seksi Pusling' : 'Kepala Bidang Pusling' ?>
				</div>
			</a>

			<!-- Divider -->
			<hr class="sidebar-divider my-0">

			<!-- Nav Item - Dashboard -->
			<li class="nav-item active">
				<a class="nav-link" href="<?php echo site_url('kasi/overview')?>">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<!-- Divider -->
			<hr class="sidebar-divider">

			<!-- Heading -->
			<div class="sidebar-heading">
				Menu
			</div>


			<!-- Nav Item - Laporan Collapse Menu -->
			<li class="nav-item">
				<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true"
					aria-controls="collapsePages">
					<i class="fas fa-fw fa-book"></i>
					<span>Laporan</span>
				</a>
				<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
					<div class="bg-white py-2 collapse-inner rounded">
						<a class="collapse-item" href="<?php echo site_url('kasi/laporan/pusling')?>">Laporan Pusling</a>
						<a class="collapse-item" href="<?php echo site_url('kasi/laporan/buku')?>">Laporan Buku</a>
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
				<?php $this->load->view("kasi/_partials/navbar.php") ?>

				<!-- End of Topbar -->

				<!-- Begin Page Content -->
				<div class="container-fluid">

					<!-- Page Heading -->
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
						<br>
						<a href="<?php echo $url_cetak; ?>" class=" d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
								class="fas fa-download fa-sm text-white-50"></i> Cetak Laporan Statistik</a>
					</div>


					<?php if($this->session->flashdata('login_success') == TRUE): ?>
					<div class="alert alert-success alert-dismissible fade show" role="alert">
						<?php echo $this->session->flashdata('login_success')?>
						<button type="button" class="close" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<?php endif; ?>

					<!-- Content Row -->
					<div class="row">

						<!-- Earnings (Monthly) Card Example -->
						<div class="col-xl-3 col-md-6 mb-4">
							<div class="card border-left-primary shadow h-100 py-2">
								<div class="card-body">
									<div class="row no-gutters align-items-center">
										<div class="col mr-2">
											<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Pengunjung Pria</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php
                      $this->db->select('COUNT(jenis_kelamin) as pria');
                      $this->db->where('jenis_kelamin', 'Pria');
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->pria;
                      ?>
											</div>
										</div>
										<div class="col-auto">
											<i class="fas fa-male fa-2x text-gray-300"></i>
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
											<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Pengunjung Wanita
											</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php
                      $this->db->select("COUNT(jenis_kelamin) as wanita");
                      $this->db->where('jenis_kelamin', 'Wanita');
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->wanita;
                      ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-female fa-2x text-gray-300"></i>
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
											<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Total Pengunjung</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php
                      $this->db->select('COUNT(jenis_kelamin) as total');
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->total;
                      ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-users fa-2x text-gray-300"></i>
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
											<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Jumlah Laporan Pusling
											</div>
											<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php echo $this->db->count_all_results('laporan'); ?></div>
										</div>
										<div class="col-auto">
											<i class="fas fa-book fa-2x text-gray-300"></i>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="row">


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
											<div class="h5 mb-0 font-weight-bold text-gray-800">
												<?php echo $this->db->count_all_results('buku'); ?></div>
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

					<!-- Content Row -->

					<div class="row">

						<!-- Area Chart -->
						<div class="col-xl-8 col-lg-7">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Buku Terlaris</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
											aria-labelledby="dropdownMenuLink">
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

						<!-- Pie Chart -->
						<div class="col-xl-4 col-lg-5">
							<div class="card shadow mb-4">
								<!-- Card Header - Dropdown -->
								<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
									<h6 class="m-0 font-weight-bold text-primary">Statistik Pengunjung</h6>
									<div class="dropdown no-arrow">
										<a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
											aria-haspopup="true" aria-expanded="false">
											<i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
										</a>
										<div class="dropdown-menu dropdown-menu-right shadow animated--fade-in"
											aria-labelledby="dropdownMenuLink">
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
											<i class="fas fa-circle text-primary"></i> Pria
										</span>
										<span class="mr-2">
											<i class="fas fa-circle text-success"></i> Wanita
										</span>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Content Row -->

				</div>
				<!-- /.container-fluid -->

			</div>
			<!-- End of Main Content -->

			<!-- Footer -->
			<?php $this->load->view("kasi/_partials/footer.php") ?>

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
	<?php $this->load->view("kasi/_partials/modal.php") ?>

	<!-- Bootstrap core JavaScript-->
	<?php $this->load->view("kasi/_partials/js.php") ?>


</body>

</html>

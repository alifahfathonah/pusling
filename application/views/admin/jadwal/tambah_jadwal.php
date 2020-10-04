<?php
/**
 * @programmer           : Faris
 * @programmer           : Sugeng
 * @contributor          : Fathul Ilmi N
 *
 * Copyright (C) 2020  By Itgenic (itgenic@gmail.com)
 */
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view("admin/_partials/head.php") ?>
	<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
		integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
		crossorigin="" />
	<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
		integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
		crossorigin=""></script>
	<style>
		.wrapper {
			align-items: center;
			justify-content: center;
		}

		.wrapper #render-map {
			width: 100%;
			height: 350px;
			background: #f4f4f4;
		}

		.map {
			position: relative;
		}

		.search-location {
			width: calc(100% - 20px);
			padding: 10px;
			margin-bottom: 20px;
		}

		ul#search-result {
			position: absolute;
			top: 35px;
			z-index: 1001;
			width: 100%;
			background: #ffffff;
			list-style: none;
			padding: 0;
		}

		ul#search-result li {
			padding: 5px 0;
		}

	</style>>
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


			<li class="nav-item active">
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
				<div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
					data-parent="#accordionSidebar">
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
			<li class="nav-item ">
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
							<form method="POST" action="<?php echo site_url('admin/jadwal/simpan')?>"
								enctype="multipart/form-data">
								<input type="hidden" name="status" value="1">
								<div class="form-group">
									<label for="date">Waktu</label>
									<input type="datetime-local" name="waktu" class="form-control"
										value="<?=set_value('waktu')?>" placeholder="Masukkan Waktu" autofocus>
									<span style="color: red;"><?=form_error('waktu')?></span>
								</div>

								<div class="wrapper">
									<div class="map">
										<input type="search" class="search-location"
											placeholder="Search Location Here..." name="lokasi"
											oninput="onTyping(this)">
										<ul id="search-result">

										</ul>
										<div id="render-map">

										</div>
									</div>

								</div>
								<label for="latitude">Latitude:</label>
								<input id="latitude" name="latitude" type="text" />
								<label for="longitude">Longitude:</label>
								<input id="longitude" name="longitude" type="text" />
								<br>
								<button type="submit" class="btn btn-md btn-success" name="submit">Simpan</button>
								<a href="<?php echo site_url()?>admin/jadwal" class="btn btn-md btn-primary">Back</a>
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

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
	<script>
		const DEFAULT_COORD = [-6.325620925429543, 108.32304954528809];
		const resultsWrapperHTML = document.getElementById("search-result");
		// initial map
		const Map = L.map("render-map");

		// initial asm tile
		const asmTileUrl = "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png";

		const attrib = "Leaflet with <a href='https://itgenic.co.id/'>Itgenic</a>";

		const asmTile = new L.TileLayer(asmTileUrl, {
			minZoom: 2,
			maxZoom: 20,
			attribution: attrib,
		});

		Map.on('dragend', function (e) {
			console.log(e);
			document.getElementById('latitude').value = marker.getLatLng().lat;
			document.getElementById('longitude').value = marker.getLatLng().lng;
		});

		// Add Layer
		Map.setView(new L.LatLng(DEFAULT_COORD[0], DEFAULT_COORD[1]), 13);
		Map.addLayer(asmTile);

		// Add Marker
		const Marker = L.marker(DEFAULT_COORD).addTo(Map);

		// click listener
		Map.on("click", function (e) {
			const {
				lat,
				lng
			} = e.latlng;
			//   regenereated marker position
			Marker.setLatLng([lat, lng]);
			document.getElementById('latitude').value = lat;
			document.getElementById('longitude').value = lng;
		});

		// Search Location Handler
		let typingInterval;

		// Typing handler
		function onTyping(e) {
			clearInterval(typingInterval);
			const {
				value
			} = e;

			typingInterval = setInterval(function () {
				clearInterval(typingInterval);
				searchLocation(value);
			}, 500);
		}

		// Search Handler
		function searchLocation(keyword) {
			//   console.log("Search Location ", keyword);
			if (keyword) {
				//   request to animation api
				fetch(`https://nominatim.openstreetmap.org/search?q=${keyword}&format=json`)
					.then((response) => {
						return response.json();
					})
					.then((json) => {
						//   get response data from nomination
						console.log("json", json);
						if (json.length > 0) return renderResults(json);
						else alert("Lokasi Tidak Ditemukan");
					});
			}
		}

		// Render Result
		function renderResults(result) {
			let resultHTML = "";
			result.map((n) => {
				resultHTML += `<li><a href="#" onClick="setLocation(${n.lat}, ${n.lon})" >${n.display_name}</a></li>`;
			});

			resultsWrapperHTML.innerHTML = resultHTML;
		}

		// Clear Result
		function clearResults() {
			resultsWrapperHTML.innerHTML = "";
		}

		// set location from search result
		function setLocation(lat, lng) {
			document.getElementById('latitude').value = lat;
			document.getElementById('longitude').value = lng;
			// Set map Focus
			Map.setView(new L.LatLng(lat, lng), 15);
			//   regenereated marker position
			Marker.setLatLng([lat, lng]);
			clearResults();
		}

	</script>





</body>

</html>

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
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mb-0 text-gray-800">Buat Buku Yang Dibaca</h1>
					</div>

					<!-- DataTales Example -->
					<div class="card shadow mb-4">
						<div class="card-body">
							<div>
								<a title="Aktifkan Kamera" data-placement="right" class="btn btn-sm btn-success" data-toggle="modal"
									href="#qrscan"><i class="fa fa-qrcode"></i> Aktifkan QR Scan</a>
								<br>
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
								<form method="POST" action="<?php echo site_url('pustakawan/buat_laporan_buku/simpan')?>"
									enctype="multipart/form-data">
									<input type="hidden" name="id_users" value="<?= $this->session->userdata("user_id")?>">
									<input type="hidden" name="status" value="baca">
									<div class="form-row">
										<div class="form-group col-md-11">
											<textarea class="form-control" name="kode_buku"
												id="kode_buku"><?=set_value('kode_buku')?></textarea>
											<span style="color: red;"><?=form_error('kode_buku')?></span>
											<!-- <input type="text" class="form-control" id="kode_buku" name="kode_buku"> -->
										</div>
										<div class="form-group col-md">
											<button type="button" id="btn-search" class="btn btn-primary">Cari</button>
											<!-- <span id="loading">LOADING...</span> -->
											<div class="spinner-border text-primary" id="loading" role="status">
												<span class="sr-only">Loading...</span>
											</div>
										</div>
									</div>
									<div class="form-group">
										<label for="judul">Judul :</label>
										<input type="text" class="form-control" id="judul" value="<?=set_value('judul')?>" name="judul"
											readonly>
										<span style="color: red;"><?=form_error('judul')?></span>
									</div>
									<div class="form-group">
										<label for="pengarang">Pengarang :</label>
										<input type="text" class="form-control" id="pengarang" value="<?=set_value('pengarang')?>"
											name="pengarang" readonly>
										<span style="color: red;"><?=form_error('pengarang')?></span>
									</div>
									<div class="form-group">
										<label for="penerbit">Penerbit :</label>
										<input type="text" class="form-control" id="penerbit" value="<?=set_value('penerbit')?>"
											name="penerbit" readonly>
										<span style="color: red;"><?=form_error('penerbit')?></span>
									</div>
									<div class="form-group">
										<label for="tempat_terbit">Tempat Terbit :</label>
										<input type="text" class="form-control" id="tempat_terbit" value="<?=set_value('tempat_terbit')?>"
											name="tempat_terbit" readonly>
										<span style="color: red;"><?=form_error('tempat_terbit')?></span>
									</div>
									<div class="form-group">
										<input type="hidden" class="form-control" id="klasifikasi" value="<?=set_value('klasifikasi')?>"
											name="klasifikasi" readonly>
										<span style="color: red;"><?=form_error('klasifikasi')?></span>
									</div>
									<div class="form-group">
										<label for="nama_pembaca">Nama Pembaca :</label>
										<input type="text" class="form-control" id="nama_pembaca" value="<?=set_value('nama_pembaca')?>"
											name="nama_pembaca">
										<span style="color: red;"><?=form_error('nama_pembaca')?></span>
									</div>
									<div class="form-group">
										<label for="text"><strong>Kategori :</strong></label>
										<select class="form-control" name="kategori" id="kategori">
											<option selected disabled="disabled">--Pilih Kategori--</option>
											<option value="PAUD/TK">Pelajar - PAUD/TK</option>
											<option value="SD/MI">Pelajar - SD/MI</option>
											<option value="SMP/MTS">Pelajar - SMP/MTS</option>
											<option value="SMA/SMK/MA">Pelajar - SMA/SMK/MA</option>
											<option value="Mahasiswa">Mahasiswa</option>
											<option value="Masyarakat Umum">Masyarakat Umum</option>
											<option value="POLRI/TNI/ASN">POLRI/TNI/ASN</option>
										</select>
										<span style="color: red;"><?=form_error('kategori')?></span>
									</div>
									<div class="form-group">
										<label for="text"><strong>Jenis Kelamin :</strong></label>
										<select class="form-control" name="jenis_kelamin" id="jenis_kelamin">
											<option selected disabled="disabled">--Pilih Jenis Kelamin--</option>
											<option value="Pria">Pria</option>
											<option value="Wanita">Wanita</option>
										</select>
										<span style="color: red;"><?=form_error('jenis_kelamin')?></span>
									</div>
									<div class="form-group">
										<label for="tanggal">Tanggal</label>
										<input type="date" class="form-control" id="tanggal" value="<?=set_value('tanggal')?>"
											name="tanggal">
										<span style="color: red;"><?=form_error('tanggal')?></span>
									</div>
									<button type="submit" class="btn btn-primary">Submit</button>
								</form>
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
	<div class="modal fade shadow" id="qrscan" tabindex="-1" role="dialog" aria-labelledby="qrscan" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				</div>
				<div class="modal-body">
					<div class="card-body">
						<div id="app">

							<p class="error">
								{{ errorMessage }}
							</p>

							<qrcode-stream @decode="onDecode" @init="onInit"></qrcode-stream>
						</div>
						<br>
						<textarea class="form-control" name="kode_buku" id="deteksi"><?=set_value('kode_buku')?></textarea>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-primary" data-dismiss="modal">Konfirmasi</button>
					</div>
				</div>
			</div>
		</div>
	</div>


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

	<script>
		new Vue({
			el: '#app',

			data() {
				return {
					decodedContent: '',
					errorMessage: ''
				}
			},

			methods: {
				onDecode(content) {
					this.decodedContent = content

					document.getElementById("kode_buku").innerHTML = content;
					document.getElementById("deteksi").innerHTML = content;
				},

				onInit(promise) {
					promise.then(() => {
							console.log('Successfully initilized! Ready for scanning now!')
						})
						.catch(error => {
							if (error.name === 'NotAllowedError') {
								this.errorMessage = 'Hey! I need access to your camera'
							} else if (error.name === 'NotFoundError') {
								this.errorMessage = 'Do you even have a camera on your device?'
							} else if (error.name === 'NotSupportedError') {
								this.errorMessage =
									'Seems like this page is served in non-secure context (HTTPS, localhost or file://)'
							} else if (error.name === 'NotReadableError') {
								this.errorMessage = 'Couldn\'t access your camera. Is it already in use?'
							} else if (error.name === 'OverconstrainedError') {
								this.errorMessage =
									'Constraints don\'t match any installed camera. Did you asked for the front camera although there is none?'
							} else {
								this.errorMessage = 'UNKNOWN ERROR: ' + error.message
							}
						})
				}
			}
		})

	</script>

	<!-- Logout Modal-->
	<?php $this->load->view("pustakawan/_partials/modal.php") ?>

	<!-- Bootstrap core JavaScript-->
	<?php $this->load->view("pustakawan/_partials/js.php") ?>


</body>

</html>

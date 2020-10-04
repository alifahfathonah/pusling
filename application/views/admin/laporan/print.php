<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<style>
		.table {
			width: 100%;
			max-width: 100%;
			margin-bottom: 1rem;
			background-color: transparent;
		}

		table th,
		.table td {
			padding: 0.75rem;
			vertical-align: top;
			border-top: 1px solid #dee2e6;
		}

		.table thead th {
			vertical-align: bottom;
			border-bottom: 2px solid #dee2e6;
		}

		.table tbody+tbody {
			border-top: 2px solid #dee2e6;
		}

		.table .table {
			background-color: #fff;
		}

		.table-sm th,
		.table-sm td {
			padding: 0.3rem;
		}

		table-bordered {
			border: 1px solid #dee2e6;
		}

		.table-bordered th,
		.table-bordered td {
			border: 1px solid #dee2e6;
		}

		.table-bordered thead th,
		.table-bordered thead td {
			border-bottom-width: 2px;
		}

		.table-striped tbody tr:nth-of-type(odd) {
			background-color: rgba(0, 0, 0, 0.05);
		}

		.page_break {
			page-break-before: always;
		}

	</style>
</head>

<body>

	<table align="center">
		<tr>
			<td align="left">
				<img style="width: 80px;" src="<?= site_url() ?>images/Indramayu.png" alt="">
			</td>
			<td align="center">
				<span>
					<span style="font-size: 16px">PEMERINTAH KABUPATEN INDRAMAYU </span>
					<br>
					<span style="font-size: 22px; font-weight: bold;text-transform: uppercase">DINAS
						KEARSIPAN DAN
						PERPUSTAKAAN</span>
					<br>
					<span style="font-size: 12px">
						Jalan MT. Haryono No. 49 Telp/Faxmili (0234) 277139 - Indramayu Kode Pos 45222, <br>
						e-mail : <u>arpusindramayu@yahoo.co.id</u>, Website : disarpus.indramayukab.go.id
					</span>
				</span>
			</td>
		</tr>
	</table>
	<hr style="border: 2px solid black">
	<h4 style="text-align: center">LAPORAN LAYANAN PERPUSTAKAAN KELILING <br> DINAS KEARSIPAN DAN PERPUSTAKAAN KAB.
		INDRAMAYU</h4>
	<?php foreach($laporan as $data) : ?>
	<table class="table table-bordered" cellspacing="0">
		<tr>
			<td>Tanggal</td>
			<td><?= date('d F Y', strtotime($data->tgl_laporan)) ?></td>
		</tr>
		<tr>
			<td>Nama</td>
			<td><?= $data->nama ?></td>
		</tr>
		<tr>
			<td>Nama Pustakawan</td>
			<td><?= $data->nama_ast ?></td>
		</tr>
		<tr>
			<td>Nama Supir</td>
			<td><?= $data->nama_sup ?></td>
		</tr>
		<tr>
			<td>Jenis Pusling</td>
			<td><?= $data->jenis_pusling ?></td>
		</tr>
		<tr>
			<td>Kode Kendaraan</td>
			<td><?= $data->kode_kendaraan ?></td>
		</tr>
		<tr>
			<td>Alamat Lokasi</td>
			<td><?= $data->alamat_lokasi ?></td>
		</tr>
		<tr>
			<td>No. Pengelola</td>
			<td><?= $data->no_pengelola ?></td>
		</tr>
		<tr>
			<td>Total Pengunjung</td>
			<td><?= $data->tot_pengunjung ?></td>
		</tr>
		<tr>
			<td>Total Laki - Laki</td>
			<td><?= $data->tot_lk ?></td>
		</tr>
		<tr>
			<td>Total Perempuan</td>
			<td><?= $data->tot_pr ?></td>
		</tr>
	</table>

	<div class="page_break"></div>

	<h4 style="text-align: center">Lampiran Gambar</h4>
	<table class="table table-bordered" align="center" style="text-align: center">
		<tr>
			<td>
				<img width="200" src="<?= site_url("assets/images_laporan/" . $data->gambar) ?>" alt="">
				<br>
				Gambar 1
			</td>
		</tr>
		<?php if($data->gambar2 !== "") : ?>
		<tr>
			<td>

				<img width="200" src="<?= site_url("assets/images_laporan/" . $data->gambar2) ?>" alt="">
				<br>
				Gambar 2

			</td>
		</tr>
		<?php endif; ?>
		<?php if($data->gambar3 !== "") : ?>
		<tr>
			<td>
				<img width="200" src="<?= site_url("assets/images_laporan/" . $data->gambar3) ?>" alt="">
				<br>
				Gambar 3
			</td>
		</tr>
		<?php endif; ?>
	</table>
	<div class="page_break"></div>
	<?php endforeach; ?>

</body>

</html>

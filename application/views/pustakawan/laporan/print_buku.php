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
	<h4 style="text-align: center">LAPORAN BUKU PERPUSTAKAAN KELILING <br> DINAS KEARSIPAN DAN PERPUSTAKAAN KAB.
		INDRAMAYU</h4>

	<table class="table table-bordered" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Tanggal</th>
			<th>Nama Pembaca</th>
			<th>Kode Buku</th>
			<th>Judul</th>
			<th>Pengarang</th>
			<th>Penerbit</th>
			<th>Tempat Terbit</th>
			<th>Klasifikasi</th>
		</tr>
		<?php
      $no = 1; 
      foreach($buku as $hasil){ 
    ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo date('d/m/Y', strtotime($hasil->tanggal)) ?>
			</td>
			<td><?php echo $hasil->nama_pembaca ?>
			</td>
			<td><?php echo $hasil->kode_buku ?>
			</td>
			<td><?php echo $hasil->judul ?></td>
			<td><?php echo $hasil->pengarang?>
			</td>
			<td><?php echo $hasil->penerbit?>
			</td>
			<td>
				<?php echo $hasil->tempat_terbit?></td>
			<td><?php echo $hasil->klasifikasi?>
			</td>
		</tr>
		<?php } ?>
	</table>

</body>

</html>

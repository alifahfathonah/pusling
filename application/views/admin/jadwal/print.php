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
	<h4 style="text-align: center">JADWAL LAYANAN PERPUSTAKAAN KELILING <br> DINAS KEARSIPAN DAN PERPUSTAKAAN KAB.
		INDRAMAYU</h4>

	<table class="table table-bordered" style="text-align: center" cellspacing="0">
		<tr>
			<th>No</th>
			<th>Hari</th>
			<th>Tanggal</th>
			<th>Waktu</th>
			<th>Lokasi</th>
			<th>Status</th>
		</tr>
		<?php
            $hari = array ( 1 =>    'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
            'Minggu'
        );
        $no = 1; 
            foreach($jadwal as $hasil){ 
        ?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?= $hari[ date('N', strtotime($hasil->waktu)) ]  ?></td>
			<td><?php echo date('d F Y', strtotime($hasil->waktu)) ?></td>
			<td><?php echo date('H:i', strtotime($hasil->waktu)) ?></td>
			<td><?php echo $hasil->lokasi ?></td>
			<td>
				<?php if($hasil->status == '1'){
                        echo "Aktif";
                      }else{
                        echo "Tidak Aktif";
                      } ?>
			</td>
		</tr>
		<?php } ?>
	</table>



</body>

</html>

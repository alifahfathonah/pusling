<?php
    
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<style>
		.kertas {
			padding: 10mm;
		}

		.wrapper {
			display: grid;
			grid-gap: 20px;
			grid-template-columns: repeat(4, 120px);
		}

		.box {
			text-align: center;
			padding: 2mm;
			border: 1px solid black;
		}

	</style>
</head>

<body>
	<?php
		$this->load->library('ciqrcode');

		$this->load->helper('url');
		
		foreach($data as $d)
        {
            $qr['data'] = $d;
            $qr['level'] = 'M';
            $qr['size'] = 4;
            $qr['savename'] = FCPATH.'assets/kode_buku/'.$d.'.png';
            $this->ciqrcode->generate($qr);
        }
	?>
	<div class="kertas">
		<div class="wrapper">
			<?php foreach($data as $d) : ?>
			<?php
				$buku = $this->db->from('buku')->where('kode_buku', $d)->get()->row_array();
			?>
			<div class="box">
				Buku Pusling
				<br>
				<img src="<?= base_url('assets/kode_buku/' . $d . '.png') ?>" alt="">
				<b><?= $d ?></b>
				<br>
				<?= $buku['judul'] ?>
			</div>
			<?php endforeach; ?>
		</div>
	</div>

	<script>
		window.print();

	</script>
</body>

</html>

<html>
<head>
    <title>Laporan Pusling</title>
        <style>
table {
  border-collapse: collapse;
  width: 100%;
}

th.garis, td.garis {
  padding: 2px;
  text-align: center;
  border: 1px solid #ddd;
}
</style>
  
</head>
<body>

    <table style="width: 100%;">
    <tr>
    <th style="width: 50px;" align="center"><img src="images/Indramayu.png" width="100px" height="100px;" style="padding-left: 100px;"></th>
    <th style="width: 920px;" align="center"><h3 align="center">LAPORAN PERPUSTAKAAN KELILING KABUPATEN INDRAMAYU</h3>
    <h5 align="center">Jl. MT Haryono Nomor 49 Indramayu - Jawa Barat</h5></th>
    </tr>
    </table>
    <hr>
    <br>
    <br>
    Keterangan : <?php echo $ket; ?>
    <br>
    <br>
    <table align="center">
    
                    <tr>
                      <th class="garis">No</th>
                      <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Tanggal</th>
                      <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Kode Buku</th>
                      <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Judul</th>
                      <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Pengarang</th>
                      <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Penerbit</th>
                      <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Tempat Terbit</th>
                      <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Klasifikasi</th>
                    </tr>

    <?php
                    $no = 1; 
                    foreach($buku as $hasil){ 
                    ?>
                    <tr>
                    <td class="garis"><?php echo $no++ ?></td>
                    <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;"><?php echo $hasil->tanggal ?></td>
                    <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;"><?php echo $hasil->kode_buku ?></td>
                    <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;"><?php echo $hasil->judul ?></td>
                    <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;"><?php echo $hasil->pengarang?></td>
                    <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;"><?php echo $hasil->penerbit?></td>
                    <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;"><?php echo $hasil->tempat_terbit?></td>
                    <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;"><?php echo $hasil->klasifikasi?></td>
                    </tr>
                    <?php } ?>
    </table>
</body>
</html>


<!-- <html>
<head>
    <title>Cetak PDF</title>
</head>
<body>
<h1 style="text-align: center;">Data User</h1>
    <?php echo "Tanggal : ".date('d-m-Y'); ?>
<table border="1" width="100%">
<tr>
                      <th>No</th>
                      <th>Tanggal Dibuat</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Role</th>
                    </tr>
<?php
if( ! empty($users)){
    $no = 1;
    foreach($users as $data){

        echo "<tr>";
        echo "<td>".$no."</td>";
        echo "<td>".$data->tanggal_dibuat."</td>";
        echo "<td>".$data->username."</td>";
        echo "<td>".$data->nama_user."</td>";
        echo "<td>".$data->role."</td>";
        echo "</tr>";
        $no++;
    }
}
?>
</table>
</body>
</html> -->
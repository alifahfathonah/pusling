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
  border-bottom: 1px solid #ddd;
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
    <table >
    <tr>
                    <th class="garis" width="20px;" align="center">No</th>
                    <th class="garis" align="center">Tanggal</th>
                    <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Nama</th>
                    <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Nama Assisten</th>
                    <th class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">Nama Supir</th>
                    <th class="garis" style="word-wrap: break-Word; width: 50px; text-align: center;">Jenis Pusling</th>
                    <th class="garis" style="word-wrap: break-Word; width: 30px; text-align: center;">Kode Kendaraan</th>
                    <th class="garis" style="word-wrap: break-Word; width: 100px; text-align: center;">Alamat Lokasi</th>
                    <th class="garis" style="word-wrap: break-Word; width: 70px; text-align: center;">No Pengelola</th>
                    <th class="garis" style="word-wrap: break-Word; width: 80px; text-align: center;">Total Pengunjung</th>
                    <th class="garis" style="word-wrap: break-Word; width: 80px; text-align: center;">Total Laki-Laki</th>
                    <th class="garis" style="word-wrap: break-Word; width: 80px; text-align: center;">Total Perempuan</th>
                    <th class="garis" style="text-align: center;">Gambar</th>
    </tr>

    <?php
    if( ! empty($laporan)){
        $no = 1;
        foreach($laporan as $data){
            $tgl = date('d-m-Y', strtotime($data->tgl_laporan));

            echo "<tr>";
             echo "<td  class='garis' style='Word-wrap: break-Word; width: 10px; align: center;'>".$no."</td>";
            echo "<td class='garis' >".$tgl."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 90px;'>".$data->nama."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 90px;'>".$data->nama_ast."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 90px;'>".$data->nama_sup."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 50px;'>".$data->jenis_pusling."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 70px;'>".$data->kode_kendaraan."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 100px;'>".$data->alamat_lokasi."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 70px;'>".$data->no_pengelola."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 30px;'>".$data->tot_pengunjung."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 30px;'>".$data->tot_lk."</td>";
        echo "<td  class='garis' style='Word-wrap: break-Word; width: 30px;'>".$data->tot_pr."</td>";
        echo "<td class='garis' ><img src='".base_url("assets/images_laporan/".$data->gambar)."' width='90' height='100'></td>";
            echo "</tr>";
            $no++;
        }
    }
    ?>
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
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
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Pengunjung Pria</th>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Pengunjung Wanita</th>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Seluruh Pengunjung</th>
                    </tr>

                    <tr>
                      <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">
                      <?php
                      $this->db->select('COUNT(jenis_kelamin) as pria');
                      $this->db->where('jenis_kelamin', 'Pria');
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->pria;
                      ?></td>
                      <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">
                      <?php
                      $this->db->select("COUNT(jenis_kelamin) as wanita");
                      $this->db->where('jenis_kelamin', 'Wanita');
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->wanita;
                      ?>
                      </td>
                      <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">
                      <?php
                      $this->db->select('COUNT(jenis_kelamin) as total');
                      $this->db->from('laporan_buku');
                      echo $this->db->get()->row()->total;
                      ?>
                      </td>
                    </tr>

    </table>
    <br>
    <br>
    <table align="center">
    
                    <tr>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Pusling Mobil</th>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Pusling Motor</th>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Pusling Laporan Pusling</th>
                    </tr>

                    <tr>
                      <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">
                      <?= $Motor['count(*)'] ?>
                      </td>
                      <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">
                      <?= $Mobil['count(*)'] ?>
                      </td>
                      <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">
                      <?php echo $this->db->count_all_results('laporan'); ?>
                      </td>
                    </tr>

    </table>
     <br>
    <br>
    <table align="center">
    
                    <tr>
                      <th class="garis" style="word-wrap: break-Word; width: 50px; text-align: center;">No</th>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Kode Buku</th>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Dibaca</th>
                    </tr>

                    <?php $i=0; 
                    $no = 1;  foreach ($buku as $value) {
                        $judul[$i]=$value->judul;
                        $cari_banyak[$i]=$this->db->query("Select count(*) from laporan_buku where judul='$judul[$i]'")->row_array();
                        $banyak[$i]=$cari_banyak[$i]['count(*)']; ?>
                        <tr>
                          <td class="garis" style="word-wrap: break-Word; width: 50px; text-align: center;"><?= $no++ ?></td>
                          <td class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;"><?= $judul[$i] ?></td>
                          <td class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;"><?= $banyak[$i] ?></td>
                        </tr>
                      <?php $i++; }?>

    </table>
    <br>
    <br>
    <table align="center">
    
                    <tr>
                      <th class="garis" style="word-wrap: break-Word; width: 150px; text-align: center;">Total Buku</th>
                    </tr>

                    <tr>
                      <td class="garis" style="word-wrap: break-Word; width: 90px; text-align: center;">
                      <?php echo $this->db->count_all_results('buku'); ?>
                      </td>
                    </tr>

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
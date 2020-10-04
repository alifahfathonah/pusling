<html>
<head>
    <title>Cetak PDF</title>
    <style>
        table {
            border-collapse:collapse;
            table-layout:fixed;width: 630px;
        }
        table td {
            word-wrap:break-word;
            width: 20%;
        }
    </style>
</head>
<body>
    <b><?php echo $ket; ?></b><br /><br />
    
    <table border="1" cellpadding="8">
    <tr>
        <th>No</th>
                      <th>Tanggal Dibuat</th>
                      <th>Username</th>
                      <th>Nama</th>
                      <th>Role</th>
    </tr>

    <?php
    if( ! empty($user)){
        $no = 1;
        foreach($user as $data){
            $tgl = date('d-m-Y', strtotime($data->tanggal_dibuat));

            echo "<tr>";
             echo "<td>".$no."</td>";
            echo "<td>".$tgl."</td>";
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
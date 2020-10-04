<?php 

header("Content-type: application/octet-stream");

header("Content-Disposition: attachment; filename=$title.xls");

header("Pragma: no-cache");

header("Expires: 0");

?>

<table border="1">

<thead>

<tr>

 <th>No</th>

 <th>Tanggal Dibuat</th>

 <th>Nama</th>

 <th>Username</th>

 <th>Role</th>

 </tr>

</thead>

<tbody>

<?php $i=1; foreach($user as $user) { ?>

<tr>

 <td><?php echo $i ?></td>

 <td><?php echo $user->tanggal_dibuat ?></td>

 <td><?php echo $user->nama_user ?></td>

 <td><?php echo $user->username ?></td>

 <td><?php echo $user->role ?></td>

 </tr>

<?php $i++; } ?>

</tbody>

</table>
<?php
require_once('includes/init.php');

cek_login();
?>	

<html>
	<head>
		<title>Sistem Pendukung Keputusan Metode AHP SAW</title>
  		<link rel="shortcut icon" href="assets/img/favicon.ico" type="image/x-icon">
  		<link rel="icon" href="assets/img/favicon.ico" type="image/x-icon">
	</head>
<body onload="window.print();">

<div style="width:100%;margin:0 auto;text-align:center;">
	<h4>Hasil Akhir Perankingan</h4>
	<br/>
	<table width="100%" cellspacing="0" cellpadding="5" border="1">
		<thead>
			<tr align="center">
				<th>Nama Alternatif</th>
				<th>Nilai</th>
				<th width="15%">Rank</th>
				<th>Dihitung Pada</th>
			</tr>
		</thead>
		<tbody>
			<?php 
				$no=0;
				$query = mysqli_query($koneksi,"SELECT *, hasil.created_at AS dihitung_pada FROM hasil JOIN alternatif ON hasil.id_alternatif=alternatif.id_alternatif ORDER BY hasil.nilai DESC");
				while($data = mysqli_fetch_array($query)){
				$no++;
			?>
			<tr align="center">
				<td align="left"><?= $data['nama'] ?></td>
				<td><?= $data['nilai'] ?></td>
				<td><?= $no; ?></td>
				<td><?= date('d-m-Y, H:i', strtotime($data['dihitung_pada'])); ?></td>
			</tr>
			<?php
				}
			?>
		</tbody>
	</table>
</div>

</body>
</html>


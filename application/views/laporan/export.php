<?php 
    header ("Cache-Control: no-cache, must-revalidate");
    header ("Pragma: no-cache");
    header ("Content-type: application/vnd-ms-excel");
    header ("Content-Disposition: attachment; filename=".$nama_file.".xls");
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table border="1" width="100%">
	<thead>
		<tr>
			<th colspan="16" style="font-size:24px;" align="center"><?= ucwords($headline)?></th>
		</tr>
		<tr>
		 	<th>Nama</th>
		 	<th>NIM</th>
		 	<th>Jurusan/Program Studi/Fakultas</th>
		 	<th>Tempat/Tanggal Lahir</th>
			<th>Agama</th>
			<th>Tahun Masuk/Tahun lulus</th>	 
			<th>Judul Skripsi/Tugas Akhir</th>
			<th>Alamat Tinggal</th>
			<th>Dosen Pembimbing 1</th>
			<th>Dosen Pembimbing 2</th>
			<th>Nama Orang Tua/Wali</th>
			<th>Alamat Asal</th>
			<th>Alamat Email</th>
			<th>No. Telp</th>
			<th>Sudah bekerja di</th>
			<th>Alamat Kantor</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach($data AS $row){?>
			<tr>
				<td><?php echo  ucwords($row->nama)?></td>
				<td><?php echo  $row->nim?></td>
				<td><?php echo  ucwords($row->nama_jenjang).'/'.ucwords($row->nama_jurusan).'/'.ucwords($row->nama_fakultas)?></td>
				<td><?php echo  ucwords($row->tempat_lahir).'/'.date('d-m-Y',strtotime($row->tgl_lahir))?></td>
				<td><?php echo  ucwords($row->agama)?></td>
				<td><?php echo  $row->tahun_masuk.'/'.$row->tahun_lulus?></td>
				<td><?php echo  ucwords($row->judul_skripsi)?></td>
				<td><?php echo  ucwords($row->alamat_tinggal)?></td>
				<td><?php echo  ucwords($row->dosbing_1)?></td>
				<td><?php echo  ucwords($row->dosbing_2)?></td>
				<td><?php echo  ucwords($row->nama_ortu)?></td>
				<td><?php echo  ucwords($row->alamat_asal)?></td>
				<td><?php echo  $row->email?></td>
				<td><?php echo  $row->no_hp?></td>
				<td><?php echo  ucwords($row->bekerja)?></td>
				<td><?php echo  ucwords($row->alamat_bekerja)?></td>
			</tr>
		<?php };?>
	</tbody>
</table>
</body>
</html>
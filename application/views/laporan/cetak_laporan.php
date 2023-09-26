<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak Laporan</title>
</head>
<body>
    <style type="text/css">
        .tabelborder {
            border:1px solid  black;
            border-collapse: collapse;
            height:30px;
        }
    </style>

<table width="100%" style="border:2px solid  black;border-collapse: collapse;">
	<tr>
        <td colspan="2" align="center">
            <h2><u>Laporan Pendaftaran Wisudawan / Wisudawati</u></h2>
        </td>
    </tr>
    <br><br>
	<tr>
		<td style="padding:10px" width="35%">Nama</td>
        <td width="65%">: <?= $laporan->nama; ?></td>
	</tr>
    <tr>
        <td style="padding: 10px;" width="20%">Tahun Akademik</td>
		<td>: <?= $laporan->periode?></td>
    </tr>
    <tr>
        <td style="padding: 10px;" width="20%">Nomor Mahasiswa</td>
		<td>: <?= $laporan->nim?></td>
    </tr>
    <tr>
		<td style="padding: 10px;" width="20%">Jurusan/Fakultas</td>
		<td>: <?= $laporan->nama_jurusan .' / '.$laporan->nama_fakultas?></td>
	</tr>	
    <tr>
		<td style="padding: 10px;" width="20%">Tempat/Tanggal Lahir</td>
		<td>: <?= ucwords($laporan->tempat_lahir).', '.date('d-m-Y',strtotime($laporan->tgl_lahir))?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">Agama</td>
		<td>: <?= $laporan->agama?></td>
	</tr>
    <tr>
		<td style="padding: 10px;" width="20%">Tahun Masuk/Lulus</td>
		<td>: <?= $laporan->tahun_masuk.'/'.$laporan->tahun_lulus?></td>
	</tr>
    <tr>
		<td style="padding: 10px;" width="20%">IPK</td>
		<td>: <?= $laporan->ipk?></td>
	</tr>
    <tr>
        <td style="padding: 10px;" width="20%">Judul Skripsi/TA</td>
		<td>: <?= $laporan->judul_skripsi?></td>
    </tr>
    <tr>
		<td style="padding: 10px;" width="20%">Dosen Pembimbing I</td>
		<td>: <?= $laporan->dosbing_1 ?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">Dosen Pembimbing II</td>
		<td>: <?= $laporan->dosbing_2 ?></td>
	</tr>
    <tr>
		<td style="padding: 10px;" width="20%">Nama Orang Tua/Wali</td>
		<td>: <?= ucwords($laporan->nama_ortu)?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">Alamat Tinggal</td>
		<td>: <?= ucwords($laporan->alamat_tinggal)?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">Alamat Asal</td>
		<td>: <?= ucwords($laporan->alamat_asal)?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">Email</td>
		<td>: <?= ucwords($laporan->email)?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">No. Telp</td>
		<td>: <?= ucwords($laporan->no_hp)?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">Apabila Sudah Bekerja, Kerja di</td>
		<td>: <?= ucwords($laporan->bekerja)?></td>
	</tr>
	<tr>
		<td style="padding: 10px;" width="20%">Alamat Tempat Kerja</td>
		<td>: <?= ucwords($laporan->alamat_bekerja)?></td>
	</tr>		
	<tr>
		<td style="padding:10px">
			<p>Terimakasih Anda Sudah melakukan download cetak kartu
			</p>
		</td>
	</tr>
	<tr>
		
		<td align="left" style="padding:10px">
			<i style="color: red;">Dicetak pada Tanggal: <?= date('d-m-Y')?></i>
		</td>
	</tr>
</table>
<script>
    window.print();
</script>
</body>
</html>


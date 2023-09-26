<table width="100%">
	<tr>
		<td colspan="2" align="center">
			<h2><u>FORMULIR PENDAFTARAN WISUDA</u></h2><br><br>
		</td>
	</tr>
	<tr>
		<td colspan="2" align="left">
			<p >
			Kepada Yth :<br>
			Ketua Panitia Wisuda<br>
			Institut Sains & Teknologi AKPRIND Yogyakarta
			<br><br>
			Dengan hormat,<br>
			Bersama ini kami mohon didaftar sebagai peserta wisuda Institut Sains & Teknologi AKPRIND Yogyakarta
			</p>			
		</td>
	</tr>
	<tr>
		<td width="35%">Nama</td>
		<td width="65%">: <b><?= ucwords($nama)?></b></td>
	</tr>
	<tr>
		<td>Nomor Mahasiswa</td>
		<td>: <?= $nim?></td>
	</tr>
	<tr>
		<td>Jurusan/Fakultas</td>
		<td>: <?= $nama_jurusan .' / '.$nama_fakultas?></td>
	</tr>	
	<tr>
		<td>Tempat/Tanggal Lahir</td>
		<td>: <?= ucwords($tempat_lahir).', '.date('d-m-Y',strtotime($tgl_lahir))?></td>
	</tr>
	<tr>
		<td>Agama</td>
		<td>: <?= $agama?></td>
	</tr>
	<tr>
		<td>Tahun Masuk/Lulus</td>
		<td>
			<table width="100%" cellspacing="0px" cellpadding="0">
				<tr>
					<td width="20%">
					: <?= $tahun_masuk.'/'.$tahun_lulus?>
					</td>
					<td width="10%">IPK</td>
					<td width="70%">
						: <?= $ipk?>
					</td>
				</tr>
			</table>
		</td>
	</tr>
	<tr>
		<td>Judul Skripsi/TA</td>
		<td>: <?= ucwords($judul_skripsi)?></td>
	</tr>			
	<tr>
		<td>Dosen Pembimbing I</td>
		<td>: <?= $dosbing_1 ?></td>
	</tr>
	<tr>
		<td>Dosen Pembimbing II</td>
		<td>: <?= $dosbing_2 ?></td>
	</tr>		
	<tr>
		<td>Nama Orang Tua/Wali</td>
		<td>: <?= ucwords($nama_ortu)?></td>
	</tr>
	<tr>
		<td>Alamat Tinggal</td>
		<td>: <?= ucwords($alamat_tinggal)?></td>
	</tr>
	<tr>
		<td>Alamat Asal</td>
		<td>: <?= ucwords($alamat_asal)?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td>: <?= ucwords($email)?></td>
	</tr>
	<tr>
		<td>No. Telp</td>
		<td>: <?= ucwords($no_hp)?></td>
	</tr>
	<tr>
		<td>Apabila Sudah Bekerja, Kerja di</td>
		<td>: <?= ucwords($bekerja)?></td>
	</tr>
	<tr>
		<td>Alamat Tempat Kerja</td>
		<td>: <?= ucwords($alamat_bekerja)?></td>
	</tr>
	<tr>
		<td colspan="2">
			<table width="100%" ellspacing="0px" cellpadding="0">
				<tr>
					<td width="70%">
						Mengetahui :<br>
						Ketua/Sekretaris Jurusan
						<br><br><br><br><br><br>
						________________________
					</td>
					<td width="30%" >
						Tangerang, <?=date('d-m-Y')?><br>
						Pemohon,
						<br><br><br><br><br><br>
						________________________			
					</td>					
				</tr>			
			</table>			
		</td>
	</tr>
	<tr>
		<td colspan="2">
			<b>Berkas Pendukung :</b><br>
			<ul>
				<li><?= !empty($foto)? 'Foto sudah diupload':'Foto belum diupload'?></li>
				<li><?= !empty($bukti_bayar)? 'Kwitansi pembayaran sudah diupload':'Kwitansi pembayaran belum diupload'?></li>
			</ul>
		</td>
	</tr>
	<tr>
		<td colspan="2" >
			<b >Lampiran Foto :</b><br>
			<img  src="<?= base_url('upload/foto/'.$foto)?>" width="160px" height="160px">
		</td>
	</tr>												
</table>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cetak User</title>
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
		<td align="center" width="100%" style="height:50px;vertical-align: middle; padding:10px">
            <img src="<?= base_url('upload/logo/'. $user_data[0]['logo']) ?>" style="width: 100px;" alt="">
			<h2 ><?= $user_data[0]['nama_univ']; ?></h2>
            <p style="margin-top: -13px;"><?= $user_data[0]['alamat_univ']; ?></p>
			<p style="margin-top: -13px;"><i>No. Telp : <?= $user_data[0]['no_telp']; ?> </i>
			<br> Email : <?= $user_data[0]['email']; ?></p>
		</td>
	</tr>
	<tr>
		<td style="padding:10px">
			<p>Silahkan Anda Gunakan untuk melakukan login di <a href="<?= base_url() ?>">https://unipem.ac.id/</a>, 
			Informasi wisuda dapat download di menu panduan.
			</p>
		</td>
	</tr>
	<tr>
		<td style="padding:10px">
			<table  width="100%" class="tabelborder">
				<tr>
                    <th align="center" class="tabelborder">Nama</th>
					<th align="center" class="tabelborder">Username</th>
					<th align="center" class="tabelborder">Password</th>
				</tr>
				<tr>
                    <td align="center" class="tabelborder"><?= $user->nama?></td>
					<td align="center" class="tabelborder"><?= $user->username?></td>
					<td align="center" class="tabelborder"><?= $user->password?></td>
				</tr>
			</table>
		</td>
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


<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<table>
		<tr>
			<th scope="col">No</th>
			<th scope="col">Nama</th>
			<th scope="col">Simpan</th>
			<th scope="col">Pinjam</th>
			<th scope="col">Saldo</th>
			<th scope="col">Kelas</th>
			<th scope="col">Tanggal</th>

		</tr>
		<?php $no = 1; ?>
		<?php foreach ($laporan  as $lprn) :?>
			
			<tr>
				<th scope="row"><?= $no; ?></th>
				<td><?= $lprn['nama'] ?></td>
				<td><?= $lprn['simpan'] ?></td>
				<td><?= $lprn['ambil'] ?></td>
				<td><?= "Rp. ".number_format($lprn['saldo'], 0, ".", ".")?></td>
				<td><?= $lprn['kelas'] ?></td>
				<td><?= $lprn['tgl'] ?></td>
			</tr>
			<?php $no++; ?>
		<?php endforeach; ?>
	</table>

	<script type="text/javascript">
		window.print();
	</script>
</body>
</html>
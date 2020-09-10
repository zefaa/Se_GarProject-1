<!doctype html>
<html lang="en"><head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<title>Laporan Keuangan</title>
</head><body>
	
	<div style="line-height: 0.5; font-weight:bold; text-align: center; ">
		
		<h3>LAPORAN KEUANGAN SEMINARIS KELAS <?= $kelas ?></h3></br>
		<h3>PERIODE 2019-2020</h3>
	</div>

	<table class="table table-bordered">
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
				<td><?= $lprn['tanggal'] ?></td>
			</tr>
			<?php $no++; ?>
		<?php endforeach; ?>

	</table>

</body></html>
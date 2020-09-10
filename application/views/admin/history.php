	
<div style="line-height: 0.5; font-weight:bold; text-align: center; color: black;">
	<img width="95%" src="<?php echo base_url() ?>assets/images/as.png">
	<h3>LAPORAN KEUANGAN SEMINARIS KELAS <?php 
			foreach ($diri as $user) {
				echo $user['kelas'];
			}
		 ?></h3></br>
	<h3>PERIODE 2019-2020</h3>
</div>
<table style="color: solid black; padding: 5px;" cellpadding="7px;">
	<tr>
		<td> Nama </td>
		<td> : </td>
		<td><?php 
			foreach ($diri as $user) {
				echo $user['nama'];
			}
		 ?></td>
	</tr>
	<tr>
		<td> Paroki </td>
		<td> : </td>
		<td><?php 
			foreach ($diri as $user) {
				echo $user['paroki'];
			}
		 ?></td>
	</tr>
	<tr>
		<td> TTL </td>
		<td> : </td>
		<td><?php 
			foreach ($diri as $user) {
				echo $user['ttl'];
			}
		 ?></td>
	</tr>
</table>
<table class="table table-bordered">
	<tr>
		<th scope="col">No</th>
		<th scope="col">Tanggal</th>
		<th scope="col">Simpan</th>
		<th scope="col">Pinjam</th>
		<th scope="col">Saldo</th>


	</tr>
	<?php $no = 1; ?>
	<?php foreach ($histori as $lprn) :?>

		<tr>
			<th scope="row"><?= $no; ?></th>
			<td><?= $lprn['tanggal'] ?></td>
			<td><?= $lprn['simpan'] ?></td>
			<td><?= $lprn['ambil'] ?></td>
			<td><?= "Rp. ".number_format($lprn['saldo'], 0, ".", ".")?></td>
		</tr>
		<?php $no++; ?>
	<?php endforeach; ?>

</table>

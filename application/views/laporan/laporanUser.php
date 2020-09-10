<div class="container">
	<div class="Tanggal">
		<p><?php $tanggal= mktime(date("m"),date("d"),date("Y"));
		$day = date(l);
		$dayList = array(
			'Sunday' => 'Minggu',
			'Monday' => 'Senin',
			'Tuesday' => 'Selasa',
			'Wednesday' => 'Rabu',
			'Thursday' => 'Kamis',
			'Friday' => 'Jumat',
			'Saturday' => 'Sabtu',
		);
		echo $dayList[$day].",".date("d-M-Y", $tanggal);?></p>
	</div>
</div>


<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>

						<tr>
							<th scope="col">No</th>
							<th scope="col">Nama</th>
							<th scope="col">Simpan</th>
							<th scope="col">Pinjam</th>
							<th scope="col">Saldo</th>
							<th scope="col">Kelas</th>
							<th scope="col">Tanggal</th>

						</tr>
					</thead>
					<tbody>

						<?php $no = 1; ?>
						<?php foreach ($laporan  as $lprn) :?>
							<?php $tgl = $lprn['tanggal'];
							$tanggal = date("d F Y",strtotime($tgl))
							?>
							<tr  style="text-align: center;" class="<?php if($lprn['saldo']>0) {
								echo("btn-primary");
								} else { 
									echo("btn-danger");
								}?>" style="color: white" >
								<th scope="row"><?= $no; ?></th>
								<td><a style="color: white" href="<?= base_url();  ?>Laporan/rekap/<?= $lprn['nama'];  ?>"><?= $lprn['nama'] ?></a></td>
								<td><?= $lprn['simpan'] ?></td>
								<td><?= $lprn['ambil'] ?></td>
								<td><?= "Rp. ".number_format($lprn['saldo'], 0, ".", ".")?></td>
								<td><?= $lprn['kelas'] ?></td>
								<td><?= $tanggal ?></td>
							</tr>
							<?php $no++; ?>
						<?php endforeach; ?>
					</form>
				</tbody>
			</table>
		</div>
	</div>
</div>
</div>
</div>



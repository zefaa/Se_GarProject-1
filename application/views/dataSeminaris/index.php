


<div class="container">
	
 

  <table class="table">
  <thead>
  	
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Paroki</th>
      <th scope="col">Tempat,Tanggal Lahir</th>
      <th scope="col">Kelas</th>
    </tr>
  </thead>
  <?php foreach ($seminaris  as $smnris) :?>
  <tbody>
    <tr>
      <th scope="row"><?= $smnris['no'] ?></th>
      <td><?= $smnris['nama'] ?></td>
      <td><?= $smnris['paroki'] ?></td>
      <td><?= $smnris['ttl'] ?></td>
      <td><?= $smnris['kelas'] ?></td>
      <td><a href="<?= base_url() ?>DataSeminaris/hapus/<?php $smnris=['nama '] ?>" class="badge badge-danger" onclick="return confirm('yaiin?')">hapus</a>
        
    </tr>
  </tbody>
<?php endforeach; ?>
</table>

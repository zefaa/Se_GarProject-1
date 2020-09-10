
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
  <div class="container">
   <form action="<?= base_url().'admin/tambah' ?>" method="post">
    <div id="isi" class="isi">
      <div class="form-group">
        <label>Nama</label>
        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama"  required>
      </div>

      <div class="form-group">
        <label for="textf">Simpan</label>
        <input type="text" class="form-control" name="simpan" placeholder="Simpan" id="simpan" required>
      </div>

      <div class="form-group">
        <label for="text">Pinjam</label>
        <input type="text" class="form-control" name="pinjam" placeholder="pinjam" id="pinjam" required>
      </div>

      <div class="form-group">
        <label>Kelas</label>
        <input type="text" name="kelas" class="form-control" placeholder="" >
      </div>

      <button type="submit" name="tambah" class="btn btn-primary float-right">Simpan
      </button>
    </div>
  </form>
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
            <td><a style="color: white" href="<?= base_url();  ?>admin/history/<?= $lprn['nama'];  ?>"><?= $lprn['nama'] ?></a></td>
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



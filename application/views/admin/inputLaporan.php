
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
  <div class="form-inline">
    <button type="text" class="btn btn-primary" id="tombol_input">Masukan Data</button>
    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file">Export PDF</i></button>
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
            <td><i class="fa fa-history"></i></a></td>
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

<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Export PDF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p> Export Berdasarkan Kelas</p>
        <form action="<?= base_url().'admin/pdf' ?>" method="post" target="blank">
          <table>
            <tr>
              <td>Kelas</td>
              <td align="center" width="5%">:</td>
              <td>

                <select  class="form-control" style="width: 100%;" name="kelas">
                  <option value="10">10</option>
                  <option value="11">11</option>
                  <option value="12">12</option>
                </select>


              </td>
            </tr>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <input type="submit" name="Export" class="btn btn-primary">
        </div>
      </form>
    </div>
  </div>
</div>

<script src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/bootstrap.js'?>" type="text/javascript"></script>
<script src="<?php echo base_url().'assets/js/jquery-ui.js'?>" type="text/javascript"></script>

<script type="text/javascript">

  var rupiah = document.getElementById('pinjam');
  var rupiah1 = document.getElementById('simpan');

  rupiah.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
  rupiah1.addEventListener('keyup', function(e){
      // tambahkan 'Rp.' pada saat form di ketik
      // gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
      rupiah1.value = formatRupiah(this.value, 'Rp. ');
    });

  /* Fungsi formatRupiah */
  function formatRupiah(angka, prefix){
    var number_string = angka.replace(/[^,\d]/g, '').toString(),
    split       = number_string.split(','),
    sisa        = split[0].length % 3,
    rupiah        = split[0].substr(0, sisa),
    ribuan        = split[0].substr(sisa).match(/\d{3}/gi);

      // tambahkan titik jika yang di input sudah menjadi angka ribuan
      if(ribuan){
        separator = sisa ? '.' : '';
        rupiah += separator + ribuan.join('.');
      }

      rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
      return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
  </script>
  
  <script type="text/javascript">
    $(document).ready(function(){

      $('#nama').autocomplete({
        source: "<?php echo site_url('laporan/get_autocomplete');?>",

        select: function (event, ui) {
          $('[name="nama"]').val(ui.item.label); 
          $('[name="kelas"]').val(ui.item.description); 

        }
      });

    });
  </script>

  <script>
   $(document).ready(function() {

     $("#tombol_input").click(function() {
       $("#isi").show();
     })

     $("#tombol_show").click(function() {
       $("#box").show();
     })

   });
 </script>



<div style="text-align: center;">
	<h1>Rekapitulasi</h1>
	<table class="table table-striped table-bordered" style="color: black;">
  <thead>
  	
    <tr class="bg-success">
      <th scope="col">No</th>
      <th scope="col">Kelas</th>
      <th scope="col">Sub Total</th>
      <th scope="col">Keterangan</th>

    </tr>
  </thead>
  <tbody>
    <tr>
      <th ><?= 1; ?></td>
      <td><?= 10 ?></td>  
      <td><?= "Rp. ".number_format($total->saldo10, 0, ".", "."); ?></td>
      <td></td>
    </tr>
    <tr>
      <th ><?= 2; ?></td>
      <td><?= 11 ?></td>  
      <td><?= "Rp. ".number_format($total->saldo11, 0, ".", "."); ?></td>
      <td></td>
    </tr>
    <tr>
      <th ><?= 3; ?></td>
      <td><?= 12 ?></td>  
      <td><?= "Rp. ".number_format($total->saldo12, 0, ".", "."); ?></td>
      <td></td>
    </tr>
  </tbody>
</table>
</div>
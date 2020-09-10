<div class="container">
	
  <div class="row mt-3">
    <div class="col-md-6">
      <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-file">Tambah</i></button>
    </div> 
   
  </div>

  <table class="table">
    <thead>

      <tr>
        <th scope="col">No</th>
        <th scope="col">User Name</th>
        <th scope="col">Password</th>
        <th scope="col">Nama</th>

      </tr>
    </thead>
    <?php foreach ($status  as $smnris) :?>
      <tbody>
        <tr>
          <th scope="row"><?= $smnris['id'] ?></th>
          <td><?= $smnris['userNames'] ?></td>
          <td><?= $smnris['password'] ?></td>
          <td><?= $smnris['nama'] ?></td>

          <td><button class="badge badge-success" data-toggle="modal" data-target="#EditModal">Edit</button>

          </tr>
        </tbody>
      <?php endforeach; ?>
    </table>

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
            <form action="<?= base_url().'admin/pdf' ?>" method="post" >
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

    <!--Modal Edit--> 
    <?php foreach ($status  as $smnris) :?>             
    <div class="modal fade" id="EditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <form action="<?= base_url().'admin/edit_user' ?>" method="post">
             <div class="form-group">
              <label class="control-label col-xs-3" >id account</label>
              <div class="col-xs-8">
                <input name="id" value="<?= $smnris['id'];?>" class="form-control" type="text" placeholder="Kode Barang..." readonly>
              </div>
              <label class="control-label col-xs-3" >User Names</label>
              <div class="col-xs-8">
                <input name="userNames" class="form-control" type="text" placeholder="User Name baru...">
              </div>
               <label class="control-label col-xs-3" >Password</label>
              <div class="col-xs-8">
                <input name="password"  class="form-control" type="text" placeholder="Password baru...">
              </div>
               <label class="control-label col-xs-3" >Nama Pengguna</label>
              <div class="col-xs-8">
                <input name="nama"  class="form-control" type="text" placeholder="Nama Pengguna baru...">
              </div>
            </div>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <input type="submit" name="Simpan" class="btn btn-primary">
          </div>
        </form>
      </div>
    </div>
  </div>
   <?php endforeach; ?>
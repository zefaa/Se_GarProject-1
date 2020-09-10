<div class="container">
	
	<div class="row mt-3">
		<div class = "col-md-6">
		
      <div class="card">
        <div class="card-header">
        Form Tambah Data Seminaris 
        </div>
          <div class="card-body">
            <?php if(validation_errors() ): ?>
              <div class="alert alert-danger" role="alert">
                <?= validation_errors(); ?>
              </div>
            <?php endif; ?>
            <form action="<?= base_url().'DataSeminaris/tambah' ?>" method="post">
              <div class="form-group">
              <label for="texts">Nama</label>
              <input type="text" class="form-control" name="nama" placeholder="nama" >
              </div>

              <div class="form-group">
              <label for="textf">Paroki</label>
              <input type="text" class="form-control" name="paroki" placeholder="paroki">
              </div>

              <div class="form-group">
              <label for="textg">Tempat, Tanggal Lahir</label>
              <input type="textd" class="form-control" name="ttl" placeholder="Tempat Tanggal Lahir" >
              </div>

              <div class="form-group">
              <label for="textg">Kelas</label>
              <select class="form-control" id="kelas" name="kelas">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                </select>
              </div>
            <button type="submit" name="tambah" class="btn btn-primary float-right">Tambah Data
              </button>
            </form>

  		        
            </form>
          </div>
        </div >
      </div>
    </div>
</div>




	

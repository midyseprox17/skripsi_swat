<div class="col-md-12">
	<div class="tile">
		<form action="<?php echo base_url().'jenis/tambah'; ?>" method="post">
			<div class="form-group">
				<label>ID</label>
				<input class="form-control" type="text" name="id" maxlength="3">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input class="form-control" type="text" name="nama">
			</div>
			<div class="form-group">
				<label>Satuan</label>
				<input class="form-control" type="text" name="satuan">
			</div>
			<div class="form-group">
				<label>Harga</label>
				<input class="form-control" type="number" name="harga">
			</div>
			
			<div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
            </div>
		</form>
	</div>
</div>
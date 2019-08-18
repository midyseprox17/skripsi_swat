<div class="col-md-12">
	<div class="tile">
		<form action="<?php echo base_url().'pegawai/tambah'; ?>" method="post">
			<div class="form-group">
				<label>No KTP</label>
				<input class="form-control" type="text" name="noKtp" maxlength="16">
			</div>
			<div class="form-group">
				<label>Nama</label>
				<input class="form-control" type="text" name="nama">
			</div>
			<div class="form-group">
				<label>Alamat</label>
				<textarea class="form-control" name="alamat" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Telp</label>
				<input class="form-control" type="text" name="telp">
			</div>
			<div class="form-group">
				<label>Jenis Kelamin</label>
				<div class="animated-radio-button">
					<label>
	                	<input type="radio" name="jk" value="L"><span class="label-text">Laki-Laki</span>
	              	</label>
	              	<label>
	                	<input type="radio" name="jk" value="P"><span class="label-text">Perempuan</span>
	              	</label>
	            </div>
			</div>
			<div class="tile-footer">
              <button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
            </div>
		</form>
	</div>
</div>
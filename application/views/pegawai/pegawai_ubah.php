<div class="col-md-12">
	<div class="tile">
		<form action="<?php echo base_url().'pegawai/ubah'; ?>" method="post">
			<?php foreach ($pegawai->result() as $p) {
			?>
				<div class="form-group">
					<label>ID</label>
					<input class="form-control" type="text" name="id" value="<?php echo $p->id;?>" readOnly>
				</div>
				<div class="form-group">
					<label>No KTP</label>
					<input class="form-control" type="text" name="noKtp" value="<?php echo $p->noKtp;?>">
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" value="<?php echo $p->nama;?>">
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name="alamat" rows="3"><?php echo $p->alamat;?></textarea>
				</div>
				<div class="form-group">
					<label>Telp</label>
					<input class="form-control" type="text" name="telp" value="<?php echo $p->telp;?>">
				</div>
				<div class="form-group">
					<label>Jenis Kelamnin</label>
					<div class="animated-radio-button">
						<label>
		                	<input type="radio" name="jk" value="L" <?php if($p->jk == 'L') echo 'checked'; ?>><span class="label-text">Laki-laki</span>
		              	</label>
		              	<label>
		                	<input type="radio" name="jk" value="P" <?php if($p->jk == 'P') echo 'checked'; ?>><span class="label-text">Perempuan</span>
		              	</label>
		            </div>
				</div>
				<div class="tile-footer">
	              <button class="btn btn-primary" type="submit" name="submit">Simpan Data</button>
	            </div>
			<?php
			}
			?>
		</form>
	</div>
</div>
<div class="col-md-12">
	<div class="tile">
		<form method="post">
			<?php foreach ($transaksi->result() as $t) {
				if(($this->auth->is_login('pegawai') && $t->id_pegawai != $this->session->userdata('id')) || $t->dihapus == '1'){
					echo '<center><img src="'.base_url().'img/kemana.jpg"></center>';
				}else{
			?>
				<div class="form-group">
					<label>ID</label>
					<input class="form-control" type="text" name="id" value="<?php echo $t->id;?>" readOnly>
				</div>
				<div class="form-group">
					<label>Pegawai</label>
					<input class="form-control" type="text" name="pegawai" value="<?php echo $t->nama_pegawai;?>" readOnly>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input class="form-control" type="text" name="nama" value="<?php echo $t->nama;?>" readOnly>
				</div>
				<div class="form-group">
					<label>Telp</label>
					<input class="form-control" type="text" name="telp" value="<?php echo $t->telp;?>" readOnly>
				</div>
				<div class="form-group">
					<label>Tanggal Masuk</label>
					<input class="form-control" type="text" name="telp" value="<?php echo $t->tgl_masuk;?>" readOnly>
				</div>
				<div class="form-group">
					<label>Tanggal Diambil</label>
					<input class="form-control" type="text" name="telp" value="<?php echo $t->tgl_keluar;?>" readOnly>
				</div>
				<div class="form-group">
					<label>Jumlah Jenis</label>
					<input class="form-control" type="text" name="telp" value="<?php echo $t->jumlah_jenis;?>" readOnly>
				</div>
				<div class="form-group">
					<label>Total Harga</label>
					<input class="form-control" type="text" name="telp" value="<?php echo $t->total;?>" readOnly>
				</div>
				<hr>
				<h4>Detail Laundry</h4>
				<table class="table table-hover">
					<thead>
						<tr>
							<th>NO</th>
							<th>Jenis</th>
							<th>Qty</th>
							<th>Satuan</th>
							<th>Harga</th>
						</tr>
					</thead>
					<?php
					$no = 1;
					foreach ($detail_transaksi->result() as $dt){
					?>
						<tr>
							<td><?php echo $no; ?></td>
							<td><?php echo $dt->nama_jenis; ?></td>
							<td><?php echo $dt->qty; ?></td>
							<td><?php echo $dt->satuan; ?></td>
							<td><?php echo $dt->harga; ?></td>
						</tr>
					<?php
						$no++;
					}
					?>
				</table>

				<?php if($t->tgl_keluar == ''){
				?>
					<div class="tile-footer">
						<a class="btn btn-primary" href="<?php echo base_url().'transaksi/nota_transaksi/'.$t->id; ?>"><i class="fa fa-print"></i>Cetak Nota</a>
		              <a class="btn btn-primary" href="<?php echo base_url().'transaksi/terima/'.$t->id; ?>"  onclick="return confirm('Apakah laundry sudah benar diambil?');"><i class="fa fa-refresh"></i>Baju Telah Diambil</a>
		            </div>
				<?php
				}
				?>
			<?php
				}
			}
			?>
		</form>
	</div>
</div>
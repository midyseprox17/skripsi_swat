<div class="col-md-12">
  	<div class="tile">
		<h3 class="tile-title">Data Transaksi</h3>
		<a class="btn btn-primary mr-2 mb-2" href="<?php echo base_url().'transaksi/tambah'; ?>"><i class="fa fa-plus"></i>Tambah Data</a>
		<?php if($this->auth->is_login('pemilik')){ ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Pegawai</th>
						<th>Konsumen</th>
						<th>Telp</th>
						<th>Tgl Masuk</th>
						<th>Tgl Diambil</th>
						<th>Jumlah Jenis</th>
						<th>Total Harga</th>
						<th colspan="2">Tindakan</th>
					</tr>
				</thead>
				<?php
				$no = 1;
				foreach($transaksi->result() as $t)
				{
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $t->id; ?></td>
						<td><?php echo $t->nama_pegawai; ?></td>
						<td><?php echo $t->nama; ?></td>
						<td><?php echo $t->telp; ?></td>
						<td><?php echo $t->tgl_masuk; ?></td>
						<td><?php echo $t->tgl_keluar; ?></td>
						<td><?php echo $t->jumlah_jenis; ?></td>
						<td><?php echo $t->total; ?></td>
						<td><a class="btn btn-info" href="<?php echo base_url().'transaksi/detail/'.$t->id; ?>"><i class="fa fa-search-plus"></i></a> <a class="btn btn-danger" href="<?php echo base_url().'transaksi/hapus/'.$t->id; ?>"  onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?');"><i class="fa fa-eraser"></i></a></td>
					</tr>
				<?php
					$no++;
				}
				?>
			</table>
		<?php }else if($this->auth->is_login('pegawai')){ ?>
			<table class="table table-hover">
				<thead>
					<tr>
						<th>NO</th>
						<th>ID</th>
						<th>Nama</th>
						<th>Telp</th>
						<th>Tgl Masuk</th>
						<th>Tgl Diambil</th>
						<th>Jumlah Jenis</th>
						<th>Total Harga</th>
						<th colspan="2">Tindakan</th>
					</tr>
				</thead>
				<?php
				$no = 1;
				foreach($transaksi->result() as $t)
				{
				?>
					<tr>
						<td><?php echo $no; ?></td>
						<td><?php echo $t->id; ?></td>
						<td><?php echo $t->nama; ?></td>
						<td><?php echo $t->telp; ?></td>
						<td><?php echo $t->tgl_masuk; ?></td>
						<td><?php echo $t->tgl_keluar; ?></td>
						<td><?php echo $t->jumlah_jenis; ?></td>
						<td><?php echo $t->total; ?></td>
						<td><a class="btn btn-info" href="<?php echo base_url().'transaksi/detail/'.$t->id; ?>"><i class="fa fa-search-plus"></i></a></td>
					</tr>
				<?php
					$no++;
				}
				?>
			</table>
		<?php } ?>
	</div>
</div>
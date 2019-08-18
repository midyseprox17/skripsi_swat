<div class="col-md-12">
  	<div class="tile">
		<h3 class="tile-title">Data Pegawai</h3>
		<a class="btn btn-primary mr-2 mb-2" href="<?php echo base_url().'pegawai/tambah'; ?>"><i class="fa fa-plus"></i>Tambah Data</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>ID</th>
					<th>No KTP</th>
					<th>Nama</th>
					<th>Alamat</th>
					<th>Telp</th>
					<th>JK</th>
					<th>Hak Akses</th>
					<th colspan="2">Tindakan</th>
				</tr>
			</thead>
			<?php
			$no = 1;
			foreach($pegawai->result() as $p)
			{
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $p->id; ?></td>
					<td><?php echo $p->noKtp; ?></td>
					<td><?php echo $p->nama; ?></td>
					<td><?php echo $p->alamat; ?></td>
					<td><?php echo $p->telp; ?></td>
					<td><?php echo $p->jk; ?></td>
					<td><?php echo $p->hak_akses; ?></td>
					<td><a class="btn btn-info" href="<?php echo base_url().'pegawai/ubah/'.$p->id; ?>"><i class="fa fa-refresh"></i></a> <a class="btn btn-danger" href="<?php echo base_url().'pegawai/hapus/'.$p->id; ?>"  onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?');"><i class="fa fa-eraser"></i></a></td>
				</tr>
			<?php
				$no++;
			}
			?>
		</table>
	</div>
</div>
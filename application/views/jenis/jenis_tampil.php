<div class="col-md-12">
  	<div class="tile">
		<h3 class="tile-title">Data Jenis</h3>
		<a class="btn btn-primary mr-2 mb-2" href="<?php echo base_url().'jenis/tambah'; ?>"><i class="fa fa-plus"></i>Tambah Data</a>
		<table class="table table-hover">
			<thead>
				<tr>
					<th>NO</th>
					<th>ID</th>
					<th>Nama</th>
					<th>Satuan</th>
					<th>Harga</th>
					<th>Tindakan</th>
				</tr>
			</thead>
			<?php
			$no = 1;
			foreach($jenis->result() as $j)
			{
			?>
				<tr>
					<td><?php echo $no; ?></td>
					<td><?php echo $j->id; ?></td>
					<td><?php echo $j->nama; ?></td>
					<td><?php echo $j->satuan; ?></td>
					<td><?php echo $j->harga; ?></td>
					<td><a class="btn btn-danger" href="<?php echo base_url().'jenis/hapus/'.$j->id; ?>"  onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?');"><i class="fa fa-eraser"></i></a></td>
				</tr>
			<?php
				$no++;
			}
			?>
		</table>
	</div>
</div>
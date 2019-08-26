<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-2">
		</div>
		<div class="col-xl-10">
			<a href="<?=base_url().'nota/tambah'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Belum Bernomor)</a>
			<a href="<?=base_url().'nota/tambah_bernomor'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3  mr-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Sudah Bernomor)</a>		
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Tabel Data NOTA</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				      <thead>
				        <tr>
				          <th>No</th>
				          <th>Kode</th>
				          <th>Tanggal</th>
				          <th>Hal</th>
				          <th>Isi</th>
				          <th>Kepada</th>
				          <th>Pengolah</th>
				          <th>Catatan</th>
				          <th>Tindakan</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php 
				      	foreach($nota->result() as $n)
						{ 
						?>
					        <tr>
					          <td><?=$n->nomor?></td>
					          <td><?=$n->penomoran_kode?></td>
					          <td><?=$n->tanggal.'-'.$n->bulan.'-'.$n->tahun?></td>
					          <td><?=$n->hal?></td>
					          <td><?=$n->isi?></td>
					          <td><?=str_replace('; ', ' | ', $n->kepada)?></td>
					          <td><?=str_replace('; ', ' | ', $n->pegawai_nama)?></td>
					          <td><?=$n->catatan?></td>
					          <td>
					          	<a href="<?=base_url().'nota/hapus/'.$n->id?>" class="btn btn-danger btn-circle" onclick="return confirm('Apakah Anda yakin untuk menghapus data <?=$n->nomor?>?');">
					          		<i class="fas fa-trash"></i>
				                </a>
					          </td>
					        </tr>
					    <?php
					    }
					    ?>
				      </tbody>
				    </table>
				  </div>
				</div>
			</div>
		</div>		
	</div>
</div>


  <!-- Page level plugins -->
  <script src="<?=base_url().'assets/'?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url().'assets/'?>js/demo/datatables-demo.js"></script>
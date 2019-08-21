<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-10">
		</div>
		<div class="col-xl-2">
			<a href="<?=base_url().'pegawai/tambah'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>		
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pegawai</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				      <thead>
				        <tr>
				          <th>No</th>
				          <th>NIP</th>
				          <th>Nama</th>
				          <th>Pangkat</th>
				          <th>Gol</th>
				          <th>Jabatan</th>
				          <th>Tindakan</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php 
				      	$no = 1;
				      	foreach($pegawai->result() as $p)
						{ 
						?>
					        <tr>
					          <td><?=$no?></td>
					          <td><?=$p->nip?></td>
					          <td><?=$p->nama?></td>
					          <td><?=$p->pangkat?></td>
					          <td><?=$p->golongan?></td>
					          <td><?=$p->jabatan?></td>
					          <td>
					          	<a href="#" class="btn btn-primary btn-circle">
					          		<i class="fas fa-fw fa-edit"></i>
				                </a>
					          	<a href="<?=base_url().'pegawai/hapus/'.$p->id?>" class="btn btn-danger btn-circle" onclick="return confirm('Apakah Anda yakin untuk menghapus data <?=$p->nama?>?');">
					          		<i class="fas fa-trash"></i>
				                </a>
					          </td>
					        </tr>
					    <?php
					    	$no++;
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
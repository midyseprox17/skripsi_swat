<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-10">
		</div>
		<div class="col-xl-2">
			<a href="#" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>		
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
				          <th>Tanggal</th>
				          <th>Nama</th>
				          <th>Tanggal SP</th>
				          <th>Tujuan</th>
				          <th>Hal</th>
				          <th>Tindakan</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php 
				      	$no = 1;
				      	foreach($sp->result() as $s)
						{ 
						?>
					        <tr>
					          <td><?=$s->nomor?></td>
					          <td><?=$s->tanggal.'-'.$s->bulan.'-'.$s->tahun?></td>
					          <td><?=str_replace('; ', '<br>', $s->pegawai_nama)?></td>
					          <td><?=$s->tanggal_sp?></td>
					          <td><?=$s->tujuan?></td>
					          <td><?=$s->hal?></td>
					          <td>
					          	<a href="#" class="btn btn-primary btn-circle">
					          		<i class="fas fa-fw fa-edit"></i>
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

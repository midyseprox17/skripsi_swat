<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>
<a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Tambah Data</a>

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
		          	<a href="#" class="btn btn-info btn-circle">
		          		<i class="fas fa-fw fa-cog"></i>
	                </a>
		          	<a href="#" class="btn btn-danger btn-circle">
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
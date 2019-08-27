<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col">
			<a href="<?=base_url().'sm/tambah'?>" class="float-left d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-archive fa-sm text-white-50"></i> Arsipkan</a>
			<a href="<?=base_url().'sm/tambah'?>" class="float-left d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-forward fa-sm text-white-50"></i> Teruskan</a>

			<a href="<?=base_url().'sm/tambah'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Belum Bernomor)</a>
			<a href="<?=base_url().'sm/tambah_bernomor'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3  mr-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Sudah Bernomor)</a>		
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Surat Masuk</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
				    	<thead>
					      	<tr>
					      		<th><input type="checkbox"></th>
						        <th>No</th>
						        <th>Tanggal</th>
						        <th>Hal</th>
						        <th>Isi</th>
						        <th>Dari</th>
						        <th>Nomor Surat</th>
						        <th>Diarsipkan</th>
						        <th>Diteruskan</th>
						        <th>Catatan</th>
						        <th>Tindakan</th>
					        </tr>
					    </thead>
					    <tbody>
				      	<?php 
				      	foreach($sm->result() as $value)
						{ 
						?>
					        <tr>
					          <td><input type="checkbox" name="id[]" id="checksm" value="<?=$value->id?>"></td>
					          <td><?=$value->nomor?></td>
					          <td><?=$value->tanggal.'-'.$value->bulan.'-'.$value->tahun?></td>
					          <td><?=$value->hal?></td>
					          <td><?=$value->isi?></td>
					          <td><?=$value->dari?></td>
					          <td><?=$value->nomor_surat?></td>
					          <td><?=$value->tgl_diarsipkan?></td>
					          <td><?=$value->tgl_diteruskan?></td>
					          <td><?=$value->catatan?></td>
					          <td>
					          	<a href="<?=base_url().'sm/hapus/'.$value->id?>" class="btn btn-danger btn-circle" onclick="return confirm('Apakah Anda yakin untuk menghapus data <?=$value->nomor?>?');">
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
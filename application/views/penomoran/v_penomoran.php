<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=base_url().'assets/'?>vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-10">
		</div>
		<div class="col-xl-2">
			<a href="<?=base_url().'penomoran/tambah'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>		
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Penomoran</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
				      <thead>
				        <tr>
				          <th>No</th>
				          <th>Kode</th>
				          <th>Nama</th>
				          <th>Ket</th>
				          <th>Jenis</th>
				          <th>Format</th>
				          <th>Tindakan</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php 
				      	$no = 1;
				      	foreach($penomoran->result() as $p)
						{ 
						?>
					        <tr>
					          <td><?=$no?></td>
					          <td><?=$p->kode?></td>
					          <td><?=$p->nama?></td>
					          <td><?=$p->ket?></td>
					          <td><?=$p->jenis?></td>
					          <td><?=$p->format?></td>
					          <td>
					          	<a href="<?=base_url().'penomoran/ubah/'.$p->id?>" class="btn btn-primary btn-circle">
					          		<i class="fas fa-fw fa-edit"></i>
				                </a>
					          	<a href="<?=base_url().'penomoran/hapus/'.$p->id?>" class="btn btn-danger btn-circle" onclick="return confirm('Apakah Anda yakin untuk menghapus data <?=$p->nama?>?');">
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
<script src="<?=base_url().'assets/'?>vendor/datatables/dataTables.buttons.min.js"></script>
<script src="<?=base_url().'assets/'?>vendor/datatables/jszip.min.js"></script>
<script src="<?=base_url().'assets/'?>vendor/datatables/pdfmake.min.js"></script>
<script src="<?=base_url().'assets/'?>vendor/datatables/vfs_fonts.js"></script>
<script src="<?=base_url().'assets/'?>vendor/datatables/buttons.html5.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=base_url().'assets/'?>js/demo/datatables-demo.js"></script>

<script>
	$(document).ready(function() {
    $('#tabel').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5'
        ]
    } );
} );
</script>
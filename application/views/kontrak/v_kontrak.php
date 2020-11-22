<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=base_url().'assets/'?>vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-10">
		</div>
		<div class="col-xl-2">
			<a href="<?=base_url('kontrak/tambah')?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data</a>		
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  	<h6 class="m-0 font-weight-bold text-primary">Tabel Data Kontrak</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
				      <thead>
				        <tr>
				          <th>No</th>
				          <th>Klien</th>
				          <th>Devisi</th>
				          <th>Jumlah Pegawai</th>
				          <th>Lama Kontrak</th>
				          <th>Tanggal Mulai</th>
				          <th>Tanggal Selesai</th>
				          <th>Status</th>
				          <th>Tindakan</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php
				      	$nomor = 1;
				      	foreach($data->result() as $value)
						{ 
						?>
					        <tr>
					          <td><?=$nomor?></td>
					          <td><?=$value->klien?></td>
					          <td><?=$value->devisi?></td>
					          <td><?=$value->jumlah_pegawai?></td>
					          <td><?=$value->lama_kontrak?></td>
					          <td><?=$value->tgl_mulai?></td>
					          <td><?=$value->tgl_selesai?></td>
					          <td>
					          	<?php
					          	if($value->status == '0'){
					          		echo 'Ditolak';
					          	}else if($value->status == '1'){
					          		echo 'Diterima';
					          	}else{
					          		echo 'Belum Diprose';
					          	}
					          	?>	
					          </td>
					          <td>
					          	<a href="<?=base_url('kontrak/detail/'.$value->id)?>" class="btn btn-primary btn-circle">
					          		<i class="fas fa-eye"></i>
				                </a>
				                <a href="#" class="btn btn-danger btn-circle" onclick="confirm_dialog('<?=$value->id?>', '<?=$value->klien?>')">
					          		<i class="fas fa-trash"></i>
				                </a>
					          </td>
					        </tr>
					    <?php
					    	$nomor++;
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
<script src="<?=base_url().'assets/'?>vendor/datatables/jquery.dataTables.js"></script>
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
	 
	    var table = $('#tabel').DataTable( {
	        orderCellsTop: true,
	        fixedHeader: true,
	        dom: 'Bfrtip',
	        buttons: [
	            'copyHtml5',
	            'excelHtml5',
	            'csvHtml5',
	            'pdfHtml5'
	        ]
	    } );
	} );

	function confirm_dialog(id, teks){
		$.confirm({
		    title: 'Hapus Data',
		    content: 'Apakah anda yakin ingin menghapus data Kontrak '+ teks + ' ?',
		    buttons: {
		        konfirmasi: function () {
		            window.location.href = "<?=base_url()?>kontrak/hapus/"+id;
		        },
		         batal: function () {
		        }
		    }
		});
	}
</script>
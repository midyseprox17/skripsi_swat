<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=base_url().'assets/'?>vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-10">
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  	<h6 class="m-0 font-weight-bold text-primary">Tabel Penempatan Pegawai</h6>
				</div>
				<div class="card-header py-3">
					<div class="input-group" style="width:50%">
						Filter Tanggal Mulai &nbsp;&nbsp;&nbsp;
						<input type="text" id="min" name="min" placeholder="Tanggal Mulai Minimal" class="form-control">
						<input type="text" id="max" name="max" placeholder="Tanggal Mulai Maksimal" class="form-control">
					</div>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
				      <thead>
				        <tr>
				          <th>No</th>
				          <th>Devisi</th>
				          <th>NIK</th>
				          <th>Nama</th>
				          <th>Penempatan</th>
				          <td>Tgl Mulai</td>
					      <td>Tgl Selesai</td>
					      <td>Status Kontrak</td>
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
					          <td><?=$value->devisi?></td>
					          <td><?=$value->nik?></td>
					          <td><?=$value->nama?></td>
					          <td><?=$value->klien?></td>
					          <td><?=$value->tgl_mulai?></td>
					          <td><?=$value->tgl_selesai?></td>
					          <td>
					          	<?php
					          	if($value->status == 'ditolak'){
					          		echo 'DITOLAK';
					          	}else if($value->status == 'disetujui'){
					          		echo 'DISETUJUI';
					          	}else if($value->status == 'belum'){
					          		echo 'BELUM DIPROSES';
					          	}else if($value->status == 'berjalan'){
					          		echo 'SEDANG BERJALAN';
					          	}else if($value->status == 'selesai'){
					          		echo 'SELESAI';
					          	}
					          	?>
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
	$.fn.dataTable.ext.search.push(
	    function( settings, data, dataIndex ) {
	        var min = new Date($('#min').val());
	        var max = new Date($('#max').val());
	        var age = new Date(data[5]); // use data for the age column
	 
	        if ( ( isNaN( min ) && isNaN( max ) ) ||
	             ( isNaN( min ) && age <= max ) ||
	             ( min <= age   && isNaN( max ) ) ||
	             ( min <= age   && age <= max ) )
	        {
	            return true;
	        }
	        return false;
	    }
	);


	$(document).ready(function() {
		$('#min').datepicker({ dateFormat: 'yy-mm-dd' });
		$('#max').datepicker({ dateFormat: 'yy-mm-dd' });
	 
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

	    $('#min, #max').change( function() {
	        table.draw();
	    } );
	} );

	function confirm_dialog(id, teks){
		$.confirm({
		    title: 'Hapus Data',
		    content: 'Apakah anda yakin ingin menghapus data Pegawai '+ teks + ' ?',
		    buttons: {
		        konfirmasi: function () {
		            window.location.href = "<?=base_url()?>pegawai/hapus/"+id;
		        },
		         batal: function () {
		        }
		    }
		});
	}
</script>
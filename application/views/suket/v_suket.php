<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=base_url().'assets/'?>vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">
	<link href="<?=base_url().'assets/'?>vendor/jquery/jquery-confirm.min.css" rel="stylesheet">
	<script src="<?=base_url().'assets/'?>vendor/jquery/jquery-confirm.min.js"></script>
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-2">
		</div>
		<div class="col-xl-10">
			<a href="<?=base_url().'suket/tambah'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Belum Bernomor)</a>
			<a href="<?=base_url().'suket/tambah_bernomor'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3  mr-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Sudah Bernomor)</a>		
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header">
					<div class="col-xl-12 form-inline">
						<h6 class="mt-3 font-weight-bold text-primary">Tabel Data Surat Keterangan</h6>
						<div class="col-xl-8 ml-4">
					  		<select name="penomoran_id" id="penomoran_id" class="custom-select form-control" style="width: 50%" onchange="ganti_jenis()">
							  	<option value="all">Semua</option>
							  	<?php
							  	foreach ($penomoran->result() as $p) {
							  	?>
							  		<option value="<?=$p->id?>" <?=($p->id == $this->uri->segment(2) ? "selected" : "")?>><?=$p->nama?> | <?=$p->kode?></option>
							  	<?php
							  	}
							  	?>
						  	</select>
						</div>
					</div>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
				      <thead>
				        <tr>
				          <th>No</th>
				          <th>Jenis</th>
				          <th>Tanggal</th>
				          <th>Kepada</th>
				          <th>Hal</th>
				          <th>Data B</th>
				          <th>Alamat</th>
				          <th>Kota</th>
				          <th>Pengawas</th>
				          <th>Tindakan</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php 
				      	foreach($suket->result() as $value)
						{ 
						?>
					        <tr>
					          <td><?=$value->nomor?></td>
					          <td><?=$value->penomoran_ket?></td>
					          <td><?=$value->tahun.'-'.$value->bulan.'-'.$value->tanggal?></td>
					          <td><?=$value->kepada?></td>
					          <td><?=$value->hal?></td>
					          <td><?=$value->datab?></td>
					          <td><?=$value->alamat?></td>
					          <td><?=$value->kota_nama?></td>
					          <td><?=$value->pegawai_nama?></td>
					          <td>
					          	<a href="#" class="btn btn-danger btn-circle" onclick="confirm_dialog('<?=$value->penomoran_id?>','<?=$value->id?>','<?=$value->kepada?>(<?=$value->hal?>,<?=$value->datab?>)')">
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
	    // Setup - add a text input to each footer cell
	    $('#tabel thead tr').clone(true).appendTo( '#tabel thead' );
	    $('#tabel thead tr:eq(1) th').each( function (i) {
	        var title = $(this).text();
	        $(this).html( '<input type="text" placeholder="Cari '+title+'" />' );
	 
	        $( 'input', this ).on( 'keyup change', function () {
	            if ( table.column(i).search() !== this.value ) {
	                table
	                    .column(i)
	                    .search( this.value )
	                    .draw();
	            }
	        } );
	    } );
	 
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
</script>

<script>
	function ganti_jenis(){
		window.location.href = "<?=base_url().'suket/'?>"+$('#penomoran_id').val();
	}

	function confirm_dialog(penomoran_id, id, teks){
		$.confirm({
		    title: 'Hapus Data',
		    content: 'Apakah anda yakin ingin menghapus data Surat Keterangan '+ teks + ' ?',
		    buttons: {
		        konfirmasi: function () {
		            window.location.href = "<?=base_url()?>suket/hapus/"+penomoran_id+"/"+id;
		        },
		         batal: function () {
		        }
		    }
		});
	}
	
</script>
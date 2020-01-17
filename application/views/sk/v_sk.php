<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
	<link href="<?=base_url().'assets/'?>vendor/datatables/buttons.dataTables.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-2">
		</div>
		<div class="col-xl-10">
			<a href="<?=base_url().'sk/tambah'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Belum Bernomor)</a>
			<a href="<?=base_url().'sk/tambah_bernomor'?>" class="float-right d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm mb-3  mr-2"><i class="fas fa-plus fa-sm text-white-50"></i> Tambah Data(Sudah Bernomor)</a>		
		</div>
	</div>
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Tabel Data Surat Keluar</h6>
				</div>
				<div class="card-body">
				  <div class="table-responsive">
				    <table class="table table-bordered" id="tabel" width="100%" cellspacing="0">
				      <thead>
				        <tr>
				          <th>No</th>
				          <th>Kode</th>
				          <th>Tanggal</th>
				          <th>Hal</th>
				          <th>Isi</th>
				          <th>Kepada</th>
				          <th>Pelanggaran</th>
				          <th>Pengolah</th>
				          <th>Catatan</th>
				          <th>Tindakan</th>
				        </tr>
				      </thead>
				      <tbody>
				      	<?php 
				      	foreach($sk->result() as $n)
						{ 
						?>
					        <tr>
					          <td><?=$n->nomor?></td>
					          <td><?=$n->penomoran_kode?></td>
					          <td><?=$n->tanggal.'-'.$n->bulan.'-'.$n->tahun?></td>
					          <td><?=$n->hal?></td>
					          <td><?=$n->isi?></td>
					          <td><li><?=str_replace('; ', '<br><li>', $n->kepada)?></td>
					          <td><li><?=str_replace('; ', '<br><li>', $n->pelanggaran)?></td>
					          <td><li><?=str_replace('; ', '<br><li>', $n->pegawai_nama)?></td>
					          <td><?=$n->catatan?></td>
					          <td>
				                <a href="#" class="btn btn-danger btn-circle" onclick="confirm_dialog('<?=$n->id?>','<?=$n->nomor?>')">
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

	function confirm_dialog(id, teks){
		$.confirm({
		    title: 'Hapus Data',
		    content: 'Apakah anda yakin ingin menghapus Surat Keluar '+ teks + ' ?',
		    buttons: {
		        konfirmasi: function () {
		            window.location.href = "<?=base_url()?>sk/hapus/"+id;
		        },
		         batal: function () {
		        }
		    }
		});
	}
</script>
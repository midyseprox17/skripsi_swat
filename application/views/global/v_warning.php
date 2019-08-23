<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<div class="card-body">
	<div class="table-responsive">
    	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      	<thead>
				<tr>
					<th>Tanggal</th>
					<th>Nomor</th>
				</tr>
			</thead>
			<tbody>
				<?php
				if(isset($hasil)){
					for($i = 0; $i < count($hasil); $i++) {
					?>
						<tr>
							<td><?=$hasil[$i]['tanggal']?></td>
							<td><?=$hasil[$i]['nomor']?></td>
						</tr>
					<?php
					}
				}
				?>

			</tbody>
		</table>
	</div>
</div>


<div class="container">
	<p class="lead text-gray-800">PERHATIKAN:</p>
	<font color="red">
		<p>
			<ol>
				<li>Dilarang mentipe-x surat</li>
				<li>Dilarang memberi nomor surat yang belum di TTD. Berikan note jika belum di TTD</li>
				<li>Berikan angka yang kecil pada tanggal yang kecil</li>
				<li>Pastikan cap jelas</li>
			</ol>
		</p>
	</font>
</div>

  <!-- Page level plugins -->
  <script src="<?=base_url().'assets/'?>vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?=base_url().'assets/'?>js/demo/datatables-demo.js"></script>
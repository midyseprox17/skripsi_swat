<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<div class="card-body">
	<div class="table-responsive">
    	<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
	      	<thead>
				<tr>
					<?php
					foreach ($header as $value) {
					?>
						<th><?=$value?></th>
					<?php
					}
					?>
				</tr>
			</thead>
			<tbody>
				<?php
				if(isset($hasil)){
					for($i = 0; $i < count($hasil); $i++) {
					?>
						<tr>
							<td><?=$hasil[$i]['ket1']?></td>
							<td><?=$hasil[$i]['ket2']?></td>
							<td><?=$hasil[$i]['ket3']?></td>
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
	<font color="black">
		<p>
			<ol>
				<li>Dilarang mentipe-x surat</li>
				<li>Dilarang memberi nomor surat yang belum di TTD. Berikan note jika belum di TTD</li>
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
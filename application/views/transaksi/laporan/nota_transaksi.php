<!DOCTYPE html>
<html>
<head>
	<style> 
		table.gambar{ 
			background: url("<?php echo base_url().'img/bg.jpg';?>");
			opacity: 0.3;
		} 
	</style>
</head>
<body>
		<table width="50%" class="gambar">
			<tr>
				<td align="center">
					<h1>"Mama Laundry"</h1>
					<h3>Jl. Regol RT. 04 RW. 08
					<br>
						Telp. 085759898063
					</h3><hr>			
				</td>
			</tr>
			<tr>
				<td>
					<table align="center" width="90%">
						<?php foreach ($transaksi->result() as $t) {
						?>
							<tr>
								<td>No. ID</td>
								<td>: <?php echo $t->id; ?></td>
							</tr>
							<tr>
								<td>Nama</td>
								<td>: <?php echo $t->nama; ?></td>
							</tr>
							<tr>
								<td>Telp.</td>
								<td>: <?php echo $t->telp; ?></td>
							</tr>
							<tr>
								<td>Tgl. Masuk</td>
								<td>: <?php echo $t->tgl_masuk; ?></td>
							</tr>
							<tr>
								<td>Tgl. Selesai</td>
								<td>: <?php echo $t->tgl_selesai; ?></td>
							</tr>
							<tr>
								<td>Total Harga</td>
								<td>: <?php echo $t->total; ?></td>
							</tr>
						<?php
						}
						?>
						
					</table><hr>			
				</td>
			</tr>
			<tr>
				<td>
					<table width="90%">
						<tr>
							<th width="30%">Jenis</th>
							<th width="20%" align="center">Qty</th>
							<th width="50%" align="center">Hrga</th>
						</tr>
						<?php foreach ($detail_transaksi->result() as $dt) {
						?>
							<tr>
								<td><?php echo $dt->nama_jenis; ?></td>
								<td align="center"><?php echo $dt->qty.$dt->satuan; ?></td>
								<td align="center">Rp. <?php echo $dt->harga; ?></td>
							</tr>
						<?php
						}
						?>
					</table>
				</td>
			</tr>
			<tr>
				<td><hr>
					<font size="2">
					<b>PERHATIAN:</b><br>
					<ol>
						<li>Pengambilan barang harus dengan nota</li>
						<li>Kain luntur/mengkerut sendiri diluar tanggungan</li>
						<li>Hak klaim berlaku 24jam dari waktu pengambilan</li>
						<li>Bon hanya berlaku 40 hari dari tanggal selesai</li>
						<li>Kami tidak bertanggung jawab atas hilangnya kancing/barang yang tertinggal didalamnya</li>
						<li>Segala kerusakan yang disebabkan karena rapuh, diluar tanggung jawab kami</li>
						<li>Jika memberikan uang lebih dari total, maka tidak ada kembalian</li>
						<li>Setiap konsumen dianggap setuju dengan isi perjanjian diatas</li>
					</ol>
					</font>
				</td>
			</tr>
		</table>
</body>
</html>
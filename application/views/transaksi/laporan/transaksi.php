<!DOCTYPE html>
<html>
<body>
		<center><h2>Laporan Laundry <?=$dari_tanggal." Sampai ".$sampai_tanggal?></h2></center>
		<table border="1">
			<tr>
				<th>No</th>
				<th>Nama Pegawai</th>
				<th>Nama Konsumen</th>
				<th>Telp</th>
				<th>Tgl Masuk</th>
				<th>Tgl Keluar</th>
				<th>Jumlah Jenis</th>
				<th>Total</th>
			</tr>
			<?php 
			$no = 1;
			foreach ($transaksi->result() as $t) {
			?>
				<tr>
					<td><?=$no?></td>
					<td><?=$t->nama_pegawai?></td>
					<td><?=$t->nama?></td>
					<td><?=$t->telp?></td>
					<td><?=$t->tgl_masuk?></td>
					<td><?=$t->tgl_keluar?></td>
					<td><?=$t->jumlah_jenis?></td>
					<td><?=$t->total?></td>
				</tr>
			<?php
				$no++;
			}
			$tp = $total_pendapatan->row();
			if(isset($tp)){
				echo "<tr align=right><td colspan=7>Total Pendapatan</td><td>".$tp->total_pendapatan."</td><tr>";
			}
			?>
			
		</table>

</body>
</html>
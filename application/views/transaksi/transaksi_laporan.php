<div class="col-md-12">
  	<div class="tile">
  		<form method="post" action="<?=base_url()?>transaksi/laporan">
  			<table class="table" border="0">
	  			<tr>
	  				<td>Dari Tanggal</td>
	  				<td><input class="form-control" type="date" name="dari_tanggal"></td>
	  				<td>Sampai Tanggal</td>
	  				<td><input class="form-control" type="date" name="sampai_tanggal"></td>
	  			</tr>
	  			<tr>
	  				<td colspan="4"><button class="btn btn-primary" type="submit" name="submit">Cetak Laporan</button></td>
	  			</tr>
	  		</table>
  		</form>
	</div>
</div>
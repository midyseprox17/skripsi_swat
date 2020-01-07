<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Surat Masuk</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url().'sm/tambah'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td colspan="2" align="right"><a href="<?=base_url().'sm/tambah_bernomor'?>">Sudah punya nomor? Klik Disini</a></td>
							</tr>
							
						</table>
						<table class="table">
							<tr>
								<td style="color: #000000; width: 20%">Hal</td>
								<td><input type="text" name="hal" class="form-control" required=""></td>
							</tr>
							<tr>
								<td style="color: #000000">Isi Ringkasan</td>
								<td><textarea type="textarea" name="isi" class="form-control" placeholder="Isi Ringkasan" rows="5"></textarea></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Dari</td>
								<td><input type="text" name="dari" class="form-control" onkeyup="grup_dari(this)" required=""></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Nomor Surat</td>
								<td><input type="text" name="nomor_surat" class="form-control"></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Catatan</td>
								<td><input type="text" name="catatan" class="form-control"></td>
							</tr>
						</table>
				
						<div class="tile-footer">
			            	<button class="btn btn-primary" type="submit" name="submit" value="1">Tambah Data</button>
			            </div>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>
 
<script>

function grup_dari(el){
	<?php
	$arrayphp = array();
	foreach ($grup_dari->result() as $value) {
		if($value->dari != NULL){
			array_push($arrayphp, $value->dari);
		}
	}

	$arrayjs = json_encode($arrayphp);
	echo "var grup = ". $arrayjs . ";\n";
	?>

    $(el).autocomplete({
      source: grup
    });
}
</script>


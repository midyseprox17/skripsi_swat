<link rel="stylesheet" href="<?=base_url().'assets/'?>css/bootstrap-select.min.css">
<script src="<?=base_url().'assets/'?>js/bootstrap-select.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Surat Keterangan</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url().'suket/tambah'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td colspan="2" align="right"><a href="<?=base_url().'suket/tambah_bernomor'?>">Sudah punya nomor? Klik Disini</a></td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Kode</td>
								<td>
									<div class="float-left" style="width: 40%">
										<select name="penomoran_id" class="custom-select form-control">
											<?php foreach ($penomoran->result() as $p) {
											?>
												<option value="<?=$p->id?>"><?=$p->nama?> | <?=$p->kode?></option>
											<?php
											}
											?>
										</select>
									</div>
								</td>
							</tr>
						</table>
						<table class="table">
							<tr>
								<td style="color: #000000; width: 20%">Kepada</td>
								<td><input type="text" name="kepada" class="form-control" placeholder="Isi dengan nama perusahaan" required="" onkeyup="grup_kepada(this)"></td>
							</tr>
							<tr>
								<td style="color: #000000">Hal</td>
								<td><input type="text" name="hal" class="form-control" placeholder="isi dengan perihal jenis pengujian" required="" onkeyup="grup_hal(this)"></td>
							</tr>
						</table>
						<!-- Dynamic Add & Remove Field -->
						<table class="table" id="tabel_datab">
							<tr id="tabel_datab1">
								<td style="width: 20%; color: #000000">Data B</td>
								<td>
									<input type="text" name="datab[]" class="form-control" placeholder="Isi dengan data mesin yang diuji" required="">
								</td>
								<td>
									<button type="button" class="btn btn-primary mx-3" onclick="tambah_baris_datab()"><i class="fa fa-plus"></i></button>
								</td>
							</tr>
						</table>
						<table class="table">
							<tr>
								<td style="color: #000000; width: 20%">Alamat</td>
								<td><textarea type="textarea" name="alamat" class="form-control" placeholder="Isi dengan alamat lengkap perusahaan" rows="5" required=""></textarea></td>
							</tr>
							<tr>
								<td style="color: #000000">Kota</td>
								<td>
									<div class="float-left" style="width: 30%">
										<select name="kota_id" class="custom-select form-control" required="">
											<?php foreach ($kota->result() as $k) {
											?>
												<option value="<?=$k->id?>"><?=$k->nama?></option>
											<?php
											}
											?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Pengawas</td>
								<td>
									<select class="form-control selectpicker" data-live-search="true" name="pegawai_id" style="width: 40%" placeholder="Nama Pengawas" required="">
										<?php foreach ($pegawai->result() as $p) {
										?>
											<option value="<?=$p->id?>"><?=$p->nip.' | '.$p->nama?></option>
										<?php
										}
										?>
									</select>
								</td>
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

function tambah_baris_datab(){
	$rowno=$("#tabel_datab tr").length;
	$rowno = $rowno + 1;
    var html = `<tr id="tabel_datab`+$rowno+`">
					<td style="width: 20%; color: #000000"></td>
					<td>
						<input type="text" name="datab[]" class="form-control" placeholder="Isi dengan data mesin yang diuji" required="">
		    		</td>
		    		<td><button class="btn btn-danger mx-3" onclick=hapus_baris_datab(`+$rowno+`)><i class="fa fa-minus"></i></button></td>
				</tr>`;
	$("#tabel_datab tr:last").after(html); 
}

function hapus_baris_datab(rowno)
{
	$('#tabel_datab'+rowno).remove();
}

function grup_hal(el){
	<?php
	$arrayphp = array();
	foreach ($grup_hal->result() as $value) {
		if($value->hal != NULL){
			array_push($arrayphp, $value->hal);
		}
	}

	$arrayjs = json_encode($arrayphp);
	echo "var grup = ". $arrayjs . ";\n";
	?>

    $(el).autocomplete({
      source: grup
    });
}

function grup_kepada(el){
	<?php
	$arrayphp = array();
	foreach ($grup_kepada->result() as $value) {
		if($value->kepada != NULL){
			array_push($arrayphp, $value->kepada);
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


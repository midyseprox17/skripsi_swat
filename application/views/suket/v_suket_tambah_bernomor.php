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
					<form method="post" action="<?=base_url().'suket/tambah_bernomor'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td colspan="2" align="right"><a href="<?=base_url().'suket/tambah'?>">Belum punya nomor? Klik Disini</a></td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Kode</td>
								<td>
									<div class="float-left" style="width: 30%">
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
							<tr>
								<td style="width: 20%; color: #000000">Nomor Suket</td>
								<td>
									<div class="form-group row mt-1">
										<div class="col-sm-2">
							        		Dari Nomor<input type="number" class="form-control" name="nomor_awal" id="nomor_awal" min="1" required="">
							        	</div>
							        	<div class="col-sm-2">
							        		Sampai Nomor<input type="number" class="form-control" name="nomor_akhir" id="nomor_akhir" min="0" value="0" disabled="" required="">
							        	</div>
							        	<font color="red">*biarkan 0 jika hanya 1 nomor</font>
							        </div>
								</td>
							</tr>
							<tr>
								<td style="color: #000000">Tanggal Surat</td>
								<td>
									<div class="col-sm-10">
								        <div class="form-group row mt-2" id="show_status_tanggal">
								        	<div class="col-sm-2">
								        		Tanggal<input type="number" class="form-control" placeholder="Tgl" name="tgl_d" id="tgl_d" min="1" max="31">
								        	</div>
								        	<div class="col-sm-2">
								        		Bulan<select class="custom-select form-control form-control-sm" id="tgl_m" name="tgl_m">
												    <option value="1">Januari</option>
												    <option value="2">Februari</option>
												    <option value="3">Maret</option>
												    <option value="4">April</option>
												    <option value="5">Mei</option>
												    <option value="6">Juni</option>
												    <option value="7">Juli</option>
												    <option value="8">Agustus</option>
												    <option value="9">September</option>
												    <option value="10">Oktober</option>
												    <option value="11">November</option>
												    <option value="12">Desember</option>
												</select>
								        	</div>
								        	<div class="col-sm-2">
								        		Tahun<input type="number" class="form-control" placeholder="Tahun" name="tgl_y" id="tgl_y" value="<?=date('Y')?>" readonly>
								        	</div>
								        </div>
								    </div>
					    		</td>
							</tr>
						</table>
						<table class="table">
							<tr>
								<td style="color: #000000; width: 20%">Kepada</td>
								<td><input type="text" name="kepada" class="form-control" required="" onkeyup="grup_kepada(this)"></td>
							</tr>
							<tr>
								<td style="color: #000000">Hal</td>
								<td><input type="text" name="hal" class="form-control" required="" onkeyup="grup_hal(this)"></td>
							</tr>
						</table>
						<!-- Dynamic Add & Remove Field -->
						<table class="table" id="tabel_datab">
							<tr id="tabel_datab1">
								<td style="width: 20%; color: #000000">Data B</td>
								<td>
									<input type="text" name="datab[]" class="form-control" required="">
								</td>
							</tr>
						</table>
						<table class="table">
							<tr>
								<td style="color: #000000; width: 20%">Alamat</td>
								<td><textarea type="textarea" name="alamat" class="form-control" placeholder="Alamat" rows="5" required=""></textarea></td>
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
								<td style="color: #000000; width: 20%">Keterangan</td>
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
$(document).ready(function() {
       
    $("#nomor_awal").focusout(function(){
    	if($("#nomor_awal").val() == 0){
    		$("#nomor_akhir").prop('disabled', true);
    	}else{
    		$("#nomor_akhir").prop('disabled', false);
    	}
    	
    });


    $("#nomor_akhir").focusout(function(){
    	var total = $("#nomor_akhir").val() - $("#nomor_awal").val() + 1;
    	$("#tabel_datab").empty();
    	var baris = 
		    	`<tr id="tabel_datab1">
					<td style="width: 20%; color: #000000">Data B</td>
					<td>
						<input type="text" name="datab[]" class="form-control" required="">
					</td>
				</tr>`;
		$("#tabel_datab").append(baris);

    	for(var i = 1; i < total; i++){
    		var baris = 
		    	`<tr id="tabel_datab1">
					<td style="width: 20%; color: #000000">Data B</td>
					<td>
						<input type="text" name="datab[]" class="form-control" required="">
					</td>
				</tr>`;
			$("#tabel_datab").append(baris);
    	}
    });

});

function status_tgl(x){
	if (x == 1) {
		document.getElementById('tgl_d').disabled = false;
		document.getElementById('tgl_m').disabled = false;
	}else{
		document.getElementById('tgl_d').disabled = true;
		document.getElementById('tgl_m').disabled = true;
	}
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


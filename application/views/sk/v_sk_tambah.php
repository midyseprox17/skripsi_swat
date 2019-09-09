<link rel="stylesheet" href="<?=base_url().'assets/'?>css/bootstrap-select.min.css">
<script src="<?=base_url().'assets/'?>js/bootstrap-select.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Surat Keluar</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url().'sk/tambah'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td colspan="2" align="right"><a href="<?=base_url().'sk/tambah_bernomor'?>">Sudah punya nomor? Klik Disini</a></td>
							</tr>
							<tr>
								<td>Kode</td>
								<td>
									<div class="float-left" style="width: 30%">
										<select name="penomoran_id" class="custom-select form-control">
											<?php foreach ($penomoran->result() as $p) {
											?>
												<option value="<?=$p->id?>"><?=$p->kode?> | <?=$p->nama?></option>
											<?php
											}
											?>
										</select>
									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jumlah Nomor sk</td>
								<td>
									<div class="float-left" style="width: 10%">
								      	<select class="custom-select form-control form-control-sm" id="jumlah_sk" name="jumlah_sk" required="">
										    <option value="1">1</option>
										    <option value="2">2</option>
										    <option value="3">3</option>
										    <option value="4">4</option>
										    <option value="5">5</option>
										    <option value="6">6</option>
										    <option value="7">7</option>
										    <option value="8">8</option>
										    <option value="9">9</option>
										    <option value="10">10</option>
									  	</select>
								    </div>
								</td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Tanggal Surat</td>
								<td>
									<div class="col-sm-10">
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="status_tanggal" id="status_tanggal" onclick="status_tgl(0)" value="sekarang" checked="">
								          <label class="form-check-label">
								            Tanggal Sekarang
								          </label>
								        </div>
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="status_tanggal" id="status_tanggal" value="pilih" onclick="status_tgl(1)">
								          <label class="form-check-label">
								            Pilih Tanggal
								          </label>
								        </div>
								        <div class="form-group row mt-2" id="show_status_tanggal">
								        	<div class="col-sm-2">
								        		Tanggal<input type="number" class="form-control" placeholder="Tgl" name="tgl_d" id="tgl_d" min="1" max="31" disabled="">
								        	</div>
								        	<div class="col-sm-2">
								        		Bulan<select class="custom-select form-control form-control-sm" id="tgl_m" name="tgl_m" disabled="">
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
								        		Tahun<input type="number" class="form-control" placeholder="Tahun" name="tgl_y" id="tgl_y" value="<?=date('Y')?>" readonly="">
								        	</div>
								        </div>
								    </div>
					    		</td>
							</tr>
						</table>
						<table class="table" id="tabel_hal">
							<tr>
								<td style="color: #000000; width: 20%">Hal</td>
								<td>
									<select name="hal" id="hal" class="form-control" onchange="perihal()">
										<option value="-">---</option>
										<?php
										foreach ($grup_hal->result() as $value) {
										?>
											<option value="<?=$value->hal?>"><?=$value->hal?></option>
										<?php
										}
										?>
										<option value="lainnya">Lainnya</option>
									</select>
								</td>
							</tr>
						</table>
						<table class="table">
							<tr id="tr_isi">
								<td style="color: #000000; width: 20%">Isi Ringkasan</td>
								<td><textarea type="textarea" name="isi" class="form-control" id="isi" placeholder="Isi Ringkasan (Isi '-' Jika Hal Nota Pemeriksaan)" rows="5" required=""></textarea></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Catatan</td>
								<td><input type="text" name="catatan" class="form-control"></td>
							</tr>
						</table>
						<table class="table" id="tabel_kepada">
							<tr id="tabel_kepada1">
								<td style="width: 20%; color: #000000">Kepada</td>
								<td>
									<input type="text" name="kepada[]" id="kepada" class="form-control" required="" onkeyup="grup_kepada(this)">
								</td>
							</tr>
						</table>
						<table class="table" id="tabel_pegawai">
							<tr id="tabel_pegawai1">
								<td style="width: 20%; color: #000000">Pengolah</td>
								<td>
									<select class="form-control selectpicker" data-live-search="true" name="pegawai[]" style="width: 40%" placeholder="Nama" required="">
										<?php foreach ($pegawai->result() as $p) {
										?>
											<option value="<?=$p->id?>"><?=$p->nip.' | '.$p->nama?></option>
										<?php
										}
										?>
									</select>
								</td>
								<td>
									<button type="button" class="btn btn-primary mx-3" onclick="tambah_baris_pegawai()"><i class="fa fa-plus"></i></button>
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
    $(document).on("focus", "#datepicker", function(){
        $(this).datepicker({
        	autoHide : true,
        	inline : true,
        	format: 'yyyy-mm-dd'
        });
    });
    
    $("#jumlah_sk").change(function(){
    	var total = $("#jumlah_sk").val();
    	$("#tabel_kepada").empty();
    	
    	for(var i = 1; i <= total; i++){
    		var baris = 
		    	`<tr>
					<td style="width: 20%; color: #000000">Kepada</td>
					<td>
						<input type="text" name="kepada[]" class="form-control" required="" onkeyup="grup_kepada(this)">
					</td>
				</tr>`;
			$("#tabel_kepada").append(baris);
    	}
    });
});

function tambah_baris_pegawai(){
	$rowno = $("#tabel_pegawai tr").length;
	$rowno = $rowno + 1;
    $.ajax({
        url : "<?=base_url().'pegawai/list_pegawai'?>",
        method : "POST",
        dataType : 'json',
        success: function(data){
            var html = `<tr id="tabel_pegawai`+$rowno+`"><td style="width: 20%; color: #000000">Nama</td><td><select class="form-control pegawai_selectpicker" data-live-search="true" name="pegawai[]" style="width: 40%" placeholder="Nama" required="">`;
            var i;
            for(var i = 0; i < data.length; i++){
                html += `<option value="`+data[i]['id']+`">`+data[i]['nip']+` | `+data[i]['nama']+`</option>`;
            }
            html += `</select></td><td><button class="btn btn-danger mx-3" onclick=hapus_baris_pegawai(`+$rowno+`)><i class="fa fa-minus"></i></button></td></tr>`;
            $("#tabel_pegawai tr:last").after(html); 
            $('.pegawai_selectpicker').selectpicker('refresh');
        }
    });
}

function tambah_baris_pelanggaran(){
	$rowno = $("#tabel_hal tr").length;
	$rowno = $rowno + 1;
    $.ajax({
        url : "<?=base_url().'jenispelanggaran/list_jenis_pelanggaran'?>",
        method : "POST",
        dataType : 'json',
        success: function(data){
            var html = `<tr id="tr_pelanggaran`+$rowno+`" class="tr_pelanggaran"><td style="width: 20%; color: #000000">Pelanggaran</td><td><select class="form-control pelanggaran_selecpicker" data-live-search="true" name="pelanggaran[]" style="width: 40%" placeholder="Pelanggaran" required="">`;
            var i;
            for(var i = 0; i < data.length; i++){
                html += `<option value="`+data[i]['id']+`">`+data[i]['nama']+`</option>`;
            }
            html += `</select></td><td><button class="btn btn-danger mx-3" onclick=hapus_baris_pelanggaran(`+$rowno+`)><i class="fa fa-minus"></i></button></td></tr>`;
            $("#tabel_hal tr:last").after(html); 
            $('.pelanggaran_selecpicker').selectpicker('refresh');
        }
    });
}

function hapus_baris_pegawai(rowno)
{
	$('#tabel_pegawai'+rowno).remove();
}

function hapus_baris_pelanggaran(rowno)
{
	$('#tr_pelanggaran'+rowno).remove();
}

function status_tgl(x){
	if (x == 1) {
		document.getElementById('tgl_d').disabled = false;
		document.getElementById('tgl_m').disabled = false;
	}else{
		document.getElementById('tgl_d').disabled = true;
		document.getElementById('tgl_m').disabled = true;
	}
}

function perihal(){
	var hal = $("#hal").val();
	hal = hal.toLowerCase();
	var tr_hal = `<tr id="tr_hal">
					<td style="width: 20%; color: #000000">Hal Lainnya</td>
					<td><input name="hal" class="form-control" placeholder="Masukan Perihal" required></td>
				</tr>`;


	if((hal.includes('nota pemeriksaan')) && !(hal.includes('balasan'))){

		$.ajax({
	        url : "<?=base_url().'sp/list_sp'?>",
	        method : "POST",
	        dataType : 'json',
	        success: function(data){
	        	$("#tr_sp").remove();
				$("#tr_hal").remove();
				$(".tr_pelanggaran").remove();

	            var html = `<tr id="tr_sp"><td style="width: 20%; color: #000000">Nomor SP</td><td><select class="form-control sp_selectpicker" data-live-search="true" name="sp_id" style="width: 40%" placeholder="SP" required="">`;
	            var i;
	            for(var i = 0; i < data.length; i++){
	                html += `<option value="`+data[i]['id']+`">`+data[i]['nomor']+` | `+data[i]['tanggal']+`-`+data[i]['bulan']+`-`+data[i]['tahun']+` | `+data[i]['tujuan']+`</option>`;
	            }
	            html += `</select></td></tr>`;
	            $("#tabel_hal tr:last").after(html); 
	            $('.sp_selectpicker').selectpicker('refresh');
	        }
	    });

	    $.ajax({
	        url : "<?=base_url().'jenispelanggaran/list_jenis_pelanggaran'?>",
	        method : "POST",
	        dataType : 'json',
	        success: function(data){
	            var html = `<tr class="tr_pelanggaran"><td style="width: 20%; color: #000000">Pelanggaran</td><td><select class="form-control pelanggaran_selecpicker" data-live-search="true" name="pelanggaran[]" style="width: 40%" placeholder="Pelanggaran" required="">`;
	            var i;
	            for(var i = 0; i < data.length; i++){
	                html += `<option value="`+data[i]['id']+`">`+data[i]['nama']+`</option>`;
	            }
	            html += `</select></td><td><button type="button" class="btn btn-primary mx-3" onclick="tambah_baris_pelanggaran()"><i class="fa fa-plus"></i></button></td></tr>`;
	            $("#tabel_hal tr:last").after(html); 
	            $('.pelanggaran_selecpicker').selectpicker('refresh');
	        }
	    });

	}else if(hal == 'lainnya'){
		$("#tr_sp").remove();
		$("#tr_hal").remove();
		$(".tr_pelanggaran").remove();

		$("#tabel_hal tr:last").after(tr_hal); 
	}else{
		$("#tr_sp").remove();
		$("#tr_hal").remove();
		$(".tr_pelanggaran").remove();
	}
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


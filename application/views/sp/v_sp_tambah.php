<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Surat Perintah</h6>
				</div>
				<div class="card-body">
					<form name="tambah_sp" id="tambah_sp">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td style="width: 20%; color: #000000">Jumlah Nomor SP</td>
								<td>
									<div class="float-left" style="width: 30%">
								      <select class="custom-select form-control form-control-sm" id="jumlah_sp" name="jumlah_sp" required="">
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
								<td style="color: #000000">Tanggal Surat</td>
								<td>
									<div class="col-sm-10">
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="status_tanggal" id="status_tanggal" onclick="status_tgl(0)" value="sekarang">
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
								        		Tahun<input type="number" class="form-control" placeholder="Tahun" name="tgl_y" id="tgl_y" value="2019" disabled="">
								        	</div>
								        </div>
								    </div>
					    		</td>
							</tr>
						</table>
						<!-- Dynamic Add & Remove Field -->
						<table class="table" id="dynamic_field">
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td><input class="form-control float-left" type="text" name="pegawai[]" style="width: 40%" placeholder="Nama">
									<button type="button" class="btn btn-primary mx-3" id="add" name="add"><i class="fa fa-plus"></i></button>
								</td>
							</tr>
						</table>
						<!-- :) -->
						<table class="table" id="dynamic_field1">	
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Keluar</td>
								<td style="width: 80%">
									<div class="form-inline">
										<input id="datepicker" name="tanggal_sp[]" width="20%"/>
										<input id="datepicker" name="tanggal_sp[]" width="20%"/>
								    	<textarea type="textarea" class="form-control mx-1" name="tujuan[]" placeholder="Tujuan" rows="1" style="width: 79%"></textarea>	
									</div>
								    
					    		</td>
							</tr>
						</table>
						<table class="table">
							<tr>
								<td style="color: #000000; width: 20%">Hal</td>
								<td><textarea type="textarea" name="hal" class="form-control" placeholder="Keterangan" rows="5"></textarea>
							</tr>
							<tr>
								<td style="color: #000000">Keterangan</td>
								<td><textarea type="textarea" name="keterangan" class="form-control" placeholder="Keterangan" rows="5"></textarea>
							</tr>
						</table>
						<div class="tile-footer">
			            	<button class="btn btn-primary" type="submit" name="submit">Tambah Data</button>
			            </div>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>
 
<script src="<?=base_url().'assets/'?>vendor/jquery/jquery-ui.js"></script>
<link href="<?=base_url().'assets/'?>vendor/jquery/jquery-ui.css" rel="stylesheet">
<script>
$(document).ready(function() {
    // $('.addmore').on('click', function() {
    //     $(".mytemplate").clone().removeClass("mytemplate").show().appendTo(".dates");
    // });
    $(document).on("focus", "#datepicker", function(){
        $(this).datepicker({
            uiLibrary: 'bootstrap4'
        });
    });
});

$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td style="width: 20%; color: #000000"></td><td><input class="form-control float-left" type="text" name="pegawai[]" style="width: 40%" placeholder="Nama"><type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove mx-3"><i class="fa fa-times"></i></button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
});

$(document).ready(function(){
	var i=1;
	$('#jumlah_sp').change(function(){
		i++;
		$('#dynamic_field1').append('<tr id="row'+i+'"><td style="width: 20%; color: #000000">Tanggal Keluar</td><td style="width: 80%"><div class="form-inline"><input id="datepicker" name="tanggal_sp[]" width="20%"/><textarea type="textarea" class="form-control mx-1" name="tujuan[]" placeholder="Tujuan" rows="1" style="width: 79%"></textarea></div></td></tr>');
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
</script>


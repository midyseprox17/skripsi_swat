<head>
	<script src="<?=base_url().'assets/'?>vendor/jquery/jquery-3.3.1.min.js"></script>
	<script src="<?=base_url().'assets/'?>js/gijgo.js"></script>
    <link href="<?=base_url().'assets/'?>css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>

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
								      <select class="custom-select form-control form-control-sm" id="jumlah_sp" name="jumlah_sp">
									    <option value="1">1</option>
									    <option value="2">2</option>
									    <option value="3">3</option>
									    <option value="3">4</option>
									    <option value="3">5</option>
									  </select>
								    </div>
								</td>
							</tr>
							<tr>
								<td style="color: #000000">Nomor Surat</td>
								<td><input class="form-control float-left" type="text" name="telp" style="width: 30%"></td>
							</tr>
							<tr>
								<td style="color: #000000">Tanggal Surat</td>
								<td>
									<div class="col-sm-10">
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" onclick="status_tanggal(0)" value="option1">
								          <label class="form-check-label" for="gridRadios1">
								            Tanggal Sekarang
								          </label>
								        </div>
								        <div class="form-check">
								          <input class="form-check-input" type="radio" id="gridRadios2" value="option2" onclick="status_tanggal(1)">
								          <label class="form-check-label" for="gridRadios2">
								            Pilih tanggal
								          </label>
								        </div>
								        <div class="form-group row mt-2" id="show_status_tanggal">
								        	<div class="col-sm-2">
								        		<input type="number" class="form-control" placeholder="Tgl">
								        	</div>
								        	<div class="col-sm-2">
								        		<input type="number" class="form-control" placeholder="Bulan">
								        	</div>
								        	<div class="col-sm-2">
								        		<input type="number" class="form-control" placeholder="Tahun">
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
<script>
$(document).ready(function(){
	var i=1;
	$('#add').click(function(){
		i++;
		$('#dynamic_field').append('<tr id="row'+i+'"><td style="width: 20%; color: #000000">Nama</td><td><input class="form-control float-left" type="text" name="pegawai[]" style="width: 40%" placeholder="Nama"><type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove mx-3"><i class="fa fa-times"></i></button></td></tr>');
	});
	
	$(document).on('click', '.btn_remove', function(){
		var button_id = $(this).attr("id"); 
		$('#row'+button_id+'').remove();
	});
	
	$('#submit').click(function(){		
		$.ajax({
			url:"<?php echo base_url().'jenis/get_jenis'; ?>",
			method:"POST",
			data:$('#tambah_sp').serialize(),
			success:function(data)
			{
				alert(data);
				$('#tambah_sp')[0].reset();
			}
		});
	});
	
});
</script>
<script>
$(document).ready(function(){
	var i=1;
	$('#jumlah_sp').change(function(){
		i++;
		$('#dynamic_field1').append('<tr id="row'+i+'"><td style="width: 20%; color: #000000">Tanggal Keluar</td><td style="width: 80%"><div class="form-inline"><input id="datepicker" name="tanggal_sp[]" width="20%"/><textarea type="textarea" class="form-control mx-1" name="tujuan[]" placeholder="Tujuan" rows="1" style="width: 79%"></textarea></div></td></tr>');
	});

	$('#submit').click(function(){		
		$.ajax({
			url:"<?php echo base_url().'jenis/get_jenis'; ?>",
			method:"POST",
			data:$('#tambah_sp').serialize(),
			success:function(data)
			{
				alert(data);
				$('#tambah_sp')[0].reset();
			}
		});
	});
	
});
</script>
<script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap4'
        });
</script>
<script>
        function status_tanggal_show(x){
        	if (x==0) {
        		document.getElementById('show_status_tanggal(0)').style.display='block';
        	else document.getElementById('show_status_tanggal(1)').style.display='block';
        	return;
        	}
        }
</script>
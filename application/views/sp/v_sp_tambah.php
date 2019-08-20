<head>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Surat Perintah</h6>
				</div>
				<div class="card-body">
					<form name="tambah_sp" id="tambah_sp">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td style="width: 20%">Jumlah Nomor SP</td>
								<td>
									<div class="float-left" style="width: 30%">
								      <select class="custom-select form-control form-control-sm">
									    <option value="1">1</option>
									    <option value="2">2</option>
									    <option value="3">3</option>
									  </select>
								    </div>
								</td>
							</tr>
							<tr>
								<td>Nomor Surat</td>
								<td><input class="form-control float-left" type="text" name="telp" style="width: 30%"></td>
							</tr>
							<tr>
								<td>Tanggal Surat</td>
								<td>
									<div class="col-sm-10">
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
								          <label class="form-check-label" for="gridRadios1">
								            Tanggal Sekarang
								          </label>
								        </div>
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
								          <label class="form-check-label" for="gridRadios2">
								            Pilih tanggal
								          </label>
								        </div>
								        <div class="form-group row mt-2">
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
								<td style="width: 20%">Nama</td>
								<td><input class="form-control float-left" type="text" name="nama[]" style="width: 40%" placeholder="Nama">
									<button type="button" class="btn btn-primary mx-3" id="add" name="add"><i class="fa fa-plus"></i></button>
								</td>
							</tr>
						</table>
						<!-- :) -->
						<table class="table">	
							<tr>
								<td style="width: 20%">Tanggal Keluar</td>
								<td>
									<div class="float-left">
								        <div class="form-group row">
								        	<div class="col-sm-2">
								        		<input type="text" class="form-control" placeholder="Tanggal">
								        	</div>
								        	<div class="col-sm-2">
								        		<input type="text" class="form-control" placeholder="Bulan">
								        	</div>
								        	<div class="col-sm-2">
								        		<input type="text" class="form-control" placeholder="Tahun">
								        	</div>
								        	<div class="col-sm-6">
								        		<textarea type="textarea" class="form-control" placeholder="Tujuan" rows="2"></textarea>
								        	</div>
								        </div>
								    </div>
					    		</td>
							</tr>
							<tr>
								<td>Hal</td>
								<td><textarea type="textarea" class="form-control" placeholder="Keterangan" rows="5"></textarea>
							</tr>
							<tr>
								<td>Keterangan</td>
								<td><textarea type="textarea" class="form-control" placeholder="Keterangan" rows="5"></textarea>
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
		$('#dynamic_field').append('<tr id="row'+i+'"><td style="width: 20%"></td><td><input class="form-control float-left" type="text" name="nama[]" style="width: 40%" placeholder="Nama"><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove mx-3"><i class="fa fa-times"></i></button></td></tr>');
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
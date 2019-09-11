<link  href="<?=base_url().'assets/'?>vendor/jquery/datepicker.css" rel="stylesheet">
<script src="<?=base_url().'assets/'?>vendor/jquery/datepicker.js"></script>
<link rel="stylesheet" href="<?=base_url().'assets/'?>css/bootstrap-select.min.css">
<script src="<?=base_url().'assets/'?>js/bootstrap-select.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Surat Perintah</h6>
				</div>
				<div class="card-body">
					<form name="tambah_sp" id="tambah_sp" method="post" action="<?=base_url().'sp/tambah_bernomor'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td colspan="2" align="right"><a href="<?=base_url().'sp/tambah'?>">Belum punya nomor? Klik Disini</a></td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nomor SP</td>
								<td>
									<div class="form-group row mt-1">
										<div class="col-sm-2">
							        		Dari Nomor<input type="number" class="form-control" name="nomor_awal" id="nomor_awal" min="1" required="">
							        	</div>
							        	<div class="col-sm-2">
							        		Sampai Nomor<input type="number" class="form-control" name="nomor_akhir" id="nomor_akhir" min="0" value="0" disabled="">
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
								        		Tanggal<input type="number" class="form-control" placeholder="Tgl" name="tgl_d" id="tgl_d" min="1" max="31" required="">
								        	</div>
								        	<div class="col-sm-2">
								        		Bulan<select class="custom-select form-control form-control-sm" id="tgl_m" name="tgl_m" required="">
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
								        		Tahun<input type="number" class="form-control" placeholder="Tahun" name="tgl_y" id="tgl_y" value="<?=date('Y')?>">
								        	</div>
								        </div>
								    </div>
					    		</td>
							</tr>
						</table>
						<!-- Dynamic Add & Remove Field -->
						<table class="table" id="tabel_pegawai">
							<tr id="tabel_pegawai1">
								<td style="width: 20%; color: #000000">Nama</td>
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
						<!-- :) -->
						<table class="table" id="tabel_tanggal">	
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Keluar</td>
								<td style="width: 80%">
									<div class="form-inline">
										<div class="input-group">
											<input type="text" name="tanggal_sp[]" id="datepicker" class="form-control docs-date" placeholder="Pilih Tanggal" required="">
											<div class="input-group-append">
												<button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled="">
													<i class="fa fa-calendar" aria-hidden="true"></i>
												</button>
								            </div>
								        </div>
								    	<textarea type="textarea" class="form-control ml-3" name="tujuan[]" placeholder="Tujuan" rows="1" style="width: 67%" required=""></textarea>	
									</div>
								    
					    		</td>
							</tr>
						</table>
						<table class="table">
							<tr>
								<td style="color: #000000; width: 20%">Hal</td>
								<td><textarea type="textarea" name="hal" class="form-control" placeholder="Hal" rows="5" required=""></textarea>
							</tr>
							<tr>
								<td style="color: #000000">Keterangan</td>
								<td><textarea type="textarea" name="keterangan" class="form-control" placeholder="Keterangan" rows="5"></textarea>
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

    $("#nomor_awal").focusout(function(){
    	if($("#nomor_awal").val() == 0){
    		$("#nomor_akhir").prop('disabled', true);
    	}else{
    		$("#nomor_akhir").prop('disabled', false);
    	}
    	
    });

    $("#nomor_akhir").focusout(function(){
    	var total = $("#nomor_akhir").val() - $("#nomor_awal").val() + 1;
    	$("#tabel_tanggal").empty();
    	var text = 
    		`<tr>
				<td style="width: 20%; color: #000000">Tanggal Keluar</td>
				<td style="width: 80%">
					<div class="form-inline">
						<div class="input-group">
							<input type="text" name="tanggal_sp[]" id="datepicker" class="form-control docs-date" placeholder="Pilih Tanggal" required>
							<div class="input-group-append">
								<button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled="">
									<i class="fa fa-calendar" aria-hidden="true"></i>
								</button>
				            </div>
				        </div>
				    	<textarea type="textarea" class="form-control ml-3" name="tujuan[]" placeholder="Tujuan" rows="1" style="width: 67%" required></textarea>	
					</div>
				    
				</td>
			</tr>`;

    	$("#tabel_tanggal").append(text);
    	for(var i = 1; i <= total-1; i++){
    		var baris = 
		    	`<tr>
					<td></td>
					<td style="width: 80%">
						<div class="form-inline">
							<div class="input-group">
								<input type="text" name="tanggal_sp[]" id="datepicker" class="form-control docs-date" placeholder="Pilih Tanggal" required>
								<div class="input-group-append">
									<button type="button" class="btn btn-outline-secondary docs-datepicker-trigger" disabled="">
										<i class="fa fa-calendar" aria-hidden="true"></i>
									</button>
					            </div>
					        </div>
					    	<textarea type="textarea" class="form-control ml-3" name="tujuan[]" placeholder="Tujuan" rows="1" style="width: 67%" required></textarea>	
						</div>
					    
					</td>
				</tr>`;
			$("#tabel_tanggal").append(baris);
    	}
    });

});

function tambah_baris_pegawai(){
	$rowno=$("#tabel_pegawai tr").length;
	$rowno = $rowno + 1;
    $.ajax({
        url : "<?=base_url().'pegawai/list_pegawai'?>",
        method : "POST",
        dataType : 'json',
        success: function(data){
            var html = '<tr id="tabel_pegawai'+$rowno+'"><td>Nama</td><td><select class="form-control selectpicker" data-live-search="true" name="pegawai[]" style="width: 40%" placeholder="Nama" required="">';
            var i;
            for(var i = 0; i < data.length; i++){
                html += '<option value="'+data[i]['id']+'">'+data[i]['nip']+' | '+data[i]['nama']+'</option>';
            }
            html += '</select></td><td><button class="btn btn-danger mx-3" onclick=hapus_baris_pegawai('+$rowno+')><i class="fa fa-minus"></i></button></td></tr>';
            $("#tabel_pegawai tr:last").after(html); 
            $('.selectpicker').selectpicker('refresh');
        }
    });
}

function hapus_baris_pegawai(rowno)
{
	$('#tabel_pegawai'+rowno).remove();
}
</script>


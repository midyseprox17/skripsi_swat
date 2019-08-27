<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Surat Masuk</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url().'sm/tambah_bernomor'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td colspan="2" align="right"><a href="<?=base_url().'sm/tambah'?>">Belum punya nomor? Klik Disini</a></td>
							</tr>
							<tr>
								<td style="color: #000000">Nomor</td>
								<td>
									<div class="form-group row">
										<div class="col-xs-2">
											<input type="number" name="nomor" required="" class="form-control sm">
										</div>
									</div>
								</td>
							</tr>
							<tr>
								<td style="color: #000000">Tanggal Surat</td>
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
								<td><input type="text" name="dari" class="form-control"></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Nomor Surat</td>
								<td><input type="text" name="nomor_surat" class="form-control"></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Catatan</td>
								<td><input type="text" name="catatan" class="form-control"></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Tgl Diarsipkan</td>
								<td>
									<div class="form-group row mt-2">
							        	<div class="col-sm-2">
							        		Tanggal<input type="number" class="form-control" placeholder="Tgl" name="arsip_tgl_d" id="arsip_tgl_d" min="1" max="31">
							        	</div>
							        	<div class="col-sm-2">
							        		Bulan<select class="custom-select form-control form-control-sm" id="arsip_tgl_m" name="arsip_tgl_m">
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
							        		Tahun<input type="number" class="form-control" placeholder="Tahun" name="arsip_tgl_y" id="arsip_tgl_y" value="<?=date('Y')?>" readonly="">
							        	</div>
							        	<div>
							        		<font color="red">*Biarkan jika belum diarsipkan</font>
							        	</div>
							        </div>
							    </div>
								</td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Tgl Diteruskan</td>
								<td>
									<div class="form-group row mt-2">
							        	<div class="col-sm-2">
							        		Tanggal<input type="number" class="form-control" placeholder="Tgl" name="terus_tgl_d" id="terus_tgl_d" min="1" max="31">
							        	</div>
							        	<div class="col-sm-2">
							        		Bulan<select class="custom-select form-control form-control-sm" id="terus_tgl_m" name="terus_tgl_m">
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
							        		Tahun<input type="number" class="form-control" placeholder="Tahun" name="terus_tgl_y" id="terus_tgl_y" value="<?=date('Y')?>" readonly="">
							        	</div>
							        	<div>
							        		<font color="red">*Biarkan jika belum diteruskan</font>
							        	</div>
							        </div>
							    </div>
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


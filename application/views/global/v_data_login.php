<link rel="stylesheet" href="<?=base_url().'assets/'?>css/bootstrap-select.min.css">
<script src="<?=base_url().'assets/'?>js/bootstrap-select.min.js"></script>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Data Login</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url().'sk/tambah'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td colspan="2" align="right"><a href="<?=base_url().'sk/tambah_bernomor'?>">Sudah punya nomor? Klik Disini</a></td>
							</tr>
							<tr>
								<td style="color: #000000; width: 20%">Kode</td>
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
								<td>
									<button type="button" class="btn btn-primary mx-3" onclick="tambah_baris_kepada()"><i class="fa fa-plus"></i></button>
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
<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Ubah Data Login</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url('swat/data_login')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table" style="width: 100%">
							<tr>
								<td style="width: 20%; color: #000000">Username</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Username" name="username" required="" value="<?=$data->username?>" readonly>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" required="" value="<?=$data->nama?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jabatan</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" value="<?=strtoupper($data->hak_akses)?>" readonly>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pertanyaan 1</td>
								<td style="width: 100%" class="float-left">
									<select name="pertanyaan1" class="form-control">
										<option value=" " <?=$data->pertanyaan1 == ' ' ? 'selected' : ''?>> </option>
										<option value="Apa makanan kesukaanmu?" <?=$data->pertanyaan1 == 'Apa makanan kesukaanmu?' ? 'selected' : ''?>>Apa makanan kesukaanmu?</option>
										<option value="Apa minuman kesukaanmu?" <?=$data->pertanyaan1 == 'Apa minuman kesukaanmu?' ? 'selected' : ''?>>Apa minuman kesukaanmu?</option>
										<option value="Siapa nama ibumu?" <?=$data->pertanyaan1 == 'Siapa nama ibumu?' ? 'selected' : ''?>>Siapa nama ibumu?</option>
										<option value="Siapa nama ayahmu?" <?=$data->pertanyaan1 == 'Siapa nama ayahmu?' ? 'selected' : ''?>>Siapa nama ayahmu?</option>
										<option value="Hewan apa yang pertama kali kamu pelihara?" <?=$data->pertanyaan1 == 'Hewan apa yang pertama kali kamu pelihara?' ? 'selected' : ''?>>Hewan apa yang pertama kali kamu pelihara?</option>
										<option value="Siapa nama orang yang kamu sayang?" <?=$data->pertanyaan1 == 'Siapa nama orang yang kamu sayang?' ? 'selected' : ''?>>Siapa nama orang yang kamu sayang?</option>
										<option value="Apa warna kesukaanmu?" <?=$data->pertanyaan1 == 'Apa warna kesukaanmu?' ? 'selected' : ''?>>Apa warna kesukaanmu?</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jawaban</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Jawaban" name="jawaban1" id="jawaban1" required="" value="<?=$data->jawaban1?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pertanyaan 2</td>
								<td style="width: 100%" class="float-left">
									<select name="pertanyaan2" class="form-control">
										<option value=" " <?=$data->pertanyaan2 == ' ' ? 'selected' : ''?>> </option>
										<option value="Apa makanan kesukaanmu?" <?=$data->pertanyaan2 == 'Apa makanan kesukaanmu?' ? 'selected' : ''?>>Apa makanan kesukaanmu?</option>
										<option value="Apa minuman kesukaanmu?" <?=$data->pertanyaan2 == 'Apa minuman kesukaanmu?' ? 'selected' : ''?>>Apa minuman kesukaanmu?</option>
										<option value="Siapa nama ibumu?" <?=$data->pertanyaan2 == 'Siapa nama ibumu?' ? 'selected' : ''?>>Siapa nama ibumu?</option>
										<option value="Siapa nama ayahmu?" <?=$data->pertanyaan2 == 'Siapa nama ayahmu?' ? 'selected' : ''?>>Siapa nama ayahmu?</option>
										<option value="Hewan apa yang pertama kali kamu pelihara?" <?=$data->pertanyaan2 == 'Hewan apa yang pertama kali kamu pelihara?' ? 'selected' : ''?>>Hewan apa yang pertama kali kamu pelihara?</option>
										<option value="Siapa nama orang yang kamu sayang?" <?=$data->pertanyaan2 == 'Siapa nama orang yang kamu sayang?' ? 'selected' : ''?>>Siapa nama orang yang kamu sayang?</option>
										<option value="Apa warna kesukaanmu?" <?=$data->pertanyaan2 == 'Apa warna kesukaanmu?' ? 'selected' : ''?>>Apa warna kesukaanmu?</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jawaban 2</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Jawaban" name="jawaban2" id="jawaban2" required="" value="<?=$data->jawaban2?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000"></td>
								<td style="width: 100%" class="float-left" align="right">
									<button class="btn btn-primary" type="submit" name="submit" value="1">Simpan Data</button>
								</td>
							</tr>
						</table>
						<!-- <div class="tile-footer">
			            	<button class="btn btn-primary" type="submit" name="submit" value="1">Simpan Data</button>
			            </div> -->
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>

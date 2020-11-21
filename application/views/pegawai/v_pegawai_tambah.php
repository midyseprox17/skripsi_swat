<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Pegawai</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url('pegawai/tambah')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table" style="width: 100%">
							<tr>
								<td style="width: 20%; color: #000000">Devisi</td>
								<td style="width: 100%" class="float-left">
									<select name="devisi_id" class="form-control">
										<option value="1">Security</option>
										<option value="2">Cleaning Service</option>
										<option value="3">Parkir</option>
										<option value="4">BackOffice</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">NIK</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Induk Kependudukan" name="nik" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nama Pegawai" name="nama" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No KK</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Kartu Keluarga" name="no_kk" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No BPJS Ketenagakerjaan(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor BPJS Ketenagakerjaan" name="bo_bpjs_ketenagakerjaan">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No BPJS Kesehatan(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor BPJS Kesehatan" name="no_bpjs_kesehatan">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Kelas BPJS(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Kelas BPJS" name="kelas_bpjs">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No NPWP(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor NPWP" name="no_npwp">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Alamat</td>
								<td style="width: 100%" class="float-left">
									<textarea class="form-control" placeholder="Masukan Alamat Lengkap" name="alamat" required=""></textarea>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Telp</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Telepon" name="telp" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Email</td>
								<td style="width: 100%" class="float-left">
									<input type="email" class="form-control" placeholder="Masukan Email" name="email" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Bank</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Bank" name="bank" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No Rekening</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Rekening" name="no_rek" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Masuk</td>
								<td style="width: 100%" class="float-left">
									<div class="input-group">
										<input type="number" class="form-control" placeholder="tanggal" name="tgl_masuk_tanggal" required="" max="31">
										<select name="tgl_masuk_bulan" class="form-control">
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
										<input type="number" class="form-control" placeholder="tahun" name="tgl_masuk_tahun" required="">
									</div>
								</td>
							</tr>
						<!-- 	<tr>
								<td style="width: 20%; color: #000000">Tanggal Habis Kontrak</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="" name="" required="">
								</td>
							</tr> -->
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Lahir</td>
								<td style="width: 100%" class="float-left">
									<div class="input-group">
										<input type="number" class="form-control" placeholder="tangal" name="tgl_lahir_tanggal" required="" max="31">
										<select name="tgl_lahir_bulan" class="form-control">
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
										<input type="number" class="form-control" placeholder="tahun" name="tgl_lahir_tahun" required="">
									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jenis Kelamin</td>
								<td style="width: 100%" class="float-left">
									<select name="jenis_kelamin" class="form-control">
										<option value="L">Laki-Laki</option>
										<option value="P">Perempuan</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Tinggi Badan(cm)</td>
								<td style="width: 100%" class="float-left">
									<input type="number" class="form-control" placeholder="" name="tinggi" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pendidikan</td>
								<td style="width: 100%" class="float-left">
									<select name="pendidikan_terakhir" class="form-control">
										<option value="SMP">SMP Sederajat</option>
										<option value="SMA">SMA Sederajat</option>
										<option value="D1">Diploma 1</option>
										<option value="D2">Diploma 2</option>
										<option value="D3">Diploma 3</option>
										<option value="D4">Diploma 4</option>
										<option value="s1">Srata 1</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Sertifikat</td>
								<td style="width: 100%" class="float-left">
									<select name="sertifikat" class="form-control">
										<option value="0">Tidak</option>
										<option value="1">Iya</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pengalaman(bulan)</td>
								<td style="width: 100%" class="float-left">
									<input type="number" class="form-control" placeholder="" name="pengalaman" value="0" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Hijab</td>
								<td style="width: 100%" class="float-left">
									<select name="hijab" class="form-control">
										<option value="0">Tidak</option>
										<option value="1">Iya</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Menikah</td>
								<td style="width: 100%" class="float-left">
									<select name="menikah" class="form-control">
										<option value="0">Belum</option>
										<option value="1">Sudah</option>
									</select>
								</td>
							</tr>
							<!-- <tr>
								<td style="width: 20%; color: #000000">Dalam Kontrak</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="" name="" required="">
								</td>
							</tr> -->
							<tr>
								<td style="width: 20%; color: #000000"></td>
								<td style="width: 100%" class="float-left" align="right">
									<button class="btn btn-primary" type="submit" name="submit" value="1">Tambah Data</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>

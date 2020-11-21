<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Ubah Pegawai</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url('pegawai/ubah')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table" style="width: 100%">
							<tr>
								<td style="width: 20%; color: #000000">NIK</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Induk Kependudukan" name="nik" required="" readonly="" value="<?=$data->nik?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Devisi</td>
								<td style="width: 100%" class="float-left">
									<select name="devisi_id" class="form-control">
										<option value="1" <?=$data->devisi_id == '1' ? 'selected' : ''?>>Security</option>
										<option value="2" <?=$data->devisi_id == '2' ? 'selected' : ''?>>Cleaning Service</option>
										<option value="3" <?=$data->devisi_id == '3' ? 'selected' : ''?>>Parkir</option>
										<option value="4" <?=$data->devisi_id == '4' ? 'selected' : ''?>>BackOffice</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nama Pegawai" name="nama" required="" value="<?=$data->nama?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No KK</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Kartu Keluarga" name="no_kk" required="" value="<?=$data->no_kk?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No BPJS Ketenagakerjaan(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor BPJS Ketenagakerjaan" name="no_bpjs_ketenagakerjaan" value="<?=$data->no_bpjs_ketenagakerjaan?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No BPJS Kesehatan(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor BPJS Kesehatan" name="no_bpjs_kesehatan" value="<?=$data->no_bpjs_kesehatan?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Kelas BPJS(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Kelas BPJS" name="kelas_bpjs" value="<?=$data->kelas_bpjs?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No NPWP(optional)</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor NPWP" name="no_npwp" value="<?=$data->no_npwp?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Alamat</td>
								<td style="width: 100%" class="float-left">
									<textarea class="form-control" placeholder="Masukan Alamat Lengkap" name="alamat" required=""><?=$data->alamat?></textarea>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Telp</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Telepon" name="telp" required="" value="<?=$data->telp?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Email</td>
								<td style="width: 100%" class="float-left">
									<input type="email" class="form-control" placeholder="Masukan Email" name="email" required="" value="<?=$data->email?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Bank</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Bank" name="bank" required="" value="<?=$data->bank?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">No Rekening</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Masukan Nomor Rekening" name="no_rek" required="" value="<?=$data->no_rek?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Masuk</td>
								<td style="width: 100%" class="float-left">
									<?php
									$tanggal_split = explode("-", $data->tgl_masuk);
									?>
									<div class="input-group">
										<input type="number" class="form-control" placeholder="tanggal" name="tgl_masuk_tanggal" required="" value="<?=$tanggal_split[2]?>">
										<select name="tgl_masuk_bulan" class="form-control">
											<option value="1" <?=$tanggal_split[1] == '1' ? 'selected' : ''?>>Januari</option>
											<option value="2" <?=$tanggal_split[1] == '2' ? 'selected' : ''?>>Februari</option>
											<option value="3" <?=$tanggal_split[1] == '3' ? 'selected' : ''?>>Maret</option>
											<option value="4" <?=$tanggal_split[1] == '4' ? 'selected' : ''?>>April</option>
											<option value="5" <?=$tanggal_split[1] == '5' ? 'selected' : ''?>>Mei</option>
											<option value="6" <?=$tanggal_split[1] == '6' ? 'selected' : ''?>>Juni</option>
											<option value="7" <?=$tanggal_split[1] == '7' ? 'selected' : ''?>>Juli</option>
											<option value="8" <?=$tanggal_split[1] == '8' ? 'selected' : ''?>>Agustus</option>
											<option value="9" <?=$tanggal_split[1] == '9' ? 'selected' : ''?>>September</option>
											<option value="10" <?=$tanggal_split[1] == '10' ? 'selected' : ''?>>Oktober</option>
											<option value="11" <?=$tanggal_split[1] == '11' ? 'selected' : ''?>>November</option>
											<option value="12" <?=$tanggal_split[1] == '12' ? 'selected' : ''?>>Desember</option>
										</select>
										<input type="number" class="form-control" placeholder="tahun" name="tgl_masuk_tahun" required="" value="<?=$tanggal_split[0]?>">
									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Lahir</td>
								<td style="width: 100%" class="float-left">
									<?php
									$tanggal_split = explode("-", $data->tgl_lahir);
									?>
									<div class="input-group">
										<input type="number" class="form-control" placeholder="tangal" name="tgl_lahir_tanggal" required="" value="<?=$tanggal_split[2]?>">
										<select name="tgl_lahir_bulan" class="form-control">
											<option value="1" <?=$tanggal_split[1] == '1' ? 'selected' : ''?>>Januari</option>
											<option value="2" <?=$tanggal_split[1] == '2' ? 'selected' : ''?>>Februari</option>
											<option value="3" <?=$tanggal_split[1] == '3' ? 'selected' : ''?>>Maret</option>
											<option value="4" <?=$tanggal_split[1] == '4' ? 'selected' : ''?>>April</option>
											<option value="5" <?=$tanggal_split[1] == '5' ? 'selected' : ''?>>Mei</option>
											<option value="6" <?=$tanggal_split[1] == '6' ? 'selected' : ''?>>Juni</option>
											<option value="7" <?=$tanggal_split[1] == '7' ? 'selected' : ''?>>Juli</option>
											<option value="8" <?=$tanggal_split[1] == '8' ? 'selected' : ''?>>Agustus</option>
											<option value="9" <?=$tanggal_split[1] == '9' ? 'selected' : ''?>>September</option>
											<option value="10" <?=$tanggal_split[1] == '10' ? 'selected' : ''?>>Oktober</option>
											<option value="11" <?=$tanggal_split[1] == '11' ? 'selected' : ''?>>November</option>
											<option value="12" <?=$tanggal_split[1] == '12' ? 'selected' : ''?>>Desember</option>
										</select>
										<input type="number" class="form-control" placeholder="tahun" name="tgl_lahir_tahun" required="" value="<?=$tanggal_split[0]?>">
									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jenis Kelamin</td>
								<td style="width: 100%" class="float-left">
									<select name="jenis_kelamin" class="form-control">
										<option value="L" <?=$data->jenis_kelamin == 'L' ? 'selected' : ''?>>Laki-Laki</option>
										<option value="P" <?=$data->jenis_kelamin == 'P' ? 'selected' : ''?>>Perempuan</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Tinggi Badan(cm)</td>
								<td style="width: 100%" class="float-left">
									<input type="number" class="form-control" placeholder="" name="tinggi" required="" value="<?=$data->tinggi?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pendidikan</td>
								<td style="width: 100%" class="float-left">
									<select name="pendidikan_terakhir" class="form-control">
										<option value="SMP" <?=$data->pendidikan_terakhir == 'SMP' ? 'selected' : ''?>>SMP Sederajat</option>
										<option value="SMA" <?=$data->pendidikan_terakhir == 'SMA' ? 'selected' : ''?>>SMA Sederajat</option>
										<option value="D1" <?=$data->pendidikan_terakhir == 'D1' ? 'selected' : ''?>>Diploma 1</option>
										<option value="D2" <?=$data->pendidikan_terakhir == 'D2' ? 'selected' : ''?>>Diploma 2</option>
										<option value="D3" <?=$data->pendidikan_terakhir == 'D3' ? 'selected' : ''?>>Diploma 3</option>
										<option value="D4" <?=$data->pendidikan_terakhir == 'D4' ? 'selected' : ''?>>Diploma 4</option>
										<option value="S1" <?=$data->pendidikan_terakhir == 'S1' ? 'selected' : ''?>>Srata 1</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Sertifikat</td>
								<td style="width: 100%" class="float-left">
									<select name="sertifikat" class="form-control">
										<option value="0" <?=$data->sertifikat == '0' ? 'selected' : ''?>>Tidak</option>
										<option value="1" <?=$data->sertifikat == '1' ? 'selected' : ''?>>Iya</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pengalaman(bulan)</td>
								<td style="width: 100%" class="float-left">
									<input type="number" class="form-control" placeholder="" name="pengalaman" required="" value="<?=$data->pengalaman?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Hijab</td>
								<td style="width: 100%" class="float-left">
									<select name="hijab" class="form-control">
										<option value="0" <?=$data->hijab == '0' ? 'selected' : ''?>>Tidak</option>
										<option value="1" <?=$data->hijab == '1' ? 'selected' : ''?>>Iya</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Menikah</td>
								<td style="width: 100%" class="float-left">
									<select name="menikah" class="form-control">
										<option value="0" <?=$data->menikah == '0' ? 'selected' : ''?>>Belum</option>
										<option value="1" <?=$data->menikah == '1' ? 'selected' : ''?>>Sudah</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Dalam Kontrak</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="" name="" required="" value="<?=$data->dalam_kontrak == '0' ? 'Tidak' : 'Iya'?>" readonly>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000"></td>
								<td style="width: 100%" class="float-left" align="right">
									<button class="btn btn-primary" type="submit" name="submit" value="1">Simpan Data</button>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>

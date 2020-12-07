<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Detail Kontrak <?=$data->klien?>(<?=$data->id?>) - <b>
				  	<?php
		          	if($data->status == 'ditolak'){
		          		echo 'DITOLAK';
		          	}else if($data->status == 'disetujui'){
		          		echo 'DISETUJUI';
		          	}else if($data->status == 'belum'){
		          		echo 'BELUM DIPROSES';
		          	}else if($data->status == 'penempatan'){
		          		echo 'SUDAH PENEMPATAN';
		          	}
		          	?>
		          		
		          	</b></h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url('kontrak/detail')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<input type="hidden" name="id" value="<?=$data->id?>">
						<input type="hidden" name="devisi_id" value="<?=$data->devisi_id?>">
						<table class="table" style="width: 100%">
							<tr>
								<td style="width: 20%; color: #000000">Klien</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" value="<?=$data->klien?>" readonly>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Devisi</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" value="<?=$data->devisi?>" readonly>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jumlah Pegawai</td>
								<td style="width: 100%" class="float-left">
									<input type="text" name="jumlah_pegawai" class="form-control" value="<?=$data->jumlah_pegawai?>" readonly>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Lama Kontrak</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" value="<?=$data->lama_kontrak?>" readonly>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Mulai</td>
								<td style="width: 100%" class="float-left">
									<div class="input-group">
										<?php
										$tanggal_split = explode("-", $data->tgl_mulai);
										?>
										<input type="text" class="form-control" value="<?=$tanggal_split[2]?>" readonly>
										<input type="text" class="form-control" value="<?=$tanggal_split[1]?>" readonly>
										<input type="text" class="form-control" value="<?=$tanggal_split[0]?>" readonly>
									</div>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Tanggal Selesai</td>
								<td style="width: 100%" class="float-left">
									<div class="input-group">
										<?php
										$tanggal_split = explode("-", $data->tgl_selesai);
										?>
										<input type="text" class="form-control" value="<?=$tanggal_split[2]?>" readonly>
										<input type="text" class="form-control" value="<?=$tanggal_split[1]?>" readonly>
										<input type="text" class="form-control" value="<?=$tanggal_split[0]?>" readonly>
									</div>
								</td>
							</tr>
						</table>
						<table class="table" id="tbl_kriteria">
							<?php
							$nomor = 1;
							$kriteria1 = $kriteria->result_array();
							foreach ($kriteria->result() as $value) {
							?>
								<tr>
									<td style="width: 20%; color: #000000">Kriteria <?=$nomor?></td>
									<td style="width: 100%" class="float-right">
										<div class="input-group">
											<input type="text" name="kriteria[]" class="form-control" value="<?=$value->kriteria?>" readonly>
											<?php
											$ket = '';
											if($value->kriteria == "umur"){
												if($value->keterangan == "benefit"){
													$ket = "Tua";
												}else if($value->keterangan == "cost"){
													$ket = "Muda";
												}
											}else if($value->kriteria == "jenis_kelamin"){
												if($value->keterangan == "benefit"){
													$ket = "Pria";
												}else if($value->keterangan == "cost"){
													$ket = "Wanita";
												}
											}else if($value->kriteria == "tinggi"){
												if($value->keterangan == "benefit"){
													$ket = "Tinggi";
												}else if($value->keterangan == "cost"){
													$ket = "Pendek";
												}
											}else if($value->kriteria == "pendidikan_terakhir"){
												if($value->keterangan == "benefit"){
													$ket = "Tinggi";
												}else if($value->keterangan == "cost"){
													$ket = "Rendah";
												}
											}else if($value->kriteria == "sertifikat"){
												if($value->keterangan == "benefit"){
													$ket = "Bersertifikat";
												}else if($value->keterangan == "cost"){
													$ket = "Tidak Ada";
												}
											}else if($value->kriteria == "pengalaman"){
												if($value->keterangan == "benefit"){
													$ket = "Lama";
												}else if($value->keterangan == "cost"){
													$ket = "Baru";
												}
											}else if($value->kriteria == "hijab"){
												if($value->keterangan == "benefit"){
													$ket = "Berhijab";
												}else if($value->keterangan == "cost"){
													$ket = "Tidak Berhijab";
												}
											}else if($value->kriteria == "menikah"){
												if($value->keterangan == "benefit"){
													$ket = "Sudah Menikah";
												}else if($value->keterangan == "cost"){
													$ket = "Belum Menikah";
												}
											}
											?>
											<input type="hidden" name="keterangan[]" value="<?=$value->keterangan?>" readonly>
											<input type="text" class="form-control" value="<?=$ket?>" readonly>
										</div>
									</td>
								</tr>
							<?php
								$nomor++;
							}
							?>
							<tr>
								<td style="width: 20%; color: #000000"></td>
								<td style="width: 100%" class="float-left" align="right">
									<?php if($this->session->userdata('hak_akses') == 'hrd' && $data->status != 'penempatan'){
									?>
										<button class="btn btn-primary" type="submit" name="submit" value="disetujui"><i class="fas fa-check"></i> Setujui</button>
										<button class="btn btn-danger" type="submit" name="submit" value="ditolak"><i class="fas fa-times"></i> Tolak</button>
									<?php	
									}

									if($data->status == 'disetujui'){
									?>
										<button class="btn btn-warning" type="submit" name="submit" value="cari_pegawai"><i class="fas fa-search"></i> Cari Pegawai</button>
									<?php
									}
									?>
									<!-- <a href="<?=base_url('kontrak')?>" class="btn btn-warning" role="button"><i class="fas fa-arrow-left"></i> Kembali</a> -->
								</td>
							</tr>
						</table>
					</form>
					<form method="post" action="<?=base_url('kontrak/penempatan')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<input type="hidden" name="id" value="<?=$data->id?>">
						<?php if(isset($rekomendasi)){
						?>
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;"><b>Rekomendasi Pegawai</b></h6>
							</div>
							<table class="table">
								<tr>
									<th>No</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Alamat</th>
									<?php foreach ($kriteria1 as $value) {
									?>
									<th><?=$value['kriteria']?></th>
									<?php
									}
									?>
						        </tr>
								<?php
								$nomor = 1;
								$array = 0;
								
								foreach ($rekomendasi->result_array() as $rekomen) {
								?>
									<tr>
										<input type="hidden" name="nik[]" value="<?=$rekomen['nik']?>">
										<td><?=$nomor?></td>
										<td><?=$rekomen['nik']?></td>
										<td><?=$rekomen['nama']?></td>
										<td><?=$rekomen['alamat']?></td>
										<?php for($i = 0; $i < count($kriteria1); $i++){
											if($kriteria1[$i]['kriteria'] == 'pendidikan_terakhir'){
												if($rekomen[$kriteria1[$i]['kriteria']] == '1'){
													echo "<td>SMP Sederajat</td>";
												}else if($rekomen[$kriteria1[$i]['kriteria']] == '2'){
													echo "<td>SMA Sederajat</td>";
												}else if($rekomen[$kriteria1[$i]['kriteria']] == '3'){
													echo "<td>Diploma 1</td>";
												}else if($rekomen[$kriteria1[$i]['kriteria']] == '4'){
													echo "<td>Diploma 2</td>";
												}else if($rekomen[$kriteria1[$i]['kriteria']] == '5'){
													echo "<td>Diploma 3</td>";
												}else if($rekomen[$kriteria1[$i]['kriteria']] == '6'){
													echo "<td>Diploma 4</td>";
												}else if($rekomen[$kriteria1[$i]['kriteria']] == '7'){
													echo "<td>Srata 1</td>";
												}
											}else if($kriteria1[$i]['kriteria'] == 'jenis_kelamin'){
												if($rekomen[$kriteria1[$i]['kriteria']] == '1'){
													echo "<td>Pria</td>";
												}else if($rekomen[$kriteria1[$i]['kriteria']] == '0'){
													echo "<td>Wanita</td>";
												}
											}else{
											?>
												<td><?=$rekomen[$kriteria1[$i]['kriteria']]?></td>
											<?php
											}
										}
										?>
									</tr>
								<?php
									$array++;
									$nomor++;
								}
								?>
							</table>
							<div class="tile-footer" align="right">
								<button class="btn btn-success" type="submit" name="submit" value="1"><i class="fas fa-check"></i> Tempatkan Pegawai</button>
				            </div>
							
						<?php	
						}else if(isset($penempatan)){
						?>
							<div class="card-header py-3">
							  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;"><b>Pegawai Yang Bertugas</b></h6>
							</div>
							<table class="table">
								<tr>
									<th>No</th>
									<th>NIK</th>
									<th>Nama</th>
									<th>Alamat</th>
									<th>Telp</th>
									<th>Email</th>
						        </tr>
								<?php
								$nomor = 1;
								
								foreach ($penempatan->result() as $penem) {
								?>
									<tr>
										<td><?=$nomor?></td>
										<td><?=$penem->nik?></td>
										<td><?=$penem->nama?></td>
										<td><?=$penem->alamat?></td>
										<td><?=$penem->telp?></td>
										<td><?=$penem->email?></td>
									</tr>
								<?php
									$nomor++;
								}
								?>
							</table>							
						<?php
						}
						?>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>
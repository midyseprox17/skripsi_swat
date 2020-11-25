<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-5">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Detail Kontrak <?=$data->klien?>(<?=$data->id?>) - <b>
				  	<?php
		          	if($data->status == '0'){
		          		echo 'DITOLAK';
		          	}else if($data->status == '1'){
		          		echo 'DITERIMA';
		          	}else{
		          		echo 'BELUM DIPROSES';
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
							foreach ($kriteria->result() as $value) {
							?>
								<tr>
									<td style="width: 20%; color: #000000">Kriteria <?=$nomor?></td>
									<td style="width: 100%" class="float-right">
										<div class="input-group">
											<input type="text" name="kriteria[]" class="form-control" value="<?=$value->kriteria?>" readonly>
											<input type="text" name="bobot[]" class="form-control" value="<?=$value->bobot?>" readonly>
											<input type="text" name="keterangan[]" class="form-control" value="<?=$value->keterangan?>" readonly>
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
									<?php if($this->session->userdata('hak_akses') == 'hrd'){
									?>
										<button class="btn btn-primary" type="submit" name="submit" value="1"><i class="fas fa-check"></i> Setujui</button>
										<button class="btn btn-danger" type="submit" name="submit" value="0"><i class="fas fa-times"></i> Tolak</button>
									<?php	
									}else if($this->session->userdata('hak_akses') == 'staff' && $data->status == '1'){
									?>
										<button class="btn btn-primary" type="submit" name="submit" value="cari_pegawai"><i class="fas fa-search"></i> Cari Pegawai</button>
									<?php
									}
									?>
									<a href="<?=base_url('kontrak')?>" class="btn btn-warning" role="button"><i class="fas fa-arrow-left"></i> Kembali</a>
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>
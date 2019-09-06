<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Ubah Data Pegawai</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url().'pegawai/ubah'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">
							<input type="hidden" name="id" value="<?=$pegawai->id?>">
							<tr>
								<td style="width: 20%; color: #000000">NIP</td>
								<td style="width: 100%" class="float-left">
									<input type="number" class="form-control" placeholder="NIP" name="nip" id="nip" style="width: 50%" required="" value="<?=$pegawai->nip?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" style="width: 50%" required="" value="<?=$pegawai->nama?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pangkat</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Pangkat" name="pangkat" id="pangkat" style="width: 50%" required="" value="<?=$pegawai->pangkat?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Golongan</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Golongan" name="golongan" id="golongan" style="width: 50%" required="" value="<?=$pegawai->golongan?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jabatan</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="jabatan" style="width: 50%" required="" value="<?=$pegawai->jabatan?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Status</td>
								<td style="width: 100%" class="float-left">
									<select name="ans" class="form-control" style="width: 50%">
										<option value="1" <?=$pegawai->ans == '1' ? 'selected' : ''?>>ANS</option>
										<option value="0" <?=$pegawai->ans == '0' ? 'selected' : ''?>>Non ANS</option>
									</select>
								</td>
							</tr>
						</table>
						<div class="tile-footer">
			            	<button class="btn btn-primary" type="submit" name="submit" value="1">Ubah Data</button>
			            </div>
					</form>
				</div>
			</div>
		</div>		
	</div>
</div>

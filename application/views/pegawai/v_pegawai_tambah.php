<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Surat Perintah</h6>
				</div>
				<div class="card-body">
					<form name="tambah_pegawai" id="tambah_pegawai" method="post" action="<?=base_url().'sp/tambah'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">
							<tr>
								<td style="width: 20%; color: #000000">NIP</td>
								<td style="width: 50%" class="float-left">
									<input type="number" class="form-control" placeholder="NIP" name="nip" id="nip" min="1" max="31">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td style="width: 50%" class="float-left">
									<input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" max="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Pangkat</td>
								<td style="width: 50%" class="float-left">
									<input type="text" class="form-control" placeholder="Pangkat" name="pangkat" id="pangkat">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Golongan</td>
								<td style="width: 50%" class="float-left">
									<input type="text" class="form-control" placeholder="Golongan" name="golongan" id="golongan">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jabatan</td>
								<td style="width: 50%" class="float-left">
									<input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="jabatan">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jabatan</td>
								<td style="width: 50%" class="float-left">
									<input type="text" class="form-control" placeholder="Jabatan" name="jabatan" id="jabatan">
								</td>
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

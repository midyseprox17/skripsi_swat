<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Klien</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url('klien/ubah')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<input type="hidden" name="id" value="<?=$data->id?>">
						<table class="table" style="width: 100%">
							<tr>
								<td style="width: 20%; color: #000000">Nama Perusahaan</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Nama Perusahaan" name="nama" required="" value="<?=$data->nama?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Telp</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Telepon" name="telp" required="" value="<?=$data->telp?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Alamat</td>
								<td style="width: 100%" class="float-left">
									<textarea name="alamat" class="form-control" placeholder="Alamat Perusahaan" required="" value="<?=$data->alamat?>"></textarea>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Penanggung Jawab</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Nama Penanggung Jawab" name="penanggung_jawab" required="" value="<?=$data->penanggung_jawab?>">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Email</td>
								<td style="width: 100%" class="float-left">
									<input type="email" class="form-control" placeholder="Email Penanggung Jawab" name="email_penanggung_jawab" required="" value="<?=$data->email_penanggung_jawab?>">
								</td>
							</tr>
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

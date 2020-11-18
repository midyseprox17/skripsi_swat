<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah User</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url('user/tambah')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table" style="width: 100%">
							<tr>
								<td style="width: 20%; color: #000000">Username</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Username" name="username" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Hak Akses</td>
								<td style="width: 100%" class="float-left">
									<select name="hak_akses" class="form-control">
										<option value="hrd">Manager HRD</option>
										<option value="staff">Staff HRD</option>
									</select>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000"></td>
								<td style="width: 100%" class="float-left" align="right">
									<button class="btn btn-primary" type="submit" name="submit" value="1">Tambah Data</button>
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

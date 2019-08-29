<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Tambah Data Penomoran</h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url().'penomoran/tambah'?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">
							<tr>
								<td style="width: 20%; color: #000000">Kode</td>
								<td style="width: 100%" class="float-left">
									<input class="form-control" placeholder="Kode" name="kode" id="kode" style="width: 50%" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Nama</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" style="width: 50%" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Ket/Singkatan</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="Ket" name="ket" id="ket" style="width: 50%" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Jenis</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="suket/sp/nota" name="jenis" id="jenis" style="width: 50%" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Format</td>
								<td style="width: 100%" class="float-left">
									<input type="text" class="form-control" placeholder="{kode}/{nomor}/{ket}/PK WIL IV BDG" name="format" id="format" style="width: 50%" required="">
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

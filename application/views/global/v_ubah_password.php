<div class="container">
	<div class="row justify-content-center">
		<div class="col-xl-8">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary" style="color: #15406a;">Ubah Password</h6>
				  <h6><font color="red"><?=isset($_SESSION['pesan'])? $_SESSION['pesan'] : '';?></font></h6>
				  <h6><font color="red" id="warning"> </font></h6>
				</div>
				<div class="card-body">
					<form method="post" action="<?=base_url('swat/ubah_password')?>">
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table" style="width: 100%">
							<tr>
								<td style="width: 20%; color: #000000">Password Lama</td>
								<td style="width: 100%" class="float-left">
									<input type="password" class="form-control" placeholder="Password" name="password_lama" required="">
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Password Baru</td>
								<td style="width: 100%" class="float-left">
									<input type="password" class="form-control" placeholder="Password Baru" name="password_baru" id="password_baru" required="" onchange='check_pass();'>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000">Konfirmasi Password</td>
								<td style="width: 100%" class="float-left">
									<input type="password" class="form-control" placeholder="Ketik Ulang Password Baru" name="password_baru2" id="password_baru2" required="" onchange='check_pass();'>
								</td>
							</tr>
							<tr>
								<td style="width: 20%; color: #000000"></td>
								<td style="width: 100%" class="float-left" align="right">
									<button class="btn btn-primary" type="submit" name="submit" id="submit" value="1">Ubah Password</button>
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

<script type="text/javascript">
    function check_pass() {
      if (document.getElementById('password_baru').value == document.getElementById('password_baru2').value) {
          document.getElementById('submit').disabled = false;
          document.getElementById('warning').innerHTML = " ";
      } else {
          document.getElementById('submit').disabled = true;
          document.getElementById('warning').innerHTML = "Password Tidak Sama";
      }
    }

  </script>
<head>
	<link href="<?=base_url().'assets/'?>vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<div class="container">
	<div class="row">
		<div class="col-xl-12">
			<div class="card shadow mb-4">
				<div class="card-header py-3">
				  <h6 class="m-0 font-weight-bold text-primary">Tambah Data Surat Perintah</h6>
				</div>
				<div class="card-body">
					<form>
						<input type="hidden" name="<?=$this->security->get_csrf_token_name();?>" value="<?=$this->security->get_csrf_hash();?>" style="display: none">
						<table class="table">	
							<tr>
								<td style="width: 20%">Jumlah Nomor SP</td>
								<td>
									<div class="float-left" style="width: 30%">
								      <select class="custom-select form-control form-control-sm">
									    <option value="1">1</option>
									    <option value="2">2</option>
									    <option value="3">3</option>
									  </select>
								    </div>
								</td>
							</tr>
							<tr>
								<td>Nomor Surat</td>
								<td><input class="form-control float-left" type="text" name="telp" style="width: 30%"></td>
							</tr>
							<tr>
								<td>Tanggal Surat</td>
								<td>
									<div class="col-sm-10">
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
								          <label class="form-check-label" for="gridRadios1">
								            Tanggal Sekarang
								          </label>
								        </div>
								        <div class="form-check">
								          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
								          <label class="form-check-label" for="gridRadios2">
								            Pilih tanggal
								          </label>
								        </div>
								        <div class="form-group row mt-2">
								        	<div class="col-sm-2">
								        		<input type="text" class="form-control" placeholder="Tanggal">
								        	</div>
								        	<div class="col-sm-2">
								        		<input type="text" class="form-control" placeholder="Bulan">
								        	</div>
								        	<div class="col-sm-2">
								        		<input type="text" class="form-control" placeholder="Tahun">
								        	</div>
								        </div>
								    </div>
					    		</td>
							</tr>
						</table>
						<table class="table" id="tbl_transaksi">
							<tr id="tbl_transaksi1">
								<td>Laundry</td>
								<td><select class="form-control" name="id_jenis[]" id="id_jenis1" onchange="get_harga_jenis('1')">
										<?php foreach ($jenis->result() as $j) {
										?>
											<option value="<?php echo $j->id; ?>"><?php echo $j->nama; ?></option>
										<?php
										}
										?>
									</select></td>
								<td><input class="form-control" type="text" name="harga_jenis[]" id="harga_jenis1" readOnly></td>
								<td><input class="form-control" type="number" name="qty[]"></td>
								<td><button type="button" class="btn btn-success" id="tambah_jenis" onclick="tambah_baris()"><i class="fa fa-plus"></i></button></td>
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
<script type="text/javascript">
	function delete_row(rowno)
	{
		$('#tbl_transaksi'+rowno).remove();
	}

	function get_harga_jenis(no){
		var id = $('#id_jenis'+no).val();
		$.ajax({
			url : "<?php echo base_url().'jenis/get_harga_jenis'; ?>",
			method : "POST",
			data : {id: id},
            dataType : 'json',
            success: function(data){
            	$('#harga_jenis'+no).val(data[0]['harga']+"/"+data[0]['satuan']);
            }
		})
	}

    function tambah_baris(){
    	$rowno=$("#tbl_transaksi tr").length;
    	$rowno = $rowno + 1;
        $.ajax({
            url : "<?php echo base_url().'jenis/get_jenis'; ?>",
            method : "POST",
            dataType : 'json',
            success: function(data){
                var html = '<tr id="tbl_transaksi'+$rowno+'"><td></td><td><select class="form-control" name="id_jenis[]" id="id_jenis'+$rowno+'" onchange="get_harga_jenis('+$rowno+')">';
                var i;
                for(i=0; i<data.length; i++){
                    html += '<option value="'+data[i]['id']+'">'+data[i]['nama']+'</option>';
                }
                html += '</select></td><td><input class="form-control" type="text" name="harga_jenis[]" id="harga_jenis'+$rowno+'" readOnly></td><td><input class="form-control" type="number" name="qty[]"></td><td><button class="btn btn-danger" onclick=delete_row('+$rowno+')><i class="fa fa-minus"></i></button></td></tr>';
                $("#tbl_transaksi tr:last").after(html); 
            }
        });
    }
</script>
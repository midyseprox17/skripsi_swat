<div class="col-md-12">
	<div class="tile">
		<form action="<?php echo base_url().'transaksi/tambah'; ?>" method="post">
			<table class="table">	
				<tr>
					<td>Nama</td>
					<td><input class="form-control" type="text" name="nama"></td>
				</tr>
				<tr>
					<td>Telp</td>
					<td><input class="form-control" type="text" name="telp"></td>
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
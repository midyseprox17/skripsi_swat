<div class="container">
	<div class="row">
		<div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                	<select class="custom-select form-control" id="select_chart1" onchange="ubah_bulan(this)">
					    <option value="1">Januari</option>
					    <option value="2">Februari</option>
					    <option value="3">Maret</option>
					    <option value="4">April</option>
					    <option value="5">Mei</option>
					    <option value="6">Juni</option>
					    <option value="7">Juli</option>
					    <option value="8">Agustus</option>
					    <option value="9">September</option>
					    <option value="10">Oktober</option>
					    <option value="11">November</option>
					    <option value="12">Desember</option>
					</select>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<div class="chart-pie pt-4">
                		<canvas id="chart1"></canvas>
                  	</div>
                  	<hr>
                  	<code id="code_chart1">Total Pelanggaran = 0</code>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                	<select class="custom-select form-control" id="select_chart2" onchange="ubah_bulan(this)">
					    <option value="1">Januari</option>
					    <option value="2">Februari</option>
					    <option value="3">Maret</option>
					    <option value="4">April</option>
					    <option value="5">Mei</option>
					    <option value="6">Juni</option>
					    <option value="7">Juli</option>
					    <option value="8">Agustus</option>
					    <option value="9">September</option>
					    <option value="10">Oktober</option>
					    <option value="11">November</option>
					    <option value="12">Desember</option>
					</select>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<div class="chart-pie pt-4">
                		<canvas id="chart2"></canvas>
                  	</div>
                  	<hr>
                  	<code id="code_chart2">Total Pelanggaran = 0</code>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3">
                	<select class="custom-select form-control" id="select_chart3" onchange="ubah_bulan(this)">
					    <option value="1">Januari</option>
					    <option value="2">Februari</option>
					    <option value="3">Maret</option>
					    <option value="4">April</option>
					    <option value="5">Mei</option>
					    <option value="6">Juni</option>
					    <option value="7">Juli</option>
					    <option value="8">Agustus</option>
					    <option value="9">September</option>
					    <option value="10">Oktober</option>
					    <option value="11">November</option>
					    <option value="12">Desember</option>
					</select>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                	<div class="chart-pie pt-4">
                		<canvas id="chart3"></canvas>
                  	</div>
                  	<hr>
                  	<code id="code_chart3">Total Pelanggaran = 0</code>
                </div>
            </div>
        </div>
	</div>
</div>


<!-- Page level plugins -->
<script src="<?=base_url().'assets/'?>vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="<?=base_url().'assets/'?>js/demo/chart-area-demo.js"></script>
<script src="<?=base_url().'assets/'?>js/demo/chart-pie-demo.js"></script>
<script src="<?=base_url().'assets/'?>js/demo/chart-bar-demo.js"></script>

<script>
	function set_pie(id){
		$.ajax({
			url: "<?=base_url().'sk/get_pelanggaran'?>",
			data: {
				bulan: $("#select_"+id).val()
			},
			method: "POST",
			dataType: "json",
			success: function(data){
				var array_nama = [];
				var array_warna = [];
				var array_total = [];
				var total = 0;

				for(var i = 0; i < data.length; i++){
					array_nama.push(data[i]['nama']);
					array_warna.push(data[i]['warna']);
					array_total.push(Number(data[i]['total']));
					total += Number(data[i]['total']);
				}

				$("#code_"+id).text("Total Pelanggaran = " + total);
				var ctx = document.getElementById(id);
				var myPieChart = new Chart(ctx, {
				  type: 'doughnut',
				  data: {
				    labels: array_nama,
				    datasets: [{
				      data: array_total,
				      backgroundColor: array_warna,
				      hoverBorderColor: "rgba(234, 236, 244, 1)",
				    }],
				  },
				  options: {
				    maintainAspectRatio: false,
				    tooltips: {
				      backgroundColor: "rgb(255,255,255)",
				      bodyFontColor: "#858796",
				      borderColor: '#dddfeb',
				      borderWidth: 1,
				      xPadding: 15,
				      yPadding: 15,
				      displayColors: false,
				      caretPadding: 10,
				    },
				    legend: {
				      display: false
				    },
				    cutoutPercentage: 80,
				  },
				});
			}
		});
	}

	$(document).ready(function(){
		var d = new Date();

		$("#select_chart1").val(d.getMonth()-1);
		$("#select_chart2").val(d.getMonth());
		$("#select_chart3").val(d.getMonth()+1);

		set_pie("chart1");
		set_pie("chart2");
		set_pie("chart3");
	});

	function ubah_bulan(element){
		var select_id = element.id;
		select_id = select_id.replace("select_", "");
		set_pie(select_id);
	}
</script>
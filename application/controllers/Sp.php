<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sp extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_sp');
	}

	public function index(){
		if($this->session->userdata('masuk') == '1'){
			$where['dihapus'] = '0';
			$data['sp'] = $this->m_uptd->tampil_where('v_sp', $where);

			$this->load->view('global/v_sidebar');
			$this->load->view('sp/v_sp', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah(){
		if($this->session->userdata('masuk') == '1'){
			
			if(isset($_POST['submit'])){
				$this->m_sp->lock_tbl_sp();

				$status_tanggal = $_POST['status_tanggal'];
				$jumlah_sp = $_POST['jumlah_sp'];
				$pegawai = $_POST['pegawai']; //array
				$tanggal_sp = $_POST['tanggal_sp']; //array
				$tujuan = $_POST['tujuan']; //array
				$hal = $_POST['hal'];
				$keterangan = $_POST['keterangan'];
				$tgl_terakhir = '';

				$hasil = $this->m_sp->id_terakhir()->row();
				$tgl_terakhir = $hasil->tahun.'-'.$hasil->bulan.'-'.$hasil->tanggal;


				for($i = 1; $i <= $jumlah_sp; $i++){
					$tgl_d = date('d');
					$tgl_m = date('m');
					$tgl_y = date('Y');
					$nomor = 0;

					if($status_tanggal == "sekarang" && $i == 1){
						$hasil = $this->m_uptd->tampil('v_sp_last_nomor')->row();
						if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
							$nomor = $hasil->nomor+6;
						}else{
							$nomor = $hasil->nomor+1;
						}
						
					}else if($status_tanggal == "sekarang" && $i != 1){
						$hasil = $this->m_uptd->tampil('v_sp_last_nomor')->row();
						$nomor = $hasil->nomor+1;
					}else if($status_tanggal == "pilih"){
						$tgl_d = $_POST['tgl_d'];
						$tgl_m = $_POST['tgl_m'];
						$tgl_y = $_POST['tgl_y'];

						$data['nomor_list'] = $this->m_sp->nomor_cari($tgl_d, $tgl_m, $tgl_y);
						if($data['nomor_list']->num_rows() > 0){
							$data['nomor_minmax'] = $this->m_sp->nomor_minmax($tgl_d, $tgl_m, $tgl_y)->row();
							$nomor_min = $data['nomor_minmax']->nomor_min;
							$nomor_max = $data['nomor_minmax']->nomor_max;

							$nomor_max = $nomor_max + $jumlah_sp;

							for($no = $nomor_min; $no <= $nomor_max; $no++){
								$data = $this->m_uptd->tampil_where('tbl_sp', array('nomor'=>$no))->row();
								if($data == NULL){
									$nomor = $no;
									break;
								}
							}

							if($nomor == 0){
								$hasil = $this->m_uptd->tampil('v_sp_last_nomor')->row();
								if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
									$nomor = $hasil->nomor+6;
								}else{
									$nomor = $hasil->nomor+1;
								}
								
							}
						}else{
							$hasil = $this->m_uptd->tampil('v_sp_last_nomor')->row();
							if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
								$nomor = $hasil->nomor+6;
							}else{
								$nomor = $hasil->nomor+1;
							}
							
						}
						
					}

					//SCRIPT INPUT
					$data = [
						'nomor' => $nomor,
						'tanggal' => $tgl_d,
						'bulan' => $tgl_m,
						'tahun' => $tgl_y,
						'tanggal_sp' => date('Y-m-d', strtotime($tanggal_sp[$i-1])),
						'tujuan' => $tujuan[$i-1],
						'hal' => $hal,
						'ket' => $keterangan,
						'dihapus' => '0'
					];
					$sp_terakhir = $this->m_uptd->tambah('tbl_sp', $data);

					for($peg = 0; $peg < count($pegawai); $peg++){
						$data_pegawai = [
							'sp_id' => $sp_terakhir,
							'pegawai_id' => $pegawai[$peg]
						];
						$this->m_uptd->tambah('tbl_sp_pegawai', $data_pegawai);
					}
				}

				$this->m_sp->unlock_tbl_sp();

				redirect(base_url().'sp');

			}else{
				$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));

				$this->load->view('global/v_sidebar');
				$this->load->view('sp/v_sp_tambah', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah_bernomor(){
		if($this->session->userdata('masuk') == '1'){
			
			if(isset($_POST['submit'])){
				$nomor_awal = $_POST['nomor_awal'];
				$nomor_akhir = $_POST['nomor_akhir'];
				$tgl_d = $_POST['tgl_d'];
				$tgl_m = $_POST['tgl_m'];
				$tgl_y = $_POST['tgl_y'];
				$pegawai = $_POST['pegawai']; //array
				$tanggal_sp = $_POST['tanggal_sp']; //array
				$tujuan = $_POST['tujuan']; //array
				$hal = $_POST['hal'];
				$keterangan = $_POST['keterangan'];

				$total = $nomor_akhir - $nomor_awal + 1;
				if($total < 1){
					$total = 1;
				}

				for($i = 0; $i < $total; $i++){
					$data = [
						'nomor' => $nomor_awal+$i,
						'tanggal' => $tgl_d,
						'bulan' => $tgl_m,
						'tahun' => $tgl_y,
						'tanggal_sp' => date('Y-m-d', strtotime($tanggal_sp[$i])),
						'tujuan' => $tujuan[$i],
						'hal' => $hal,
						'ket' => $keterangan,
						'dihapus' => '0'
					];
					$sp_terakhir = $this->m_uptd->tambah('tbl_sp', $data);

					for($peg = 0; $peg < count($pegawai); $peg++){
						$data_pegawai = [
							'sp_id' => $sp_terakhir,
							'pegawai_id' => $pegawai[$peg]
						];
						$this->m_uptd->tambah('tbl_sp_pegawai', $data_pegawai);
					}
				}
				redirect(base_url().'sp');

			}else{
				$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));

				$this->load->view('global/v_sidebar');
				$this->load->view('sp/v_sp_tambah_bernomor', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}


	public function hapus(){
		if($this->session->userdata('masuk') == 1){
			$where['id'] = $this->uri->segment(3);
			$data = [
				'nomor' => NULL,
				'dihapus' => '1'
			];

			$this->m_uptd->ubah('tbl_sp', $data, $where);
			redirect(base_url().'sp');
		}else{
			redirect(base_url().'login');
		}
	}
}
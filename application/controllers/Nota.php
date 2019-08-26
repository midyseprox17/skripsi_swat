<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class nota extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_nota');
	}

	public function index(){
		if($this->session->userdata('masuk') == '1'){
			$where['dihapus'] = '0';
			$data['nota'] = $this->m_uptd->tampil_where('v_nota', $where);

			$this->load->view('global/v_sidebar');
			$this->load->view('nota/v_nota', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah(){
		if($this->session->userdata('masuk') == '1'){
			
			if(isset($_POST['submit'])){
				$this->m_nota->lock_tbl_nota();

				$penomoran_id = $_POST['penomoran_id'];
				$status_tanggal = $_POST['status_tanggal'];
				$jumlah_nota = $_POST['jumlah_nota'];
				$hal = $_POST['hal'];
				$isi = $_POST['isi'];
				$catatan = $_POST['catatan'];
				$kepada = $_POST['kepada']; //array
				$pegawai = $_POST['pegawai']; //array
				
				$tgl_terakhir = '';
				$data_warning['hasil'] = array();

				$hasil = $this->m_nota->id_terakhir()->row();
				$tgl_terakhir = $hasil->tahun.'-'.$hasil->bulan.'-'.$hasil->tanggal;


				for($i = 1; $i <= $jumlah_nota; $i++){
					$tgl_d = date('d');
					$tgl_m = date('m');
					$tgl_y = date('Y');
					$nomor = 0;

					if($status_tanggal == "sekarang" && $i == 1){
						$hasil = $this->m_nota->id_terakhir()->row();
						if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
							$nomor = $hasil->nomor+6;
						}else{
							$nomor = $hasil->nomor+1;
						}
						
					}else if($status_tanggal == "sekarang" && $i != 1){
						$hasil = $this->m_nota->id_terakhir()->row();
						$nomor = $hasil->nomor+1;
					}else if($status_tanggal == "pilih"){
						$tgl_d = $_POST['tgl_d'];
						$tgl_m = $_POST['tgl_m'];
						$tgl_y = $_POST['tgl_y'];

						$data['nomor_list'] = $this->m_nota->nomor_cari($tgl_d, $tgl_m, $tgl_y);
						if($data['nomor_list']->num_rows() > 0){
							$data['nomor_minmax'] = $this->m_nota->nomor_minmax($tgl_d, $tgl_m, $tgl_y)->row();
							$nomor_min = $data['nomor_minmax']->nomor_min;
							$nomor_max = $data['nomor_minmax']->nomor_max;

							$nomor_max = $nomor_max + $jumlah_nota;

							for($no = $nomor_min; $no <= $nomor_max; $no++){
								$data = $this->m_uptd->tampil_where('tbl_nota', array('nomor'=>$no))->row();
								if($data == NULL){
									$nomor = $no;
									break;
								}
							}

							if($nomor == 0){
								$hasil = $this->m_nota->id_terakhir()->row();
								if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
									$nomor = $hasil->nomor+6;
								}else{
									$nomor = $hasil->nomor+1;
								}
								
							}
						}else{
							$hasil = $this->m_nota->id_terakhir()->row();
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
						'hal' => $hal,
						'isi' => $isi,
						'kepada' => $kepada[$i-1],
						'catatan' => $catatan,
						'penomoran_id' => $penomoran_id,
						'dihapus' => '0',
						'penomoran_id' => $penomoran_id,
						'ditambah_oleh' => $this->session->userdata('pegawai_id'),
						'tgl_tambah' => date("Y-m-d H:i:s")
					];
					$nota_terakhir = $this->m_uptd->tambah('tbl_nota', $data);

					for($peg = 0; $peg < count($pegawai); $peg++){
						$data_pegawai = [
							'nota_id' => $nota_terakhir,
							'pegawai_id' => $pegawai[$peg],
							'ditambah_oleh' => $this->session->userdata('pegawai_id'),
							'tgl_tambah' => date("Y-m-d H:i:s")
						];
						$this->m_uptd->tambah('tbl_nota_pengolah', $data_pegawai);
					}

					array_push($data_warning['hasil'], array('nomor' => $nomor, 'tanggal' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun']));
				}

				$this->m_nota->unlock_tbl_nota();

				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));
				$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('nama' => 'Kendali', 'dihapus' => '0'));

				$this->load->view('global/v_sidebar');
				$this->load->view('nota/v_nota_tambah', $data);
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
						'dihapus' => '0',
						'ditambah_oleh' => $this->session->userdata('pegawai_id'),
						'tgl_tambah' => date("Y-m-d H:i:s")
					];
					$nota_terakhir = $this->m_uptd->tambah('tbl_sp', $data);

					for($peg = 0; $peg < count($pegawai); $peg++){
						$data_pegawai = [
							'sp_id' => $nota_terakhir,
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
				'dihapus' => '1',
				'diedit_oleh' => $this->session->userdata('pegawai_id'),
				'tgl_edit' => date("Y-m-d H:i:s")
			];

			$this->m_uptd->ubah('tbl_sp', $data, $where);
			redirect(base_url().'sp');
		}else{
			redirect(base_url().'login');
		}
	}
}
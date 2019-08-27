<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sm extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_sm');
	}

	public function index(){
		if($this->session->userdata('masuk') == '1'){
			$where['dihapus'] = '0';
			$data['sm'] = $this->m_uptd->tampil_where('v_sm', $where);

			$this->load->view('global/v_sidebar');
			$this->load->view('sm/v_sm', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah(){
		if($this->session->userdata('masuk') == '1'){
			
			if($this->input->post('submit') != NULL){
				$this->m_sm->lock_tbl_sm();

				$penomoran_id = $this->input->post('penomoran_id');
				$status_tanggal = $this->input->post('status_tanggal');
				$jumlah_sm = $this->input->post('jumlah_sm');
				$hal = $this->input->post('hal');
				$isi = $this->input->post('isi');
				$catatan = $this->input->post('catatan');
				$kepada = $this->input->post('kepada'); //array
				$pegawai = $this->input->post('pegawai'); //array
				
				$tgl_terakhir = '';
				$data_warning['hasil'] = array();

				$hasil = $this->m_sm->id_terakhir()->row();
				$tgl_terakhir = $hasil->tahun.'-'.$hasil->bulan.'-'.$hasil->tanggal;


				for($i = 1; $i <= $jumlah_sm; $i++){
					$tgl_d = date('d');
					$tgl_m = date('m');
					$tgl_y = date('Y');
					$nomor = 0;

					if($status_tanggal == "sekarang" && $i == 1){
						$hasil = $this->m_sm->id_terakhir()->row();
						if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
							$nomor = $hasil->nomor+6;
						}else{
							$nomor = $hasil->nomor+1;
						}
						
					}else if($status_tanggal == "sekarang" && $i != 1){
						$hasil = $this->m_sm->id_terakhir()->row();
						$nomor = $hasil->nomor+1;
					}else if($status_tanggal == "pilih"){
						$tgl_d = $this->input->post('tgl_d');
						$tgl_m = $this->input->post('tgl_m');
						$tgl_y = $this->input->post('tgl_y');

						$data['nomor_list'] = $this->m_sm->nomor_cari($tgl_d, $tgl_m, $tgl_y);
						if($data['nomor_list']->num_rows() > 0){
							$data['nomor_minmax'] = $this->m_sm->nomor_minmax($tgl_d, $tgl_m, $tgl_y)->row();
							$nomor_min = $data['nomor_minmax']->nomor_min;
							$nomor_max = $data['nomor_minmax']->nomor_max;

							$nomor_max = $nomor_max + $jumlah_sm;

							for($no = $nomor_min; $no <= $nomor_max; $no++){
								$data = $this->m_uptd->tampil_where('tbl_sm', array('nomor'=>$no))->row();
								if($data == NULL){
									$nomor = $no;
									break;
								}
							}

							if($nomor == 0){
								$hasil = $this->m_sm->id_terakhir()->row();
								if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
									$nomor = $hasil->nomor+6;
								}else{
									$nomor = $hasil->nomor+1;
								}
								
							}
						}else{
							$hasil = $this->m_sm->id_terakhir()->row();
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
					$sm_terakhir = $this->m_uptd->tambah('tbl_sm', $data);

					for($peg = 0; $peg < count($pegawai); $peg++){
						$data_pegawai = [
							'sm_id' => $sm_terakhir,
							'pegawai_id' => $pegawai[$peg],
							'ditambah_oleh' => $this->session->userdata('pegawai_id'),
							'tgl_tambah' => date("Y-m-d H:i:s")
						];
						$this->m_uptd->tambah('tbl_sm_pengolah', $data_pegawai);
					}

					array_push($data_warning['hasil'], array('nomor' => $nomor, 'tanggal' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun']));
				}

				$this->m_sm->unlock_tbl_sm();

				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));
				$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('nama' => 'Kendali', 'dihapus' => '0'));

				$this->load->view('global/v_sidebar');
				$this->load->view('sm/v_sm_tambah', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah_bernomor(){
		if($this->session->userdata('masuk') == '1'){
			
			if($this->input->post('submit') != NULL){
				$penomoran_id = $this->input->post('penomoran_id');
				$nomor_awal = $this->input->post('nomor_awal');
				$nomor_akhir = $this->input->post('nomor_akhir');
				$tgl_d = $this->input->post('tgl_d');
				$tgl_m = $this->input->post('tgl_m');
				$tgl_y = $this->input->post('tgl_y');
				$hal = $this->input->post('hal');
				$isi = $this->input->post('isi');
				$catatan = $this->input->post('catatan');
				$kepada = $this->input->post('kepada'); //array
				$pegawai = $this->input->post('pegawai'); //array
				
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
						'hal' => $hal,
						'isi' => $isi,
						'kepada' => $kepada[$i],
						'catatan' => $catatan,
						'penomoran_id' => $penomoran_id,
						'dihapus' => '0',
						'ditambah_oleh' => $this->session->userdata('pegawai_id'),
						'tgl_tambah' => date("Y-m-d H:i:s")
					];
					$sm_terakhir = $this->m_uptd->tambah('tbl_sm', $data);

					for($peg = 0; $peg < count($pegawai); $peg++){
						$data_pegawai = [
							'sm_id' => $sm_terakhir,
							'pegawai_id' => $pegawai[$peg],
							'ditambah_oleh' => $this->session->userdata('pegawai_id'),
							'tgl_tambah' => date("Y-m-d H:i:s")
						];
						$this->m_uptd->tambah('tbl_sm_pengolah', $data_pegawai);
					}
				}
				redirect(base_url().'sm');

			}else{
				$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));
				$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('nama' => 'Kendali', 'dihapus' => '0'));

				$this->load->view('global/v_sidebar');
				$this->load->view('sm/v_sm_tambah_bernomor', $data);
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

			$this->m_uptd->ubah('tbl_sm', $data, $where);
			redirect(base_url().'sm');
		}else{
			redirect(base_url().'login');
		}
	}
}
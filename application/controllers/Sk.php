<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sk extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_sk');
	}

	public function index(){
		if($this->session->userdata('masuk') == '1'){
			$where = [
				'tahun' => date('Y'),
				'dihapus' => '0'
			];
			$data['sk'] = $this->m_uptd->tampil_where('v_sk', $where);

			$this->load->view('global/v_sidebar');
			$this->load->view('sk/v_sk', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah(){
		if($this->session->userdata('masuk') == '1'){
			
			if($this->input->post('submit') != NULL){
				$this->m_sk->lock_tbl_sk();

				$penomoran_id = $this->input->post('penomoran_id');
				$hal = $this->input->post('hal');
				$isi = $this->input->post('isi');
				$catatan = $this->input->post('catatan');
				$kepada = $this->input->post('kepada'); //array
				$pegawai = $this->input->post('pegawai'); //array
				
				$tgl_terakhir = '';
				$data_warning['header'] = array("Nomor", "Tanggal", "Kepada");
				$data_warning['hasil'] = array();

				$hasil = $this->m_sk->id_terakhir(date('Y'))->row();
				if($hasil != NULL){
					$tgl_terakhir = $hasil->tahun.'-'.$hasil->bulan.'-'.$hasil->tanggal;
				}

				for($i = 1; $i <= count($kepada); $i++){
					$tgl_d = date('d');
					$tgl_m = date('m');
					$tgl_y = date('Y');
					$nomor = 0;

					if($i == 1){
						$hasil = $this->m_sk->id_terakhir(date('Y'))->row();
						if(strtotime($tgl_terakhir) < strtotime(date("Y-m-d"))){
							$nomor = $hasil->nomor+6;
						}else{
							$nomor = $hasil->nomor+1;
						}
						
					}else if($i != 1){
						$hasil = $this->m_sk->id_terakhir(date('Y'))->row();
						$nomor = $hasil->nomor+1;
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
					if((strpos(strtolower($data['hal']), 'nota pemeriksaan') !== false) && !(strpos(strtolower($data['hal']), 'balasan') !== false)){

						$data['sp_id'] = $this->input->post('sp_id');
					}

					$sk_terakhir = $this->m_uptd->tambah('tbl_sk', $data);

					if((strpos(strtolower($data['hal']), 'nota pemeriksaan') !== false) && !(strpos(strtolower($data['hal']), 'balasan') !== false)){

						$pelanggaran = $this->input->post('pelanggaran'); // array

						for($pel = 0; $pel < count($pelanggaran); $pel++){
							$data_pelanggaran = [
								'sk_id' => $sk_terakhir,
								'jenis_pelanggaran_id' => $pelanggaran[$pel]
							];
							$this->m_uptd->tambah('tbl_sk_pemeriksaan', $data_pelanggaran);
						}
					}

					for($peg = 0; $peg < count($pegawai); $peg++){
						$data_pegawai = [
							'sk_id' => $sk_terakhir,
							'pegawai_id' => $pegawai[$peg],
							'ditambah_oleh' => $this->session->userdata('pegawai_id'),
							'tgl_tambah' => date("Y-m-d H:i:s")
						];
						$this->m_uptd->tambah('tbl_sk_pengolah', $data_pegawai);
					}

					array_push($data_warning['hasil'], array('ket1' => $nomor, 'ket2' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun'], 'ket3' => $data['kepada']));
				}

				$this->m_sk->unlock_tbl_sk();

				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));
				$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('jenis' => 'nota', 'dihapus' => '0'));
				$data['grup_hal'] = $this->m_sk->grup_hal();
				$data['grup_kepada'] = $this->m_sk->grup_kepada();

				$this->load->view('global/v_sidebar');
				$this->load->view('sk/v_sk_tambah', $data);
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

				$data_warning['header'] = array("Nomor", "Tanggal", "Kepada");
				$data_warning['hasil'] = array();
				
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

					if((strpos(strtolower($data['hal']), 'nota pemeriksaan') !== false) && !(strpos(strtolower($data['hal']), 'balasan') !== false)){

						$data['sp_id'] = $this->input->post('sp_id');
					}

					$where = [
						'nomor' => $data['nomor'],
						'tahun' => $data['tahun']
					];
					$hasil = $this->m_uptd->tampil_where('tbl_sk', $where)->row();
					if($hasil == NULL){
						$sk_terakhir = $this->m_uptd->tambah('tbl_sk', $data);

						if((strpos(strtolower($data['hal']), 'nota pemeriksaan') !== false) && !(strpos(strtolower($data['hal']), 'balasan') !== false)){

							$pelanggaran = $this->input->post('pelanggaran'); // array

							for($pel = 0; $pel < count($pelanggaran); $pel++){
								$data_pelanggaran = [
									'sk_id' => $sk_terakhir,
									'jenis_pelanggaran_id' => $pelanggaran[$pel]
								];
								$this->m_uptd->tambah('tbl_sk_pemeriksaan', $data_pelanggaran);
							}
						}

						for($peg = 0; $peg < count($pegawai); $peg++){
							$data_pegawai = [
								'sk_id' => $sk_terakhir,
								'pegawai_id' => $pegawai[$peg],
								'ditambah_oleh' => $this->session->userdata('pegawai_id'),
								'tgl_tambah' => date("Y-m-d H:i:s")
							];
							$this->m_uptd->tambah('tbl_sk_pengolah', $data_pegawai);
						}	

						array_push($data_warning['hasil'], array('ket1' => $data['nomor'], 'ket2' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun'], 'ket3' => $data['kepada']));
					}else{
						array_push($data_warning['hasil'], array('ket1' => $data['nomor'], 'ket2' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun'], 'ket3' => 'NOMOR SUDAH DIPAKAI'));
					}
				}
				
				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));
				$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('jenis' => 'nota', 'dihapus' => '0'));
				$data['grup_hal'] = $this->m_sk->grup_hal();
				$data['grup_kepada'] = $this->m_sk->grup_kepada();

				$this->load->view('global/v_sidebar');
				$this->load->view('sk/v_sk_tambah_bernomor', $data);
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

			$this->m_uptd->ubah('tbl_sk', $data, $where);
			redirect(base_url().'sk');
		}else{
			redirect(base_url().'login');
		}
	}

	function diagram()
	{
		if($this->session->userdata('masuk') == '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('sk/v_sk_diagram');
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	function get_pelanggaran(){
		if($this->session->userdata('masuk') == '1'){
			$bulan = $this->input->post('bulan');
			$tahun = date('Y');
			$jenis_pelanggaran = $this->m_uptd->chart_pelanggaran($bulan,$tahun)->result();
			echo json_encode($jenis_pelanggaran);

		}else{
			redirect(base_url().'login');
		}
	}
}
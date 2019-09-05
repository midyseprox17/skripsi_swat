<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class suket extends CI_Controller
{
	public function __construct(){
		parent::__construct();
		$this->load->model('m_suket');
	}

	public function index(){
		if($this->session->userdata('masuk') == '1'){
			$penomoran_id = $this->uri->segment(2);
			$where = [];

			if($penomoran_id == NULL){
				$where = [
					'tahun' => date('Y'),
					'dihapus' => '0'
				];
			}else if($penomoran_id != 'all'){
				$where = [
					'tahun' => date('Y'),
					'penomoran_id' => $penomoran_id,
					'dihapus' => '0'
				];
			}else if($penomoran_id == 'all'){
				$where = [
					'tahun' => date('Y'),
					'dihapus' => '0'
				];
			}

			$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', ['jenis' => 'suket']);
			$data['suket'] = $this->m_uptd->tampil_where('v_suket', $where);

			$this->load->view('global/v_sidebar');
			$this->load->view('suket/v_suket', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah(){
		if($this->session->userdata('masuk') == '1'){
			
			if($this->input->post('submit') != NULL){
				$this->m_suket->lock_tbl_suket();

				$penomoran_id = $this->input->post('penomoran_id');
				$jumlah_suket = $this->input->post('jumlah_suket');
				$status_tanggal = $this->input->post('status_tanggal');
				$kepada = $this->input->post('kepada');
				$hal = $this->input->post('hal');
				$datab = $this->input->post('datab'); //array
				$alamat = $this->input->post('alamat');
				$kota_id = $this->input->post('kota_id');
				$ket = $this->input->post('ket');

				$data_warning['header'] = array("Nomor", "Tanggal", "Data B");
				$data_warning['hasil'] = array();

				for($i = 0; $i < $jumlah_suket; $i++){
					$tgl_d = date('d');
					$tgl_m = date('m');
					$tgl_y = date('Y');
					$nomor = 0;

					if($status_tanggal == "pilih"){
						$tgl_d = $this->input->post('tgl_d');
						$tgl_m = $this->input->post('tgl_m');
						$tgl_y = $this->input->post('tgl_y');
					}

					$hasil = $this->m_suket->id_terakhir($penomoran_id, date('Y'))->row();
					if($hasil == NULL){
						$nomor = 1;
					}else {
						$nomor = $hasil->nomor + 1;
					}

					//SCRIPT INPUT
					$data = [
						'nomor' => $nomor,
						'tanggal' => $tgl_d,
						'bulan' => $tgl_m,
						'tahun' => $tgl_y,
						'kepada' => $kepada,
						'hal' => $hal,
						'datab' => $datab[$i],
						'alamat' => $alamat,
						'kota_id' => $kota_id,
						'ket' => $ket,
						'penomoran_id' => $penomoran_id,
						'dihapus' => '0',
						'ditambah_oleh' => $this->session->userdata('pegawai_id'),
						'tgl_tambah' => date("Y-m-d H:i:s")
					];
					$suket_terakhir = $this->m_uptd->tambah('tbl_suket', $data);

					array_push($data_warning['hasil'], array('ket1' => $data['nomor'], 'ket2' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun'], 'ket3' => $data['datab']));
				}

				$this->m_suket->unlock_tbl_suket();

				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('jenis' => 'suket', 'dihapus' => '0'));
				$data['kota'] = $this->m_uptd->tampil('tbl_kota');
				$data['grup_hal'] = $this->m_suket->grup_hal();
				$data['grup_kepada'] = $this->m_suket->grup_kepada();

				$this->load->view('global/v_sidebar');
				$this->load->view('suket/v_suket_tambah', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah_bernomor(){
		if($this->session->userdata('masuk') == '1'){
			
			if($this->input->post('submit') != NULL){
				$this->m_suket->lock_tbl_suket();

				$penomoran_id = $this->input->post('penomoran_id');
				$nomor_awal = $this->input->post('nomor_awal');
				$nomor_akhir = $this->input->post('nomor_akhir');
				$tgl_d = $this->input->post('tgl_d');
				$tgl_m = $this->input->post('tgl_m');
				$tgl_y = $this->input->post('tgl_y');
				$kepada = $this->input->post('kepada');
				$hal = $this->input->post('hal');
				$datab = $this->input->post('datab'); //array
				$alamat = $this->input->post('alamat');
				$kota_id = $this->input->post('kota_id');
				$ket = $this->input->post('ket');

				$data_warning['header'] = array("Nomor", "Tanggal", "Data B");
				$data_warning['hasil'] = array();

				$total = $nomor_akhir - $nomor_awal + 1;
				if($total < 1){
					$total = 1;
				}
				

				for($i = 0; $i < $total; $i++){
					
					//SCRIPT INPUT
					$data = [
						'nomor' => $nomor_awal+$i,
						'tanggal' => $tgl_d,
						'bulan' => $tgl_m,
						'tahun' => $tgl_y,
						'kepada' => $kepada,
						'hal' => $hal,
						'datab' => $datab[$i],
						'alamat' => $alamat,
						'kota_id' => $kota_id,
						'ket' => $ket,
						'penomoran_id' => $penomoran_id,
						'dihapus' => '0',
						'ditambah_oleh' => $this->session->userdata('pegawai_id'),
						'tgl_tambah' => date("Y-m-d H:i:s")
					];

					$where = [
						'nomor' => $data['nomor'],
						'tahun' => $data['tahun'],
						'penomoran_id' => $data['penomoran_id']
					];
					$hasil = $this->m_uptd->tampil_where('tbl_suket', $where)->row();
					if($hasil == NULL){
						$this->m_uptd->tambah('tbl_suket', $data);

						array_push($data_warning['hasil'], array('ket1' => $data['nomor'], 'ket2' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun'], 'ket3' => $data['datab']));
					}else{
						array_push($data_warning['hasil'], array('ket1' => $data['nomor'], 'ket2' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun'], 'ket3' => 'NOMOR SUDHA DIPAKAI'));
					}
				}

				$this->m_suket->unlock_tbl_suket();

				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('jenis' => 'suket', 'dihapus' => '0'));
				$data['kota'] = $this->m_uptd->tampil('tbl_kota');
				$data['grup_hal'] = $this->m_suket->grup_hal();
				$data['grup_kepada'] = $this->m_suket->grup_kepada();
				
				$this->load->view('global/v_sidebar');
				$this->load->view('suket/v_suket_tambah_bernomor', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}


	public function hapus(){
		if($this->session->userdata('masuk') == 1){
			$where = [
				'penomoran_id' => $this->uri->segment(3),
				'id' => $this->uri->segment(4)
			];
			$data = [
				'nomor' => NULL,
				'dihapus' => '1',
				'diedit_oleh' => $this->session->userdata('pegawai_id'),
				'tgl_edit' => date("Y-m-d H:i:s")
			];

			// var_dump($where);
			$this->m_uptd->ubah('tbl_suket', $data, $where);
			redirect(base_url().'suket');
		}else{
			redirect(base_url().'login');
		}
	}
}
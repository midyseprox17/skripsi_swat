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
			$data['sm'] = $this->m_uptd->tampil_where('tbl_sm', $where);

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

				$status_tanggal = $this->input->post('status_tanggal');
				$hal = $this->input->post('hal');
				$isi = $this->input->post('isi');
				$dari = $this->input->post('dari');
				$nomor_surat = $this->input->post('nomor_surat');
				$catatan = $this->input->post('catatan');

				$data_warning['hasil'] = array();

				$hasil = $this->m_sm->id_terakhir()->row();
				$nomor = $hasil->nomor + 1;

				$tgl_d = date('d');
				$tgl_m = date('m');
				$tgl_y = date('Y');

				if($status_tanggal != "sekarang"){
					$tgl_d = $this->input->post('tgl_d');
					$tgl_m = $this->input->post('tgl_m');
					$tgl_y = $this->input->post('tgl_y');
				}

				$data = [
					'nomor' => $nomor,
					'tanggal' => $tgl_d,
					'bulan' => $tgl_m,
					'tahun' => $tgl_y,
					'hal' => $hal,
					'isi' => $isi,
					'dari' => $dari,
					'nomor_surat' => $nomor_surat,
					'catatan' => $catatan,
					'penomoran_id' => '12',
					'dihapus' => '0',
					'ditambah_oleh' => $this->session->userdata('pegawai_id'),
					'tgl_tambah' => date("Y-m-d H:i:s")
				];

				$this->m_uptd->tambah('tbl_sm', $data);

				array_push($data_warning['hasil'], array('nomor' => $nomor, 'tanggal' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun']));

				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('sm/v_sm_tambah');
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah_bernomor(){
		if($this->session->userdata('masuk') == '1'){
			
			if($this->input->post('submit') != NULL){
				$this->m_sm->lock_tbl_sm();

				$nomor = $this->input->post('nomor');
				$status_tanggal = $this->input->post('status_tanggal');
				$hal = $this->input->post('hal');
				$isi = $this->input->post('isi');
				$dari = $this->input->post('dari');
				$nomor_surat = $this->input->post('nomor_surat');
				$catatan = $this->input->post('catatan');

				$data_warning['hasil'] = array();

				$tgl_d = date('d');
				$tgl_m = date('m');
				$tgl_y = date('Y');

				if($status_tanggal != "sekarang"){
					$tgl_d = $this->input->post('tgl_d');
					$tgl_m = $this->input->post('tgl_m');
					$tgl_y = $this->input->post('tgl_y');
				}

				
				$data = [
					'nomor' => $nomor,
					'tanggal' => $tgl_d,
					'bulan' => $tgl_m,
					'tahun' => $tgl_y,
					'hal' => $hal,
					'isi' => $isi,
					'dari' => $dari,
					'nomor_surat' => $nomor_surat,
					'catatan' => $catatan,
					'penomoran_id' => '12',
					'dihapus' => '0',
					'ditambah_oleh' => $this->session->userdata('pegawai_id'),
					'tgl_tambah' => date("Y-m-d H:i:s")
				];

				if($this->input->post('arsip_tgl_d') != NULL && $this->input->post('arsip_tgl_m') != NULL){
					$data['tgl_diarsipkan'] = $this->input->post('arsip_tgl_y').'-'.$this->input->post('arsip_tgl_m').'-'.$this->input->post('arsip_tgl_d');
				}

				if($this->input->post('terus_tgl_d') != NULL && $this->input->post('terus_tgl_m') != NULL){
					$data['tgl_diteruskan'] = $this->input->post('terus_tgl_y').'-'.$this->input->post('terus_tgl_m').'-'.$this->input->post('terus_tgl_d');
				}

				$this->m_uptd->tambah('tbl_sm', $data);

				array_push($data_warning['hasil'], array('nomor' => $nomor, 'tanggal' => $data['tanggal'].'-'.$data['bulan'].'-'.$data['tahun']));

				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_warning', $data_warning);
				$this->load->view('global/v_footer');

			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('sm/v_sm_tambah_bernomor');
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

	public function arsipkan(){
		if($this->session->userdata('masuk') == 1){
			$where['id'] = $this->uri->segment(3);
			$data = [
				'tgl_diarsipkan' => date("Y-m-d"),
				'diedit_oleh' => $this->session->userdata('pegawai_id'),
				'tgl_edit' => date("Y-m-d H:i:s")
			];

			$this->m_uptd->ubah('tbl_sm', $data, $where);
			redirect(base_url().'sm');
		}else{
			redirect(base_url().'login');
		}
	}

	public function teruskan(){
		if($this->session->userdata('masuk') == 1){
			$where['id'] = $this->uri->segment(3);
			$data = [
				'tgl_diteruskan' => date("Y-m-d"),
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
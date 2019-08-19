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
			$data['sp'] = $this->m_uptd->tampil('v_sp');

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
				$status_tanggal = $_POST['status_tanggal'];
				$tgl_d = "";
				$tgl_m = "";
				$tgl_y = "";
				$nomor = 0;

				if($status_tanggal == "sekarang"){
					$tgl_d = date('d');
					$tgl_m = date('m');
					$tgl_y = date('Y');

					$hasil = $this->m_uptd->tampil('v_sp_last_nomor')->row();
					$nomor = $hasil->nomor+3;

				}else{
					$tgl_d = $_POST['tgl_d'];
					$tgl_m = $_POST['tgl_m'];
					$tgl_y = $_POST['tgl_y'];

					$data['nomor_list'] = $this->m_sp->nomor_cari($tgl_d, $tgl_m, $tgl_y);
					$data['nomor_minmax'] = $this->m_sp->nomor_minmax($tgl_d, $tgl_m, $tgl_y)->row();

					

				}

				

			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('sp/v_sp_tambah');
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}
}
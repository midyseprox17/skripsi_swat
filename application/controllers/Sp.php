<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class sp extends CI_Controller
{
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

				if($status_tanggal == "sekarang"){
					$tgl_d = date('d');
					$tgl_m = date('m');
					$tgl_y = date('Y');
				}else{
					$tgl_d = $_POST['tgl_d'];
					$tgl_m = $_POST['tgl_m'];
					$tgl_y = $_POST['tgl_y'];
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
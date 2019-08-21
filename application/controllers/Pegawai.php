<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller
{
	public function index(){
		if($this->session->userdata('masuk') == '1'){
			$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));

			$this->load->view('global/v_sidebar');
			$this->load->view('pegawai/v_pegawai', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	public function list_pegawai(){
		if($this->session->userdata('masuk') == '1'){
			$hasil = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'))->result();
			echo json_encode($hasil);
		}else{
			redirect(base_url().'login');
		}
	}

	public function hapus(){
		if($this->session->userdata('masuk') == 1){
			$where['id'] = $this->uri->segment(3);
			$data['dihapus'] = '1';

			$this->m_uptd->ubah('tbl_pegawai', $data, $where);
			redirect(base_url().'pegawai');
		}else{
			redirect(base_url().'login');
		}
	}
}
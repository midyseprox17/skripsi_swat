<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uptd extends CI_Controller
{
	function index()
	{
		if($this->session->userdata('masuk') == '1'){
			$where = [
				'dihapus' => '0',
				'tahun' => date('Y')
			];
			$data['pegawai_total'] = $this->m_uptd->tampil_where('tbl_pegawai', ['dihapus' => '0'])->num_rows();
			$data['sp_total'] = $this->m_uptd->tampil_where('tbl_sp', $where)->num_rows();
			$data['suket_total'] = $this->m_uptd->tampil_where('tbl_suket', $where)->num_rows();
			$data['sk_total'] = $this->m_uptd->tampil_where('tbl_sk', $where)->num_rows();

			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_content', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	function login(){
		if($this->input->post('submit') != NULL){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if(!$this->auth->login($username,$password)){
				$this->session->set_flashdata('pesan', 'Login Gagal. Pastikan Username/Password Benar');
				$this->load->view('global/v_login');
			}else{
				redirect(base_url());
			}
			
		}else{
			$this->session->set_flashdata('pesan', '');
			$this->load->view('global/v_login');
		}
	}

	function logout(){
		$this->auth->logout();
		redirect(base_url().'login');
	}
}
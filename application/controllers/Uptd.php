<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uptd extends CI_Controller
{
	function index()
	{
		if($this->session->userdata('masuk') == '1'){
			$data['pegawai_total'] = $this->m_uptd->tampil_where('tbl_pegawai', ['dihapus'=>'0'])->num_rows();
			$data['sp_total'] = $this->m_uptd->tampil('tbl_sp')->num_rows();
			$data['sk_total'] = $this->m_uptd->tampil_where('tbl_sk', ['dihapus' => '0'])->num_rows();

			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_content', $data);
			// $this->load->view('global/v_warning');
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
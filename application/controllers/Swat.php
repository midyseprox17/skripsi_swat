<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class swat extends CI_Controller
{
	function index()
	{
		if($this->session->userdata('masuk') == '1'){
			$where = [
				'dihapus' => '0',
				'tahun' => date('Y')
			];
			$data['total_security'] = $this->m_swat->tampil_where('tbl_pegawai', ['id_devisi' => '1', 'dihapus' => '0'])->num_rows();
			$data['total_cleaningservice'] = $this->m_swat->tampil_where('tbl_pegawai', ['id_devisi' => '2', 'dihapus' => '0'])->num_rows();
			$data['total_parkir'] = $this->m_swat->tampil_where('tbl_pegawai', ['id_devisi' => '3', 'dihapus' => '0'])->num_rows();
			$data['total_backoffice'] = $this->m_swat->tampil_where('tbl_pegawai', ['id_devisi' => '4', 'dihapus' => '0'])->num_rows();

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

	function data_login(){
		if($this->input->post('submit') != NULL){
			$data = [
				'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'nama' => $this->input->post('nama'),
				'pertanyaan1' => $this->input->post('pertanyaan1'),
				'jawaban1' => $this->input->post('jawaban1'),
				'pertanyaan2' => $this->input->post('pertanyaan2'),
				'jawaban2' => $this->input->post('jawaban2')1
			];
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
}
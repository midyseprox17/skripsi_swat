<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller
{
	public function index(){
		if($this->session->userdata('hak_akses') == 'adm'){
			$where = [
				'hak_akses <>' => $this->session->userdata('hak_akses'),
				'dihapus' => '0'
			];
			$data['data'] = $this->m_swat->tampil_where('tbl_user', $where);

			$this->load->view('global/v_sidebar');
			$this->load->view('user/v_user', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url('login'));
		}
	}

	public function tambah(){
		if($this->session->userdata('hak_akses') == 'adm'){
			if($this->input->post('submit') != NULL){
				$data = [
					'username' => $this->input->post('username'),
					'password' => password_hash($this->input->post('username'), PASSWORD_DEFAULT),
					'nama' => $this->input->post('nama'),
					'hak_akses' => $this->input->post('hak_akses'),
					'dihapus' => '0'
				];

				$this->m_swat->tambah('tbl_user', $data);

				echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".base_url('user')."'; </script>";
				
			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('user/v_user_tambah');
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}

	public function hapus(){
		if($this->session->userdata('hak_akses') == 'adm'){
			$where['username'] = $this->uri->segment(3);
			$data = [
				'dihapus' => '1'
			];	

			$this->m_swat->ubah('tbl_user', $data, $where);

			redirect(base_url('user'));
		}else{
			redirect(base_url('login'));
		}
	}
}
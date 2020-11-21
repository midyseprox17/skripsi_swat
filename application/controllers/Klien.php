<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class klien extends CI_Controller
{
	public function index(){
		if($this->session->userdata('hak_akses') == 'staff'){
			$where = [
				'dihapus' => '0'
			];
			$data['data'] = $this->m_swat->tampil_where('tbl_klien', $where);

			$this->load->view('global/v_sidebar');
			$this->load->view('klien/v_klien', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url('login'));
		}
	}

	public function tambah(){
		if($this->session->userdata('hak_akses') == 'staff'){
			if($this->input->post('submit') != NULL){
				$data = [
					'nama' => $this->input->post('nama'),
					'telp' => $this->input->post('telp'),
					'alamat' => $this->input->post('alamat'),
					'penanggung_jawab' => $this->input->post('penanggung_jawab'),
					'email_penanggung_jawab' => $this->input->post('email_penanggung_jawab'),
					'dihapus' => '0'
				];

				$this->m_swat->tambah('tbl_klien', $data);

				echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".base_url('klien')."'; </script>";
				
			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('klien/v_klien_tambah');
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}

	public function hapus(){
		if($this->session->userdata('hak_akses') == 'staff'){
			$where['id'] = $this->uri->segment(3);
			$data = [
				'dihapus' => '1'
			];	

			$this->m_swat->ubah('tbl_klien', $data, $where);

			redirect(base_url('klien'));
		}else{
			redirect(base_url('login'));
		}
	}

	public function ubah(){
		if($this->session->userdata('hak_akses') == 'staff'){
			if($this->input->post('submit') != NULL){
				$data = [
					'nama' => $this->input->post('nama'),
					'telp' => $this->input->post('telp'),
					'alamat' => $this->input->post('alamat'),
					'penanggung_jawab' => $this->input->post('penanggung_jawab'),
					'email_penanggung_jawab' => $this->input->post('email_penanggung_jawab'),
					'dihapus' => '0'
				];
				$where['id'] = $this->input->post('id');

				$this->m_swat->ubah('tbl_klien', $data, $where);

				echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".base_url('klien')."'; </script>";
				
			}else{
				$data['data'] = $this->m_swat->tampil_where('tbl_klien', ['id' => $this->uri->segment(3)])->row();

				$this->load->view('global/v_sidebar');
				$this->load->view('klien/v_klien_ubah', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}
}
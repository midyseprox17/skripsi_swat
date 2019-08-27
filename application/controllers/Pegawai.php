<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller
{
	public function index(){
		if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') == '1'){

			$data['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'));

			$this->load->view('global/v_sidebar');
			$this->load->view('pegawai/v_pegawai', $data);
			$this->load->view('global/v_footer');
		}else if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') != '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_404');
			$this->load->view('global/v_footer');

		}else{
			redirect(base_url().'login');
		}
	}

	public function list_pegawai(){
		if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') == '1'){
			$hasil = $this->m_uptd->tampil_where('tbl_pegawai', array('dihapus' => '0'))->result();
			echo json_encode($hasil);
		}else if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') != '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_404');
			$this->load->view('global/v_footer');

		}else{
			redirect(base_url().'login');
		}
	}

	public function hapus(){
		if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') == '1'){
			$where['id'] = $this->uri->segment(3);
			$data = [
				'dihapus' => '1',
				'diedit_oleh' => $this->session->userdata('pegawai_id'),
				'tgl_edit' => date("Y-m-d H:i:s")
			];	

			$this->m_uptd->ubah('tbl_pegawai', $data, $where);
			redirect(base_url().'pegawai');
		}else if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') != '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_404');
			$this->load->view('global/v_footer');

		}else{
			redirect(base_url().'login');
		}
	}

	public function tambah(){
		if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') == '1'){
			if($this->input->post('submit') != NULL){
				$data = [
					'nip' => $this->input->post('nip'),
					'nama' => $this->input->post('nama'),
					'pangkat' => $this->input->post('pangkat'),
					'golongan' => $this->input->post('golongan'),
					'jabatan' => $this->input->post('jabatan'),
					'dihapus' => '0',
					'ditambah_oleh' => $this->session->userdata('pegawai_id'),
					'tgl_tambah' => date("Y-m-d H:i:s")
				];
				
				$insert_id = $this->m_uptd->tambah('tbl_pegawai', $data);

				$data_login = [
					'pegawai_id' => $insert_id,
					'username' => $this->input->post('nip'),
					'password' => password_hash($this->input->post('nip'), PASSWORD_DEFAULT),
					'id_hak_akses' => '1',
					'dihapus' => '0',
					'ditambah_oleh' => $this->session->userdata('pegawai_id'),
					'tgl_tambah' => date("Y-m-d H:i:s")
				];

				$this->m_uptd->tambah('tbl_user', $data_login);

				redirect(base_url().'pegawai');
			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('pegawai/v_pegawai_tambah');
				$this->load->view('global/v_footer');
			}
		}else if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') != '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_404');
			$this->load->view('global/v_footer');

		}else{
			redirect(base_url().'login');
		}
	}


	public function ubah(){
		if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') == '1'){
			if($this->input->post('submit') != NULL){
				$where = [
					'id' => $this->input->post('id')
				];

				$data = [
					'nip' => $this->input->post('nip'),
					'nama' => $this->input->post('nama'),
					'pangkat' => $this->input->post('pangkat'),
					'golongan' => $this->input->post('golongan'),
					'jabatan' => $this->input->post('jabatan'),
					'diedit_oleh' => $this->session->userdata('pegawai_id'),
					'tgl_edit' => date("Y-m-d H:i:s")
				];
				
				$this->m_uptd->ubah('tbl_pegawai', $data, $where);

				redirect(base_url().'pegawai');
			}else{
				$where['id'] = $this->uri->segment(3);
				$hasil['pegawai'] = $this->m_uptd->tampil_where('tbl_pegawai', $where)->row();

				$this->load->view('global/v_sidebar');
				$this->load->view('pegawai/v_pegawai_ubah', $hasil);
				$this->load->view('global/v_footer');
			}
		}else if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') != '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_404');
			$this->load->view('global/v_footer');

		}else{
			redirect(base_url().'login');
		}
	}
}
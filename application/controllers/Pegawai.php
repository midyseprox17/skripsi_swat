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

	public function tambah(){
		if($this->session->userdata('masuk') == 1){
			if(isset($_POST['submit'])){
				$data = [
					'nip' => $_POST['nip'],
					'nama' => $_POST['nama'],
					'pangkat' => $_POST['pangkat'],
					'golongan' => $_POST['golongan'],
					'jabatan' => $_POST['jabatan'],
					'dihapus' => '0'
				];
				
				$insert_id = $this->m_uptd->tambah('tbl_pegawai', $data);

				$data_login = [
					'pegawai_id' => $insert_id,
					'username' => $_POST['nip'],
					'password' => password_hash($_POST['nip'], PASSWORD_DEFAULT),
					'id_hak_akses' => '1',
					'dihapus' => '0'
				];

				$this->m_uptd->tambah('tbl_user', $data_login);

				redirect(base_url().'pegawai');
			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('pegawai/v_pegawai_tambah');
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url().'login');
		}
	}


	public function ubah(){
		if($this->session->userdata('masuk') == 1){
			if(isset($_POST['submit'])){
				$where = [
					'id' => $_POST['id']
				];

				$data = [
					'nip' => $_POST['nip'],
					'nama' => $_POST['nama'],
					'pangkat' => $_POST['pangkat'],
					'golongan' => $_POST['golongan'],
					'jabatan' => $_POST['jabatan']
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
		}else{
			redirect(base_url().'login');
		}
	}
}
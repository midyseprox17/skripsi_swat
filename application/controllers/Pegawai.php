<?php
class pegawai extends CI_Controller{
	function index(){
		if($this->auth->is_login('pemilik')){
			$list_menu = $this->auth->get_menu();
			$hasil['pegawai'] = $this->m_laundry->tampil_where('tbl_user', ['dihapus'=>'0']);

			$this->load->view('global/header_login');
			$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
			$this->load->view('pegawai/pegawai_tampil', $hasil);
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function tambah(){
		if($this->auth->is_login('pemilik')){
			if(isset($_POST['submit'])){
				$data['id'] = $this->fungsi->next_id('tbl_user', ['hak_akses'=>'pegawai']);
				$data['noKtp'] = $_POST['noKtp'];
				$data['nama'] = $_POST['nama'];
				$data['alamat'] = $_POST['alamat'];
				$data['telp'] = $_POST['telp'];
				$data['jk'] = $_POST['jk'];
				$data['password'] = sha1($data['id']);
				$data['hak_akses'] = 'pegawai';
				$data['dihapus'] = '0';

				$this->m_laundry->tambah('tbl_user', $data);
				redirect(base_url().'pegawai');
			}else{
				$list_menu = $this->auth->get_menu();

				$this->load->view('global/header_login');
				$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
				$this->load->view('pegawai/pegawai_tambah');
			}
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function hapus(){
		if($this->auth->is_login('pemilik')){
			$this->m_laundry->ubah('tbl_user', ['dihapus'=>'1'], ['id'=>$this->uri->segment(3)]);
			redirect(base_url().'pegawai');
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function ubah(){
		if($this->auth->is_login('pemilik')){
			if(isset($_POST['submit'])){
				$data['id'] = $_POST['id'];
				$data['noKtp'] = $_POST['noKtp'];
				$data['nama'] = $_POST['nama'];
				$data['alamat'] = $_POST['alamat'];
				$data['telp'] = $_POST['telp'];
				$data['jk'] = $_POST['jk'];
				$data['hak_akses'] = 'pegawai';

				$this->m_laundry->ubah('tbl_user', $data, ['id'=>$data['id']]);
				redirect(base_url().'pegawai');
			}else{
				$list_menu = $this->auth->get_menu();
				$hasil['pegawai'] = $this->m_laundry->tampil_where('tbl_user', ['id'=>$this->uri->segment(3)]);

				$this->load->view('global/header_login');
				$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
				$this->load->view('pegawai/pegawai_ubah', $hasil);
			}
		}else{
			redirect(base_url().'laundry/login');
		}
	}
}
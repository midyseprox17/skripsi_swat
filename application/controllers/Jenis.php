<?php
class jenis extends CI_Controller{
	function index(){
		if($this->auth->is_login('pemilik')){
			$list_menu = $this->auth->get_menu();
			$hasil['jenis'] = $this->m_laundry->tampil('tbl_jenis');

			$this->load->view('global/header_login');
			$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
			$this->load->view('jenis/jenis_tampil', $hasil);
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function tambah(){
		if($this->auth->is_login('pemilik')){
			if(isset($_POST['submit'])){
				$data['id'] = $_POST['id'];
				$data['nama'] = $_POST['nama'];
				$data['satuan'] = $_POST['satuan'];
				$data['harga'] = $_POST['harga'];

				$this->m_laundry->tambah('tbl_jenis', $data);
				redirect(base_url().'jenis');
			}else{
				$list_menu = $this->auth->get_menu();

				$this->load->view('global/header_login');
				$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
				$this->load->view('jenis/jenis_tambah');
			}
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function hapus(){
		if($this->auth->is_login('pemilik')){
			$this->m_laundry->hapus('tbl_jenis', ['id'=>$this->uri->segment(3)]);
			redirect(base_url().'jenis');
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function get_jenis(){
		$hasil = $this->m_laundry->tampil('tbl_jenis')->result();
		echo json_encode($hasil);
	}

	function get_harga_jenis(){
		$id = $_POST['id'];
		$hasil = $this->m_laundry->tampil_where('tbl_jenis', ['id'=>$id])->result();
		echo json_encode($hasil);
	}
}
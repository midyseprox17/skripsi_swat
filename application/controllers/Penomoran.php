<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class penomoran extends CI_Controller
{
	public function index(){
		if($this->session->userdata('masuk') == '1' && $this->session->userdata('id_hak_akses') == '1'){

			$data['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', array('dihapus' => '0'));

			$this->load->view('global/v_sidebar');
			$this->load->view('penomoran/v_penomoran', $data);
			$this->load->view('global/v_footer');
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
			];;

			$this->m_uptd->ubah('tbl_penomoran', $data, $where);
			redirect(base_url().'penomoran');
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
			if(isset($_POST['submit'])){
				$data = [
					'kode' => $_POST['kode'],
					'nama' => $_POST['nama'],
					'ket' => $_POST['ket'],
					'format' => $_POST['format'],
					'dihapus' => '0',
					'ditambah_oleh' => $this->session->userdata('pegawai_id'),
					'tgl_tambah' => date("Y-m-d H:i:s")
				];
				
				$this->m_uptd->tambah('tbl_penomoran', $data);

				redirect(base_url().'penomoran');
			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('penomoran/v_penomoran_tambah');
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
			if(isset($_POST['submit'])){
				$where = [
					'id' => $_POST['id']
				];

				$data = [
					'kode' => $_POST['kode'],
					'nama' => $_POST['nama'],
					'ket' => $_POST['ket'],
					'format' => $_POST['format'],
					'diedit_oleh' => $this->session->userdata('pegawai_id'),
					'tgl_edit' => date("Y-m-d H:i:s")
				];
				
				$this->m_uptd->ubah('tbl_penomoran', $data, $where);

				redirect(base_url().'penomoran');
			}else{
				$where['id'] = $this->uri->segment(3);
				$hasil['penomoran'] = $this->m_uptd->tampil_where('tbl_penomoran', $where)->row();

				$this->load->view('global/v_sidebar');
				$this->load->view('penomoran/v_penomoran_ubah', $hasil);
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
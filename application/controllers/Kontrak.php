<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontrak extends CI_Controller
{
	public function index(){
		if($this->session->userdata('hak_akses') == 'staff'){
			$where = [
				'tbl_kontrak.dihapus' => '0'
			];
			$data['data'] = $this->m_swat->tampil_kontrak($where);

			$this->load->view('global/v_sidebar');
			$this->load->view('kontrak/v_kontrak', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url('login'));
		}
	}

	public function tambah(){
		if($this->session->userdata('hak_akses') == 'staff'){
			if($this->input->post('submit') != NULL){
				$data = [
					'klien_id' => $this->input->post('klien_id'),
					'devisi_id' => $this->input->post('devisi_id'),
					'jumlah_pegawai' => $this->input->post('jumlah_pegawai'),
					'lama_kontrak' => $this->input->post('lama_kontrak'),
					'tgl_mulai' => $this->input->post('tgl_mulai_tahun').'-'.$this->input->post('tgl_mulai_bulan').'-'.$this->input->post('tgl_mulai_tanggal'),
					'tgl_selesai' => date_format(date_add(date_create($this->input->post('tgl_mulai_tahun').'-'.$this->input->post('tgl_mulai_bulan').'-'.$this->input->post('tgl_mulai_tanggal')),date_interval_create_from_date_string($this->input->post('lama_kontrak').' months')),'Y-m-d'),
					'dihapus' => '0'
				];
				
				$this->m_swat->tambah('tbl_kontrak', $data);

				echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".base_url('kontrak')."'; </script>";
				
			}else{
				$data['klien'] = $this->m_swat->tampil_where('tbl_klien', ['dihapus' => '0']);

				$this->load->view('global/v_sidebar');
				$this->load->view('kontrak/v_kontrak_tambah', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}

	public function hapus(){
		if($this->session->userdata('hak_akses') == 'staff'){
			$where['id'] = $this->uri->segment(3);

			$this->m_swat->hapus('tbl_kontrak', $where);

			redirect(base_url('kontrak'));
		}else{
			redirect(base_url('login'));
		}
	}
}
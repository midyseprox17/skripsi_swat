<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller
{
	public function index(){
		if($this->session->userdata('hak_akses') == 'staff'){
			$where = [
				'dihapus' => '0'
			];
			$data['data'] = $this->m_swat->tampil_pegawai($where);

			$this->load->view('global/v_sidebar');
			$this->load->view('pegawai/v_pegawai', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url('login'));
		}
	}

	public function tambah(){
		if($this->session->userdata('hak_akses') == 'staff'){
			if($this->input->post('submit') != NULL){
				$data = [
					'nik' => $this->input->post('nik'),
					'nama' => $this->input->post('nama'),
					'no_kk' => $this->input->post('no_kk'),
					'no_bpjs_ketenagakerjaan' => $this->input->post('no_bpjs_ketenagakerjaan'),
					'no_bpjs_kesehatan' => $this->input->post('no_bpjs_kesehatan'),
					'kelas_bpjs' => $this->input->post('kelas_bpjs'),
					'no_npwp' => $this->input->post('no_npwp'),
					'alamat' => $this->input->post('alamat'),
					'telp' => $this->input->post('telp'),
					'email' => $this->input->post('email'),
					'bank' => $this->input->post('bank'),
					'no_rek' => $this->input->post('no_rek'),
					'tgl_masuk' => $this->input->post('tgl_masuk_tahun').'-'.$this->input->post('tgl_masuk_bulan').'-'.$this->input->post('tgl_masuk_tanggal'),
					'devisi_id' => $this->input->post('devisi_id'),
					'tgl_lahir' => $this->input->post('tgl_lahir_tahun').'-'.$this->input->post('tgl_lahir_bulan').'-'.$this->input->post('tgl_lahir_tanggal'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'tinggi' => $this->input->post('tinggi'),
					'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
					'sertifikat' => $this->input->post('sertifikat'),
					'pengalaman' => $this->input->post('pengalaman'),
					'hijab' => $this->input->post('hijab'),
					'menikah' => $this->input->post('menikah'),
					'dalam_kontrak' => '0',
					'dihapus' => '0'
				];

				$this->m_swat->tambah('tbl_pegawai', $data);

				echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".base_url('pegawai')."'; </script>";
				
			}else{
				$this->load->view('global/v_sidebar');
				$this->load->view('pegawai/v_pegawai_tambah');
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}

	public function hapus(){
		if($this->session->userdata('hak_akses') == 'staff'){
			$where['nik'] = $this->uri->segment(3);

			$this->m_swat->hapus('tbl_pegawai', $where);

			redirect(base_url('pegawai'));
		}else{
			redirect(base_url('login'));
		}
	}

	public function ubah(){
		if($this->session->userdata('hak_akses') == 'staff'){
			if($this->input->post('submit') != NULL){
				$data = [
					'devisi_id' => $this->input->post('devisi_id'),
					'nama' => $this->input->post('nama'),
					'no_kk' => $this->input->post('no_kk'),
					'no_bpjs_ketenagakerjaan' => $this->input->post('no_bpjs_ketenagakerjaan'),
					'no_bpjs_kesehatan' => $this->input->post('no_bpjs_kesehatan'),
					'kelas_bpjs' => $this->input->post('kelas_bpjs'),
					'no_npwp' => $this->input->post('no_npwp'),
					'alamat' => $this->input->post('alamat'),
					'telp' => $this->input->post('telp'),
					'email' => $this->input->post('email'),
					'bank' => $this->input->post('bank'),
					'no_rek' => $this->input->post('no_rek'),
					'tgl_masuk' => $this->input->post('tgl_masuk_tahun').'-'.$this->input->post('tgl_masuk_bulan').'-'.$this->input->post('tgl_masuk_tanggal'),
					'devisi_id' => $this->input->post('devisi_id'),
					'tgl_lahir' => $this->input->post('tgl_lahir_tahun').'-'.$this->input->post('tgl_lahir_bulan').'-'.$this->input->post('tgl_lahir_tanggal'),
					'jenis_kelamin' => $this->input->post('jenis_kelamin'),
					'tinggi' => $this->input->post('tinggi'),
					'pendidikan_terakhir' => $this->input->post('pendidikan_terakhir'),
					'sertifikat' => $this->input->post('sertifikat'),
					'pengalaman' => $this->input->post('pengalaman'),
					'hijab' => $this->input->post('hijab'),
					'menikah' => $this->input->post('menikah'),
					'dihapus' => '0'
				];

				$where = [
					'nik' => $this->input->post('nik')
				];

				$this->m_swat->ubah('tbl_pegawai', $data, $where);

				echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".base_url('pegawai')."'; </script>";
				
			}else{
				$where['nik'] = $this->uri->segment(3);
				$data['data'] = $this->m_swat->tampil_where('tbl_pegawai', $where)->row();

				$this->load->view('global/v_sidebar');
				$this->load->view('pegawai/v_pegawai_ubah', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}
}
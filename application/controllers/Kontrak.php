<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class kontrak extends CI_Controller
{
	public function index(){
		if($this->session->userdata('hak_akses') == 'staff' || $this->session->userdata('hak_akses') == 'hrd'){
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
		if($this->session->userdata('hak_akses') == 'staff' || $this->session->userdata('hak_akses') == 'hrd'){
			if($this->input->post('submit') != NULL){
				$data = [
					'klien_id' => $this->input->post('klien_id'),
					'devisi_id' => $this->input->post('devisi_id'),
					'jumlah_pegawai' => $this->input->post('jumlah_pegawai'),
					'lama_kontrak' => $this->input->post('lama_kontrak'),
					'tgl_mulai' => $this->input->post('tgl_mulai_tahun').'-'.$this->input->post('tgl_mulai_bulan').'-'.$this->input->post('tgl_mulai_tanggal'),
					'tgl_selesai' => date_format(date_add(date_create($this->input->post('tgl_mulai_tahun').'-'.$this->input->post('tgl_mulai_bulan').'-'.$this->input->post('tgl_mulai_tanggal')),date_interval_create_from_date_string($this->input->post('lama_kontrak').' months')),'Y-m-d'),
					'status' => '2',
					'dihapus' => '0'
				];
				
				$last_id = $this->m_swat->tambah('tbl_kontrak', $data);

				$kriterias = $this->input->post('kriteria');
				$kriteria_bobot = $this->input->post('kriteria_bobot');
				$keterangan = $this->input->post('keterangan');
				$i = 0;

				foreach($kriterias as $kriteria){
					$data = [
						'kontrak_id' => $last_id,
						'kriteria' => $kriteria,
						'bobot' => $kriteria_bobot[$i],
						'keterangan' => $keterangan[$i]
					];
					$this->m_swat->tambah('tbl_kontrak_kriteria', $data);

					$i++;
				}

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
		if($this->session->userdata('hak_akses') == 'staff' || $this->session->userdata('hak_akses') == 'hrd'){
			$where['id'] = $this->uri->segment(3);

			$this->m_swat->hapus('tbl_kontrak', $where);

			redirect(base_url('kontrak'));
		}else{
			redirect(base_url('login'));
		}
	}

	public function detail(){
		if($this->session->userdata('hak_akses') == 'staff' || $this->session->userdata('hak_akses') == 'hrd'){
			if($this->input->post('submit') != NULL){
				if($this->input->post('submit') == 'cari_pegawai'){

				}else{
					$data = [
					'status' => $this->input->post('submit')
					];
					$where = [
						'id' => $this->input->post('id')
					];
					$this->m_swat->ubah('tbl_kontrak', $data, $where);
					redirect(base_url('kontrak'));
				}
			}else{
				$where = [
					'tbl_kontrak.dihapus' => '0',
					'tbl_kontrak.id' => $this->uri->segment(3)
				];
				$data['data'] = $this->m_swat->tampil_kontrak($where)->row();

				$where = [
					'kontrak_id' => $this->uri->segment(3)
				];
				$data['kriteria'] = $this->m_swat->tampil_where('tbl_kontrak_kriteria', $where);

				$this->load->view('global/v_sidebar');
				$this->load->view('kontrak/v_kontrak_detail', $data);
				$this->load->view('global/v_footer');
			}
		}else{
			redirect(base_url('login'));
		}
	}
}
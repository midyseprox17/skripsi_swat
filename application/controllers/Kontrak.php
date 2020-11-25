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
					$id = $this->input->post('id');
					$devisi_id = $this->input->post('devisi_id');
					$kriteria = $this->input->post('kriteria');
					$bobot = $this->input->post('bobot');
					$keterangan = $this->input->post('keterangan');

					$data = $this->m_swat->cari_pegawai(implode(',', $kriteria), $devisi_id)->result_array();
					
					//INISIALISASI
					$pembagi = [];
					$temp = [];
					$aplus = [];
					$amin = [];
					$dplus = [];
					$dmin = [];
					$preferensi = [];
					echo '<pre>'; print_r($bobot); echo '</pre><br>==================================================';
					echo '<pre>'; print_r($data); echo '</pre><br>==================================================';

					for($i = 0; $i < count($kriteria); $i++){
						$pembagi[$i] = 0;
						$temp[$i] = 0;
					}
					
					//PEMBAGI
					for($i = 0; $i < count($data); $i++){
						for($a = 0; $a < count($data[$i]); $a++){
							$temp[$a] += pow($data[$i][$kriteria[$a]],2);
						}
					}
					for($i = 0; $i < count($temp); $i++){
						$pembagi[$i] = round(sqrt($temp[$i]), 4);
					}
					echo '<pre>'; print_r($pembagi); echo '</pre><br>==================================================';

					//NORMALISASI
					for($i = 0; $i < count($data); $i++){
						for($a = 0; $a < count($data[$i]); $a++){
							$data[$i][$kriteria[$a]] = round($data[$i][$kriteria[$a]]/$pembagi[$a], 4);
						}
					}
					echo '<pre>'; print_r($data); echo '</pre><br>==================================================';

					//NORMALISASI TERBOBOT
					for($i = 0; $i < count($data); $i++){
						for($a = 0; $a < count($data[$i]); $a++){
							$data[$i][$kriteria[$a]] = round($data[$i][$kriteria[$a]]*$bobot[$a], 4);
						}
					}
					echo '<pre>'; print_r($data); echo '</pre><br>==================================================';

					//SOLUSI IDEAL POSITIF DAN NEGATIF
					for($i = 0; $i < count($kriteria); $i++){
						if($keterangan[$i] == 'benefit'){
							$aplus[$i] = max(array_column($data, $kriteria[$i]));
							$amin[$i] = min(array_column($data, $kriteria[$i]));
						}else if($keterangan[$i] == 'cost'){
							$aplus[$i] = min(array_column($data, $kriteria[$i]));
							$amin[$i] = max(array_column($data, $kriteria[$i]));
						}
					}
					echo '<pre>'; print_r($aplus); echo '</pre><br>==================================================';
					echo '<pre>'; print_r($amin); echo '</pre><br>==================================================';

					//D+ dan D-
					for($i = 0; $i < count($data); $i++){
						$dplus[$i] = 0;
						$dmin[$i] = 0;
						for($a = 0; $a < count($data[$i]); $a++){
							$dplus[$i] += $dplus[$i] + pow($aplus[$a] - $data[$i][$kriteria[$a]], 2);
							$dmin[$i] += $dmin[$i] + pow($data[$i][$kriteria[$a]] - $amin[$a], 2);
						}
						$dplus[$i] = round(sqrt($dplus[$i]), 4);
						$dmin[$i] = round(sqrt($dmin[$i]), 4);
					}
					echo '<pre>'; print_r($dplus); echo '</pre><br>==================================================';
					echo '<pre>'; print_r($dmin); echo '</pre><br>==================================================';



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
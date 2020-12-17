<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class swat extends CI_Controller
{
	function index()
	{
		if($this->session->userdata('masuk') == '1'){
			$this->m_swat->kontrak_habis();

			$where = [
				'dihapus' => '0',
				'tahun' => date('Y')
			];
			$data['total_security'] = $this->m_swat->tampil_where('tbl_pegawai', ['devisi_id' => '1', 'dihapus' => '0'])->num_rows();
			$data['total_cleaningservice'] = $this->m_swat->tampil_where('tbl_pegawai', ['devisi_id' => '2', 'dihapus' => '0'])->num_rows();
			$data['total_parkir'] = $this->m_swat->tampil_where('tbl_pegawai', ['devisi_id' => '3', 'dihapus' => '0'])->num_rows();
			$data['total_backoffice'] = $this->m_swat->tampil_where('tbl_pegawai', ['devisi_id' => '4', 'dihapus' => '0'])->num_rows();

			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_content', $data);
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	function login(){
		if($this->input->post('submit') != NULL){

			$username = $this->input->post('username');
			$password = $this->input->post('password');

			if(!$this->auth->login($username,$password)){
				$this->session->set_flashdata('pesan', 'Login Gagal. Pastikan Username/Password Benar');
				$this->load->view('global/v_login');
			}else{
				redirect(base_url());
			}
			
		}else{
			$this->session->set_flashdata('pesan', '');
			$this->load->view('global/v_login');
		}
	}

	function logout(){
		$this->auth->logout();
		redirect(base_url('login'));
	}

	function data_login(){
		if($this->input->post('submit') != NULL){
			$data = [
				'nama' => $this->input->post('nama'),
				'pertanyaan1' => $this->input->post('pertanyaan1'),
				'jawaban1' => strtolower($this->input->post('jawaban1')),
				'pertanyaan2' => $this->input->post('pertanyaan2'),
				'jawaban2' => strtolower($this->input->post('jawaban2'))
			];

			$where = [
					'username' => $this->session->userdata('username'),
					'dihapus' => '0'
				];

			$this->m_swat->ubah('tbl_user', $data, $where);

			echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".'data_login'."'; </script>";
			
		}else{
			$data['data'] = $this->m_swat->tampil_where('tbl_user', ['username' => $this->session->userdata('username')])->row();

			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_data_login', $data);
			$this->load->view('global/v_footer');
		}
	}

	function ubah_password(){
		if($this->input->post('submit') != NULL){
			if(!$this->auth->login($this->session->userdata('username'),$this->input->post('password_lama'))){
				$this->session->set_flashdata('pesan', 'Password Lama Salah, Silahkan Coba Lagi');
				$this->load->view('global/v_sidebar');
				$this->load->view('global/v_ubah_password');
				$this->load->view('global/v_footer');
			}else{
				if($this->input->post('password_baru') == $this->input->post('password_baru2')){
					$data = [
						'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT)
					];

					$where = [
						'username' => $this->session->userdata('username'),
						'dihapus' => '0'
					];

					$this->m_swat->ubah('tbl_user', $data, $where);

					echo "<script>alert('Data Berhasil Disimpan'); window.location.href='".'logout'."'; </script>";
				}else{
					$this->session->set_flashdata('pesan', 'Password Baru Tidak Sama. Pastikan Konfirmasi Password dan Password Baru Anda Sama');
					$this->load->view('global/v_sidebar');
					$this->load->view('global/v_ubah_password');
					$this->load->view('global/v_footer');
				}
			}			
		}else{
			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_ubah_password');
			$this->load->view('global/v_footer');
		}
	}

	function lupa_password(){
		if($this->input->post('submit') != NULL){
			if($this->input->post('submit') == 'step1'){
				$where = [
					'username' => $this->input->post('username'),
					'dihapus'=>'0'
				];
				$hasil['data_login'] = $this->m_swat->tampil_where('tbl_user', $where)->row();
				if($hasil['data_login'] != NULL){
					$this->load->view('global/v_lupa_password2', $hasil);
				}else{
					$this->session->set_flashdata('pesan', 'Username Tidak Ditemukan');
					redirect(base_url('lupa_password'));
				}
			}else if($this->input->post('submit') == 'step2'){
				$where = [
					'username' => $this->input->post('username'),
					'jawaban1' => strtolower($this->input->post('jawaban1')),
					'jawaban2' => strtolower($this->input->post('jawaban2'))
				];
				$hasil['data_login'] = $this->m_swat->tampil_where('tbl_user', $where)->row();

				if($hasil['data_login'] != NULL){
					$this->load->view('global/v_lupa_password3', $hasil);
				}else{
					$this->session->set_flashdata('pesan', 'Jawaban Anda Salah, Silahkan Ingat Kembali');
					redirect(base_url('lupa_password'));
				}
			}else if($this->input->post('submit') == 'step3'){
				$data = [
					'password' => password_hash($this->input->post('password_baru'), PASSWORD_DEFAULT)
				];

				$where = [
					'username' => $this->input->post('username'),
					'dihapus' => '0'
				];

				$this->m_swat->ubah('tbl_user', $data, $where);

				echo "<script>alert('Password Berhasil Di Reset, Silahkan Login'); window.location.href='".'logout'."'; </script>";
			}
		}else{
			$this->load->view('global/v_lupa_password');
		}
	}
}
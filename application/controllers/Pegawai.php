<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class pegawai extends CI_Controller
{
	public function index(){
		if($this->session->userdata('masuk') == '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('pegawai/v_pegawai');
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}
}
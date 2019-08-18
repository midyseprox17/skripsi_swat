<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class uptd extends CI_Controller
{
	function index()
	{
		if($this->session->userdata('masuk') == '1'){
			$this->load->view('global/v_sidebar');
			$this->load->view('global/v_content');
			$this->load->view('global/v_footer');
		}else{
			redirect(base_url().'login');
		}
	}

	function login(){
		if(isset($_POST['submit'])){

			$username = $_POST['username'];
			$password = $_POST['password'];

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
		redirect(base_url().'login');
	}
}
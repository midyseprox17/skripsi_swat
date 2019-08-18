<?php
class uptd extends CI_Controller
{
	function index()
	{
		if($this->session->userdata('masuk') == '1'){
			$list_menu = $this->auth->get_menu();

			$this->load->view('global/header_login');
			$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
			$this->load->view('global/home_login');
		}else{
			redirect(base_url().'uptd/login');
		}
	}

	function login(){
		if(isset($_POST['username'])){
			$username = $_POST['username'];
			$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

			if(!$this->auth->login($username,$password)){
				$this->session->set_flashdata('pesan', 'Login Gagal. Pastikan Username/Password Benar');
			}
			redirect(base_url());
		}else{
			$this->session->set_flashdata('pesan', '3');
			$this->load->view('global/v_login');
		}
	}

	function logout(){
		$this->auth->logout();
		redirect(base_url().'uptd/login');
	}
}
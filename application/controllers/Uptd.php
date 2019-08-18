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
		if(isset($_POST['submit'])){
			$username = $_POST['username'];
			$password = $_POST['password'];

			$log_in = $this->auth->login($username,$password);
			redirect(base_url());
		}else{
			$this->load->view('global/v_login');
		}
	}

	function logout(){
		$this->auth->logout();
		redirect(base_url().'uptd/login');
	}
}
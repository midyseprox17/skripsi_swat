<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class auth{
	var $CI = NULL;

   	function __construct(){
   		$this->CI =& get_instance();
   	}

	function login($username, $password){
		$data = array(
			'username' => $username,
			'dihapus'=>'0'
		);
		$login = $this->CI->db->get_where('tbl_user', $data)->row();
		if($login != NULL){
			if(password_verify($password, $login->password)){
				$sess_data['masuk'] = '1';
				$sess_data['username'] = $login->username;
				$sess_data['nama'] = $login->nama;
				$sess_data['hak_akses'] = $login->hak_akses;
				$this->CI->session->set_userdata($sess_data);
				return true;
			}
		}
		return false;
	}

	function is_login($hak_akses){
		if($this->CI->session->userdata('masuk') == '1' && $this->CI->session->userdata('hak_akses') == $hak_akses){
			return true;
		}
		return false;
	}

	function logout(){
		$this->CI->session->sess_destroy();
	}

	function get_menu(){
		$hak_akses = $this->CI->session->userdata('hak_akses');
		return $this->CI->db->get_where('tbl_menu', ['hak_akses'=>$hak_akses]);
	}
}
<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class auth{
	var $CI = NULL;

   	function __construct(){
   		$this->CI =& get_instance();
   	}

	function login($username, $password){
		$password = sha1($password);
		$login = $this->CI->db->get_where('tbl_user', array('id' => $username, 'password' => $password));
		if(count($login->result())>0){
			foreach ($login -> result() as $value){
				$sess_data['masuk'] = '1';
				$sess_data['id'] = $value->id;
				$sess_data['nama'] = $value->nama;
				$sess_data['hak_akses'] = $value->hak_akses;
				$this->CI->session->set_userdata($sess_data);
			}

			return true;
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
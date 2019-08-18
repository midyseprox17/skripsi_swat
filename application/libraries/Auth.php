<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class auth{
	var $CI = NULL;

   	function __construct(){
   		$this->CI =& get_instance();
   	}

	function login($username, $password){
		$data = [
			'username' => $username,
			'password' => $password, 
			'dihapus'=>'0'
		];
		$login = $this->CI->db->get_where('v_user_pegawai', $data);
		if(count($login->result())>0){
			foreach ($login -> result() as $value){
				$sess_data['masuk'] = '1';
				$sess_data['pegawai_id'] = $value->pegawai_id;
				$sess_data['nip'] = $value->username;
				$sess_data['nama'] = $value->nama;
				$sess_data['jabatan'] = $value->jabatan;
				$sess_data['pangkat'] = $value->pangkat;
				$sess_data['id_hak_akses'] = $value->id_hak_akses;
				$this->CI->session->set_userdata($sess_data);
			}
			return true;
		}else{
			return false;
		}
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
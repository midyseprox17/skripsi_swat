<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_suket extends CI_Model
{
	function lock_tbl_suket(){
		$this->db->query('LOCK TABLES tbl_suket WRITE');
	}

	function unlock_tbl_suket(){
		$this->db->query('UNLOCK TABLES');
	}

	function id_terakhir($penomoran_id){
		return $this->db->query("SELECT * FROM tbl_suket WHERE penomoran_id = '".$penomoran_id."' ORDER BY nomor DESC LIMIT 1");
	}
}
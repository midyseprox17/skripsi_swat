<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_sm extends CI_Model
{
	function lock_tbl_sm(){
		$this->db->query('LOCK TABLES tbl_sm WRITE');
	}

	function unlock_tbl_sm(){
		$this->db->query('UNLOCK TABLES');
	}

	function id_terakhir($tahun){
		return $this->db->query("SELECT * FROM tbl_sm WHERE tahun = ".$this->db->escape($tahun)."  ORDER BY nomor DESC LIMIT 1");
	}

	function grup_dari(){
		return $this->db->query("SELECT dari FROM tbl_sm GROUP by dari ORDER by dari ASC");
	}
}
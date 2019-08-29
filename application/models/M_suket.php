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

	function id_terakhir($penomoran_id, $tahun){
		return $this->db->query("SELECT * FROM tbl_suket WHERE penomoran_id = '".$penomoran_id."' AND tahun = ".$this->db->escape($tahun)." ORDER BY nomor DESC LIMIT 1");
	}

	function grup_hal(){
		return $this->db->query("SELECT hal FROM tbl_suket GROUP by hal ORDER by hal ASC");
	}

	function grup_kepada(){
		return $this->db->query("SELECT kepada FROM tbl_suket GROUP by kepada ORDER by kepada ASC");
	}
}
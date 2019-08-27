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

	function id_terakhir(){
		return $this->db->query("SELECT * FROM tbl_sm ORDER BY nomor DESC LIMIT 1");
	}
}
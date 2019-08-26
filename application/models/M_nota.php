<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_nota extends CI_Model
{
	function nomor_cari($tanggal, $bulan, $tahun){
		return $this->db->query("SELECT * FROM tbl_nota WHERE tanggal BETWEEN ".$this->db->escape($tanggal-1)." AND ".$this->db->escape($tanggal+1)." AND bulan = ".$this->db->escape($bulan)." AND tahun = ".$this->db->escape($tahun)." AND dihapus='0' ORDER BY nomor ASC");
	}

	function nomor_minmax($tanggal, $bulan, $tahun){
		return $this->db->query("SELECT MIN(nomor) AS nomor_min, MAX(nomor) nomor_max FROM tbl_nota WHERE tanggal BETWEEN ".$this->db->escape($tanggal-1)." AND ".$this->db->escape($tanggal+1)." AND bulan = ".$this->db->escape($bulan)." AND tahun = ".$this->db->escape($tahun)." AND dihapus='0' ORDER BY nomor ASC");
	}

	function lock_tbl_nota(){
		$this->db->query('LOCK TABLES tbl_nota WRITE, tbl_nota_pengolah WRITE, v_nota_pengolah_pegawai WRITE');
	}

	function unlock_tbl_nota(){
		$this->db->query('UNLOCK TABLES');
	}

	function id_terakhir(){
		return $this->db->query("SELECT * FROM tbl_nota ORDER BY nomor DESC LIMIT 1");
	}
}
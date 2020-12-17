<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');

class m_swat extends CI_Model
{
	public function tampil($table)
	{
		return $this->db->get($table);
	}
	
	public function tampil_where($table,$data)
	{
		return $this->db->get_where($table, $data);
	}

	public function tampil_join($field, $table, $where)
	{
		$this->db->select($field)
			->from($table)
			->where($where);
		return $this->db->get();
	}

	public function cari($table,$data,$cari)
	{
		foreach($data as $key => $value) {
		    if($key == 0) {
		        $this->db->like($value, $cari);
		    } else {
		        $this->db->or_like($value, $cari);
		    }
		}
		return $this->db->get($table);
	}
	
	function hapus($table,$where)
	{
		$this->db->delete($table, $where);
	}
	
	function ubah($table,$data,$field_key)
	{
		$this->db->update($table,$data,$field_key);
	}
	
	function tambah($table,$data)
	{
		$this->db->insert($table,$data);
		return $this->db->insert_id();
	}

	function tampil_pegawai($where){
		$this->db->select("tbl_pegawai.*, tbl_devisi.nama AS `devisi_nama`")
		->from("tbl_pegawai")
		->join("tbl_devisi", "tbl_pegawai.devisi_id = tbl_devisi.id")
		->where($where);
		return $this->db->get();
	}

	function tampil_kontrak($where){
		$this->db->select("tbl_kontrak.*, tbl_klien.nama AS `klien`, tbl_devisi.nama AS `devisi`")
		->from("tbl_kontrak")
		->join("tbl_klien", "tbl_kontrak.klien_id = tbl_klien.id")
		->join("tbl_devisi", "tbl_kontrak.devisi_id = tbl_devisi.id")
		->where($where)
		->order_by("tbl_kontrak.id");
		return $this->db->get();
	}

	function cari_pegawai($kolom, $devisi_id){
		if(strpos($kolom, 'umur') !== false){
			$kolom = str_replace('umur', 'TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur', $kolom);
		}
		$this->db->select($kolom.',nik')
		->from("tbl_pegawai")
		->where(['devisi_id' => $devisi_id, 'dalam_kontrak' => '0', 'dihapus' => '0']);
		return $this->db->get();
	}

	function cari_pegawai_in($nik, $kolom){
		if(strpos($kolom, 'umur') !== false){
			$kolom = str_replace('umur', 'TIMESTAMPDIFF(YEAR, tgl_lahir, CURDATE()) AS umur', $kolom);
		}
		$this->db->select($kolom.',nik,nama,alamat')
			->from('tbl_pegawai')
			->where_in('nik', $nik);
		return $this->db->get();
	}
	
	function tampil_kontrak_penempatan($id){
		$this->db->select("tbl_pegawai.*")
		->from("tbl_penempatan")
		->join("tbl_pegawai", "tbl_penempatan.pegawai_nik = tbl_pegawai.nik")
		->where(['kontrak_id' => $id]);
		return $this->db->get();
	}

	function tampil_penempatan(){
		$this->db->select("tbl_pegawai.*, tbl_klien.nama AS `klien`, tbl_devisi.nama AS `devisi`, tbl_kontrak.tgl_mulai as tgl_mulai, tbl_kontrak.tgl_selesai as tgl_selesai, tbl_kontrak.status as status")
		->from("tbl_pegawai")
		->join("tbl_penempatan", "tbl_pegawai.nik = tbl_penempatan.pegawai_nik", "left")
		->join("tbl_kontrak", "tbl_penempatan.kontrak_id = tbl_kontrak.id", "left")
		->join("tbl_devisi", "tbl_pegawai.devisi_id = tbl_devisi.id", "left")
		->join("tbl_klien", "tbl_kontrak.klien_id = tbl_klien.id", "left")
		->where(['tbl_pegawai.dihapus' => '0'])
		->order_by("tbl_klien.nama", "desc");
		return $this->db->get();
	}

	function kontrak_habis(){
		$this->db->query("UPDATE tbl_pegawai JOIN tbl_penempatan ON tbl_pegawai.nik = tbl_penempatan.pegawai_nik JOIN tbl_kontrak ON tbl_penempatan.kontrak_id = tbl_kontrak.id SET tbl_pegawai.dalam_kontrak = '0', tbl_kontrak.status = 'selesai' WHERE tbl_kontrak.tgl_selesai < CURDATE()");
	}
}
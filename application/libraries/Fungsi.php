<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class fungsi
{
	var $CI = NULL;

	function __construct()
	{
	    // get CI's object
	    $this->CI =& get_instance();
	}

	public function next_id($table,$where)
	{
		$this->CI->db->select('id')
				->from($table)
				->where($where)
				->order_by('id', 'DESC')
				->limit(1);
		$hasil = $this->CI->db->get();
		if($hasil->num_rows() > 0)
		{
			$data = $hasil->row();
			$lastid = $data->id;
			
			$no = (int)substr($lastid, -3);
			$mainId = substr($lastid, 0, -3);
			$no++;

			if($no < 10){
				return $mainId."00".$no;
			}else if($no < 100){
				return $mainId."0".$no;
			}else{
				return $mainId.$no;
			}
		}else
		{
			$id = '';
			for($i = 0; $i < count($where); $i++)
			{
				$id .= array_values($where)[$i];
			}
			return $id.'001';
		}
	}
}
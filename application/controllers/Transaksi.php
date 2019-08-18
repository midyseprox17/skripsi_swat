<?php
class transaksi extends CI_Controller{
	function index(){
		if($this->auth->is_login('pemilik') || $this->auth->is_login('pegawai')){
			$list_menu = $this->auth->get_menu();

			if($this->auth->is_login('pemilik')){
				$hasil['transaksi'] = $this->m_laundry->tampil_where('v_transaksi', ['dihapus'=>'0']);
			}else if($this->auth->is_login('pegawai')){
				$data = [
					'id_pegawai' => $this->session->userdata('id'),
					'dihapus' => '0'
				];
				$hasil['transaksi'] = $this->m_laundry->tampil_where('v_transaksi', $data);
			}
			
			$this->load->view('global/header_login');
			$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
			$this->load->view('transaksi/transaksi_tampil', $hasil);
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function tambah(){
		if($this->auth->is_login('pemilik') || $this->auth->is_login('pegawai')){
			if(isset($_POST['submit'])){

				$data['id'] = $this->fungsi->next_id('tbl_transaksi', ['id_pegawai'=>$this->session->userdata('id'), 'tgl_masuk'=>date('Ymd')]);
				$data['id_pegawai'] = $this->session->userdata('id');
				$data['nama'] = $_POST['nama'];
				$data['telp'] = $_POST['telp'];
				$data['tgl_masuk'] = date('Y-m-d');
				$data['tgl_selesai'] = date('Y-m-d', strtotime($data['tgl_masuk']. "+3 days"));
				$data['dihapus'] = '0';

				$this->m_laundry->tambah('tbl_transaksi', $data);

				if(isset($_POST['id_jenis'])){
					$id_jenis = $_POST['id_jenis'];
					$harga_jenis = $_POST['harga_jenis'];
					$qty = $_POST['qty'];

					for($i = 0; $i < count($id_jenis); $i++){
						$ddata['id_transaksi'] = $data['id'];
						$ddata['id_jenis'] = $id_jenis[$i];
						$ddata['qty'] = $qty[$i];
						$ddata['harga'] = explode("/", $harga_jenis[$i])[0]*$qty[$i];

						$this->m_laundry->tambah('tbl_detail_transaksi', $ddata);
					}
				}

				redirect(base_url().'transaksi/detail/'.$data['id']);
			}else{
				$list_menu = $this->auth->get_menu();
				$hasil['jenis'] = $this->m_laundry->tampil('tbl_jenis');

				$this->load->view('global/header_login');
				$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
				$this->load->view('transaksi/transaksi_tambah', $hasil);
			}
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function hapus(){
		if($this->auth->is_login('pemilik')){
			$this->m_laundry->ubah('tbl_transaksi', ['dihapus'=>'1'], ['id'=>$this->uri->segment(3)]);
			redirect(base_url().'transaksi');
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function terima(){
		if($this->auth->is_login('pemilik') || $this->auth->is_login('pegawai')){
			$this->m_laundry->ubah('tbl_transaksi', ['tgl_keluar'=>date('Y-m-d')], ['id'=>$this->uri->segment(3)]);
			redirect(base_url().'transaksi');
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	function detail(){
		if($this->auth->is_login('pemilik') || $this->auth->is_login('pegawai')){
			$id = $this->uri->segment(3);

			$list_menu = $this->auth->get_menu();
			$hasil['transaksi'] = $this->m_laundry->tampil_where('v_transaksi', ['id'=>$id]);
			$hasil['detail_transaksi'] = $this->m_laundry->tampil_where('v_detail_transaksi', ['id_transaksi'=>$id]);

			$this->load->view('global/header_login');
			$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
			$this->load->view('transaksi/transaksi_detail', $hasil);
		}else{
			redirect(base_url().'laundry/login');
		}
	}

	public function nota_transaksi(){
        $id = $this->uri->segment(3);

		$hasil['transaksi'] = $this->m_laundry->tampil_where('v_transaksi', ['id'=>$id]);
		$hasil['detail_transaksi'] = $this->m_laundry->tampil_where('v_detail_transaksi', ['id_transaksi'=>$id]);
        
        $this->pdf->load_view('transaksi/laporan/nota_transaksi',$hasil);
        set_time_limit (500);
        $this->pdf->render();
        $this->pdf->stream("Nota_".$id.".pdf");
    }

    public function laporan(){
    	if($this->auth->is_login('pemilik')){
    		if(isset($_POST['submit'])){
    			$dari_tanggal = $_POST['dari_tanggal'];
    			$sampai_tanggal = $_POST['sampai_tanggal'];
    			$hasil['transaksi'] = $this->m_laundry->transaksi_laporan($dari_tanggal, $sampai_tanggal);
    			$hasil['total_pendapatan'] = $this->m_laundry->transaksi_total_pendapatan($dari_tanggal, $sampai_tanggal);
    			$hasil['dari_tanggal'] = $dari_tanggal;
    			$hasil['sampai_tanggal'] = $sampai_tanggal;
    			$this->pdf->load_view('transaksi/laporan/transaksi', $hasil);
    			set_time_limit(500);
    			$this->pdf->render();
    			$this->pdf->stream("transaksi_".date('Ymd', strtotime($dari_tanggal))."_".date('Ymd', strtotime($sampai_tanggal)).".pdf");
    		}else{
    			$list_menu = $this->auth->get_menu();

				$this->load->view('global/header_login');
				$this->load->view('global/sidebar_login', ['list_menu'=>$list_menu]);
				$this->load->view('transaksi/transaksi_laporan');
    		}
    	}else{
    		redirect(base_url().'laundry/login');
    	}
    }
}
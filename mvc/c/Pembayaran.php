<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Pembayaran extends CI_Controller {
	
	
	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->model('M_transaksi');
	}
	public function index()
	{	
		$cek = $this->M_transaksi->get_dataPembayaran($this->session->userdata('id'))->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'id_pembayaran' => $c->id_pembayaran,
			'namaAlumni' => $c->nama,
			'alamatPengirim' => $c->alamat,
			'noHp' => $c->noHp,
			'hargaOngkir' => $c->hargaOngkir,
			'buktiPembayaran' => $c->buktiPembayaran,
			'kodePos' => $c->kodePos,
			'strataPendidikan' => $c->strataPendidikan,
			'totalPembayaran' => $c->totalPembayaran,
			'pesan'=> ''
			);	
			$data['hargaKartu']=  (int)$data['totalPembayaran']-(int)$data['hargaOngkir'];
		$this->load->view('V_Pembayaran',$data);
		}
	}
	public function set_pembayaran(){
		$id= $this->session->userdata('id');
		$foto= $this->input->post("foto");
		
		$cek=$this->M_transaksi->get_dataPembayaran($id)->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'id_pengirim' => $c->id_pengirim,
			);	
			
			$config['upload_path']          = './assets/images/pembayaran';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
 
		$this->load->library('upload', $config);
		
		if ( ! $this->upload->do_upload('foto')){
					$error = $this->upload->display_errors();
					$this->reload($error);
				}else{;
					
					$upload_data = $this->upload->data();
					 $data['buktiPembayaran']= $upload_data['file_name'];
					 $this->M_transaksi->updatePembayaran($data,'pembayaran');
					 $this->notifPending($id);
					$this->reload("Berhasil");
				}
		}
	}
	public function notifPending($id){
		$this->load->model('M_notifikasi');
		$cek=$this->M_notifikasi->getNotifikasiPending($id,"System")->result();
		if(count($cek)==0){
			$data = array(
			'id_alumni' => $id,
			'subjek' => 'System',
			'pesan' => 'Tunggu Verifikasi Pembayaran Anda Untuk Cetak',
			'statusNotifikasi' =>0,
		);
		$this->M_notifikasi->setNotifikasi($data);
		}
	}
	public function reload($pesan)
	{
		$cek = $this->M_transaksi->get_dataPembayaran($this->session->userdata('id'))->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'id_pembayaran' => $c->id_pembayaran,
			'namaAlumni' => $c->nama,
			'alamatPengirim' => $c->alamat,
			'noHp' => $c->noHp,
			'hargaOngkir' => $c->hargaOngkir,
			'buktiPembayaran' => $c->buktiPembayaran,
			'kodePos' => $c->kodePos,
			'strataPendidikan' => $c->strataPendidikan,
			'totalPembayaran' => $c->totalPembayaran,
			'pesan'=> $pesan
			);	
			$data['hargaKartu']=  (int)$data['totalPembayaran']-(int)$data['hargaOngkir'];
			
		$this->load->view('V_Pembayaran',$data);
		}
	}
}
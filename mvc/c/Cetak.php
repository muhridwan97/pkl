<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cetak extends CI_Controller {

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
			
		$this->load->view('V_Cetak',$data);
		}

	}
	public function cetak()
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
			
		$this->load->view('invoice-print',$data);
		}	

	}
}
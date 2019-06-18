<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$hargaKartuS1=100000;
$hargaKartuS2=150000;
class Cetak extends CI_Controller {

	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->model('M_transaksi');
	}
	public function index()
	{
		global $hargaKartuS1,$hargaKartuS2;
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
			'pesan'=> ''
			);	
			if($data['strataPendidikan']=='S2'||$data['strataPendidikan']=='S3'){
				$data['hargaKartu']=  $hargaKartuS2;
			}else{
				$data['hargaKartu']=  $hargaKartuS1;
			}
			
		$this->load->view('V_Cetak',$data);
		}

	}
	public function cetak()
	{
		global $hargaKartuS1,$hargaKartuS2;
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
			'pesan'=> ''
			);	
			if($data['strataPendidikan']=='S2'||$data['strataPendidikan']=='S3'){
				$data['hargaKartu']=  $hargaKartuS2;
			}else{
				$data['hargaKartu']=  $hargaKartuS1;
			}
			
		$this->load->view('invoice-print',$data);
		}	

	}
}
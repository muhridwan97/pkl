<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Adminika extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->model('M_biodata');
		$this->load->helper('url');
		$this->load->database();
	}
	
	public function index()
	{
		if($this->session->userdata('username')!=null){
			$this->admin_dashboard();
		}
		else{
			
		$this->load->view('Admin_login');
		}
	}
	public function admin_dashboard(){
		$this->load->model('M_transaksi');
		$data["alumni"]=$this->M_transaksi->get_pending()->result_array();
		$data["pembayaran"]=$this->M_transaksi->get_pembayaran()->result_array();
		$data["jumlahMember"]=$this->M_biodata->jumlahMember();
		$data["jumlahMemberPending"]=$this->M_biodata->jumlahMemberPending();
		$data["jumlahMemberMembayar"]=$this->M_biodata->jumlahMemberMembayar();
		$data["jumlahMemberTerkirim"]=$this->M_biodata->jumlahMemberTerkirim();
		$this->load->view('admin_dashboard',$data);
	}
	public function notifikasi($id=''){
		$this->load->model('M_notifikasi');
		$cek = $this->M_notifikasi->getAlumni()->result();
		$data = array(
			'listAlumni' => $cek,
			'id_alumni' => $id,
			);
		$this->load->view('V_notifikasi',$data);
	}
	public function set_notifikasi(){
		$this->load->model('M_notifikasi');
		$id=$this->input->post("alumni");
		$pesan=$this->input->post("pesan");
		$data = array(
			'id_alumni' => $id,
			'pesan' => $pesan,
			'subjek' => 'Admin',
			'statusNotifikasi' => 0,
			);	
			$this->M_notifikasi->setNotifikasi($data);
		$this->notifikasi();
	}
	public function info($id){
		$fakultas = $this->M_biodata->get_fakultas()->result();	
		$cek = $this->M_biodata->get_biodata($id)->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'namaAlumni' => $c->namaAlumni,
			'nim' => $c->nim,
			'tempatLahir' => $c->tempatLahir,
			'tanggalLahir' => $c->tanggalLahir,
			'jenisKelamin' => $c->jenisKelamin,
			'golonganDarah' => $c->golonganDarah,
			'strataPendidikan' => $c->strataPendidikan,
			'alamat' => $c->alamat,
			'noTelepon' => $c->noTelepon,
			'noHp' => $c->noHp,
			'password' => $c->password,
			'id_alumni' => $c->id_alumni,
			'email' => $c->email,
			'listFakultas' => $fakultas,
			'error' => ' ',
			'error2' => ' ',
			'fakultas_id' => $c->fakultas_id,
			'programStudi_id' => $c->prodi_id,
			'jurusan_id' => $c->jurusan_id,
			'fakultas' => $c->fakultas_nama,
			'programStudi' => $c->prodi_nama,
			'jurusan' => $c->jurusan_nama,
			'fotoProfil' => $c->fotoProfil,
			'fotoIjazah' => $c->fotoIjazah
			);	
		$this->load->view('V_infoMember',$data);
		}
	}
	public function lihat(){
		$data["alumni"]=$this->M_biodata->read();
		$this->load->view("LihatMember",$data);
	}
	public function memberMembayar(){
		$data["alumni"]=$this->M_biodata->get_memberMembayar()->result_array();
		$this->load->view("V_memberMembayar",$data);
	}
	public function memberTerkirim(){
		$data["alumni"]=$this->M_biodata->get_memberTerkirim()->result_array();
		$this->load->view("V_memberTerkirim",$data);
	}
	public function edit($id){
		$fakultas = $this->M_biodata->get_fakultas()->result();	
		$cek = $this->M_biodata->get_biodata($id)->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'namaAlumni' => $c->namaAlumni,
			'nim' => $c->nim,
			'tempatLahir' => $c->tempatLahir,
			'tanggalLahir' => $c->tanggalLahir,
			'jenisKelamin' => $c->jenisKelamin,
			'golonganDarah' => $c->golonganDarah,
			'strataPendidikan' => $c->strataPendidikan,
			'alamat' => $c->alamat,
			'noTelepon' => $c->noTelepon,
			'noHp' => $c->noHp,
			'password' => $c->password,
			'id_alumni' => $c->id_alumni,
			'email' => $c->email,
			'listFakultas' => $fakultas,
			'error' => ' ',
			'error2' => ' ',
			'fakultas_id' => $c->fakultas_id,
			'programStudi_id' => $c->prodi_id,
			'jurusan_id' => $c->jurusan_id,
			'fakultas' => $c->fakultas_nama,
			'programStudi' => $c->prodi_nama,
			'jurusan' => $c->jurusan_nama,
			'fotoProfil' => $c->fotoProfil,
			'fotoIjazah' => $c->fotoIjazah
			);	
		$this->load->view('V_editMember',$data);
		}
	}
	public function hapus(){
		$id= $this->input->post("id");
		$this->M_biodata->delete($id);
		echo "{}";
	}
	public function ijazahValid(){
		$id= $this->input->post("id");
		$this->M_biodata->set_ijazahValid($id);
		$this->set_pengiriman($id);
		echo "{}";
	}
	
	public function pembayaranValid(){
		$this->load->model('M_transaksi');
		$id= $this->input->post("id");
		$data = array(
			'id_pembayaran' => $id,
			'statusPembayaran' => 'terbayar'
			);	
			$this->M_transaksi->pembayaranValid($data,'pembayaran');
		echo "{}";
	}
	public function kirim(){
		$this->load->model('M_transaksi');
		$id= $this->input->post("id");
		$data = array(
			'id_pembayaran' => $id,
			'statusPembayaran' => 'Terkirim'
			);	
			$this->M_transaksi->pembayaranValid($data,'pembayaran');
		echo "{}";
	}
	//--------------------------------------------------------untuk membuat database langkah pengiriman
	public function set_pengiriman($id){ // untuk membuat database langkah pengiriman
		$cek = $this->M_biodata->get_biodata($id)->result();
		$this->load->model('M_transaksi');
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'nama' => $c->namaAlumni,
			'alamat' => $c->alamat,
			'noHp' => $c->noHp,
			'id_pemesan' => $c->id_alumni
			);	
			$this->M_transaksi->set_pengiriman($data,'pengiriman');
		$this->set_pembayaran($id);
		}
	}
	public function set_pembayaran($id){ 
			$this->load->model('M_transaksi');
			$cek=$this->M_transaksi->get_dataPengiriman($id)->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'id_pengirim' => $c->id_pengiriman,
			'buktiPembayaran' => 'default3.png',
			'totalPembayaran' => 100000,
			'statusPembayaran' => 'pending'
			);	
			$this->M_transaksi->set_pembayaran($data,'pembayaran');
		}
	}
	public function editHarga($id){
		$this->load->model('M_transaksi');
		$cek = $this->M_transaksi->get_dataPembayaran($id)->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'id' => $id,
			'totalPembayaran' => $c->totalPembayaran,
			'hargaOngkir' => $c->hargaOngkir,
			);
			$data['totalPembayaran'] = (int)$data['totalPembayaran']-(int)$data['hargaOngkir'];
			$this->load->view('V_editHarga',$data);
	}
	}
	public function setHarga(){
		$this->load->model('M_transaksi');
		$id= $this->input->post("id");
		$harga= $this->input->post("harga");
		$cek = $this->M_transaksi->get_dataPembayaran($id)->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'id_pengirim' => $c->id_pengirim,
			'totalPembayaran' => $harga,
			'hargaOngkir' => $c->hargaOngkir,
			);	
			$data['totalPembayaran'] = (int)$data['totalPembayaran']+(int)$data['hargaOngkir'];
			unset($data['hargaOngkir']);
		$this->M_transaksi->updatePembayaran($data,'pembayaran');
		$this->index();
		}
		
	}
}

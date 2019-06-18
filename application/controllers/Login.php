<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent:: __construct();
		$this->load->library('session');
		
	}
	public function index()
	{
		
		
		$nama =  $this->input->post('nama');
		$password =  $this->input->post('password');
		$this->load->model('M_login');
		$datas = $this->M_login->get_admin()->result();	
		$home = base_url();
		foreach ($datas as $d){
			if($d->nama==$nama && $d->password==$password){
				$this->session->set_userdata('username',$nama);
				redirect($home."adminika/admin_dashboard/");
			}
		}
				$gagal['gagal'] = "gagal";
				$this->load->view('Admin_login', $gagal);
	
		//$this->load->view('Admin_dashboard');
	}
	public function alumni(){
		$email =  $this->input->post('email');
		$password =  $this->input->post('password');
		$this->load->model('M_login');
		$datas = $this->M_login->get_alumni()->result();	
		$home = base_url();
		$cek = $this->M_login->get_auth($email,md5($password))->result();
		if (count($cek)==0){
			$gagal['gagal'] = "gagal";
			$this->load->view('Login', $gagal);
		}else{
			foreach ($cek as $c){
				
			};
			$data_session = array(
			'user' => $c->namaAlumni,
			'id' => $c->id_alumni,
			'email' => $c->email,
			'fotoProfil' => $c->fotoProfil,
			'status' => $c->status
			);
			$this->load->model('M_transaksi');
			$pembayaran = $this->M_transaksi->get_dataPembayaran($c->id_alumni)->result();
		if (count($pembayaran)>0){
			foreach ($pembayaran as $p){
				
			};
			$data_session['statusPengiriman'] = $p->statusPengiriman;
			$data_session['statusPembayaran'] = $p->statusPembayaran;
			
		}else{
			$data_session['statusPengiriman'] = '';
			$data_session['statusPembayaran'] = 'pending';
		}
			$this->session->set_userdata($data_session);
			redirect($home."welcome/cliant_dashboard/");
		}
	}
	
	public function updateSession(){
		$data_session= $this->input->post("session");
		$email =  $data_session['email'];
		$password =  $data_session['password'];;
		$this->load->model('M_login');
		$datas = $this->M_login->get_alumni()->result();	
		$home = base_url();
		$cek = $this->M_login->get_auth($email,md5($password))->result();
		if (count($cek)==0){
			$gagal['gagal'] = "gagal";
			$this->load->view('Login', $gagal);
		}else{
			foreach ($cek as $c){
				
			};
			$data_session = array(
			'user' => $c->namaAlumni,
			'id' => $c->id_alumni,
			'email' => $c->email,
			'fotoProfil' => $c->fotoProfil,
			'status' => $c->status
			);
			$this->session->set_userdata($data_session);
		}
	}
	public function logout()
	{
		$this->session->sess_destroy();
		redirect($home."welcome/");
	}
	public function logoutAdmin()
	{
		$this->session->sess_destroy();
		redirect($home."adminika/");
	}
	
}
?>
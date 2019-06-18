<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		if($this->session->userdata('email')==null){
		$this->load->view('Login');
		}else{
			$this->cliant_dashboard();
		}
	}
	public function cliant_dashboard(){
		$this->load->model('M_login');
		$cek = $this->M_login->get_alumniById($this->session->userdata('id'))->result();	
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
		$this->load->view('Cliant_dashboard');
		}
	}
	public function captcha()
	{
		$this->load->view('Captcha');
	}
}

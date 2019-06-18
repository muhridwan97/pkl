<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registrasi extends CI_Controller {
	
	
	public function index()
	{
 
        $this->load->view('Registrasi');
	}
	public function cek()
	{
		$nama =  $this->input->post('nama');
		$email =  $this->input->post('email');
		$password =  $this->input->post('password');
		$this->load->model('M_registrasi');
		$datas = $this->M_registrasi->get_email()->result();
		$set=0;
		$home = base_url();
		foreach($datas as $d){
			if($d->email == $email){
				$set++;
			}
		}
		if($set==0){
			$this->session->set_userdata('nama',$nama);
			$this->session->set_userdata('email',$email);
			$this->session->set_userdata('password',$password);
			//redirect($home."captcha/");
			//$this->set_dataAlumni();
		}else{
			$gagal['gagal'] = "gagal";
			$this->load->view('registrasi', $gagal);
		}
	}
	
	public function set_dataAlumni()
	{
		
		$nama =  $this->session->userdata("nama");
		$email =  $this->session->userdata("email");
		$password =  $this->session->userdata("password");
		$this->load->model('M_registrasi');
		$datas = $this->M_registrasi->get_email()->result();
		$set=0;
		$home = base_url();
		foreach($datas as $d){
			if($d->email == $email){
				$set++;
			}
		}
		$data = array(
			'namaAlumni' => $nama,
			'email' => $email,
			'fakultas' => "100",
			'jurusan' => "100",
			'programStudi' => "200",
			'fotoProfil' => "default.png",
			'fotoIjazah' => "default2.jpg",
			'status' => "pending",
			'password' => md5($password)
			);
			if($set==0){
		$berhasil = $this->M_registrasi->set_dataAlumni($data,'alumni');
			
		if($berhasil==1)
		{
			$sukses['sukses'] = "sukses";
			$this->load->view('Login', $sukses);
			}}else{
			$gagal['gagal'] = "gagal";
			$this->load->view('Registrasi', $gagal);
		}
	}
	
}
?>
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Biodata extends CI_Controller {

	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->model('M_biodata');
	}
	public function index()
	{
		$fakultas = $this->M_biodata->get_fakultas()->result();	
		$cek = $this->M_biodata->get_biodata($this->session->userdata('id'))->result();
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
			'edit' => ' ',
			'fakultas_id' => $c->fakultas_id,
			'programStudi_id' => $c->prodi_id,
			'jurusan_id' => $c->jurusan_id,
			'fakultas' => $c->fakultas_nama,
			'programStudi' => $c->prodi_nama,
			'jurusan' => $c->jurusan_nama,
			'fotoProfil' => $c->fotoProfil,
			'fotoIjazah' => $c->fotoIjazah,
			'thnLulus' => $c->thnLulus,
			'tptKerja' => $c->tptKerja,
			'thnKerja' => $c->thnKerja
			);	
		$this->load->view('V_biodata',$data);
		}else{
			//$this->load->view('V_biodata');
		}
	}
	function ambil_data(){//cobaajax

	$modul=$this->input->post('modul');
	$id=$this->input->post('id');
	$strataPendidikan=$this->input->post('strataPendidikan');

	if($modul=="jurusan"){
	echo $this->M_biodata->jurusan($id);
	}
	else if($modul=="programStudi"){
	echo $this->M_biodata->programStudi($id,$strataPendidikan);
	}
	}
	public function reload($data,$error,$error2)
	{
		$this->load->model('M_biodata');
		$fakultas = $this->M_biodata->get_fakultas()->result();	
		$data['listFakultas']=$fakultas;
		$data['edit']=$error;
		$this->load->view('V_biodata',$data);
	}
	
	public function set_biodata()
	{
		$id= $this->session->userdata('id');
		$nama =  $this->input->post('nama');
		$nim =  $this->input->post('nim');
		$tptLahir =  $this->input->post('tptLahir');
		$tglLahir =  $this->input->post('tglLahir');
		$jenisKelamin =  $this->input->post('jenisKelamin');
		$golDarah =  $this->input->post('golonganDarah');
		$pendidikan =  $this->input->post('strataPendidikan');
		$fakultas_id =  $this->input->post('fakultas');
		$jurusan_id =  $this->input->post('jurusan');
		$programStudi_id =  $this->input->post('programStudi');
		$alamat =  $this->input->post('alamat');
		$noTelpon =  $this->input->post('noTelpon');
		$noHp =  $this->input->post('noHp');
		$email =  $this->input->post('email');
		$password = $this->input->post('password');
		$foto =  $this->input->post('foto');
		$fotoIjazah =  $this->input->post('fotoIjazah');
		$thnLulus =  $this->input->post('thnLulus');
		$tptKerja =  $this->input->post('tptKerja');
		$thnKerja =  $this->input->post('thnKerja');
		
		$this->load->model('M_biodata');
		$fakultas = $this->M_biodata->nama_fakultas($fakultas_id)->result_array();	
		$fakultas = ($fakultas[0]['fakultas_nama']);
		$jurusan = $this->M_biodata->nama_jurusan($jurusan_id)->result_array();	
		$jurusan = ($jurusan[0]['jurusan_nama']);
		$programStudi = $this->M_biodata->nama_programStudi($programStudi_id)->result_array();	
		$programStudi = ($programStudi[0]['prodi_nama']);
		
		$data = array(
			'namaAlumni' => $nama,
			'nim' => $nim,
			'tempatLahir' => $tptLahir,
			'tanggalLahir' => $tglLahir,
			'jenisKelamin' => $jenisKelamin,
			'golonganDarah' => $golDarah,
			'strataPendidikan' => $pendidikan,
			'fakultas' => $fakultas,
			'fakultas_id' => $fakultas_id,
			'jurusan' => $jurusan,
			'jurusan_id' => $jurusan_id,
			'programStudi' => $programStudi,
			'programStudi_id' => $programStudi_id,
			'alamat' => $alamat,
			'noTelepon' => $noTelpon,
			'noHp' => $noHp,
			'email' => $email,
			'password' => $password,
			'fotoProfil' => $foto,
			'fotoIjazah' => $fotoIjazah,
			'thnLulus' => $thnLulus,
			'tptKerja' => $tptKerja,
			'thnKerja' => $thnKerja,
			);
		
		
		$error="";
		$error2="";
		$data=$this->aksi_uploadFoto($id,$data,$error);
		$data=$this->aksi_uploadIjazah($id,$data,$error,$error2);
		$temp = $data;
					 $temp['fakultas']=$temp['fakultas_id'];
					 $temp['jurusan']=$temp['jurusan_id'];
					 $temp['programStudi']=$temp['programStudi_id'];
					 unset($temp['error']);
					 unset($temp['error2']);
					 unset($temp['fakultas_id']);
					 unset($temp['jurusan_id']);
					 unset($temp['programStudi_id']);
					 $berhasil = $this->M_biodata->updateBio($temp,$id,'alumni');
					 if(count($berhasil)>0){
						 $error="berhasil";
					 }
		 $this->notifPending($id);
		$this->reload($data,$error,$error2);
	}
	public function notifPending($id){
		$this->load->model('M_notifikasi');
		$cek=$this->M_notifikasi->getNotifikasiPending($id,"Sistem")->result();
		if(count($cek)==0){
			$data = array(
			'id_alumni' => $id,
			'subjek' => 'Sistem',
			'pesan' => 'Tunggu Verifikasi Data Anda Untuk Langkah 2',
			'statusNotifikasi' =>0,
		);
		$this->M_notifikasi->setNotifikasi($data);
		}
	}
	public function aksi_uploadFoto($id,$data,$error){
		$config['upload_path']          = './assets/images/foto';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
 
		$this->load->library('upload', $config);
 $cek = $this->M_biodata->get_biodata($this->session->userdata('id'))->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data2 = array(
			'fotoProfil' => $c->fotoProfil,
			'fotoIjazah' => $c->fotoIjazah
		);}	
		$data['fotoProfil']=$data2['fotoProfil'];
		$data['fotoIjazah']=$data2['fotoIjazah'];
		if ( ! $this->upload->do_upload('foto')){
			
					$error = $this->upload->display_errors();
					$data['error']=$error;
					return $data;
				}else{;
					
					$upload_data = $this->upload->data();
					 $data['fotoProfil']= $upload_data['file_name'];
					  $temp = $data;
					 $temp['fakultas']=$temp['fakultas_id'];
					 $temp['jurusan']=$temp['jurusan_id'];
					 $temp['programStudi']=$temp['programStudi_id'];
					 unset($temp['error']);
					 unset($temp['error2']);
					 unset($temp['fakultas_id']);
					 unset($temp['jurusan_id']);
					 unset($temp['programStudi_id']);
					 $berhasil = $this->M_biodata->updateBio($temp,$id,'alumni');
					 $data['error']="berhasil";
					 return $data;
				}
	}
	
	public function aksi_uploadIjazah($id,$data,$error,$error2){
		$config['upload_path']          = './assets/images/ijazah';
		$config['allowed_types']        = 'gif|jpg|png|jpeg';
		$config['max_size']             = 3000;
 
		$this->load->library('upload', $config);
		$cek = $this->M_biodata->get_biodata($this->session->userdata('id'))->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data2 = array(
			'fotoProfil' => $c->fotoProfil,
			'fotoIjazah' => $c->fotoIjazah
		);}
		$data['fotoProfil']=$data2['fotoProfil'];
		$data['fotoIjazah']=$data2['fotoIjazah'];
		if ( ! $this->upload->do_upload('fotoIjazah')){
			
					$error2 = $this->upload->display_errors();
					$data['error2']=$error2;
					return $data;
				}else{
					
					$upload_data = $this->upload->data();
					 $data['fotoIjazah']= $upload_data['file_name'];
					 $temp = $data;
					 $temp['fakultas']=$temp['fakultas_id'];
					 $temp['jurusan']=$temp['jurusan_id'];
					 $temp['programStudi']=$temp['programStudi_id'];
					 unset($temp['error']);
					 unset($temp['error2']);
					 unset($temp['fakultas_id']);
					 unset($temp['jurusan_id']);
					 unset($temp['programStudi_id']);
					 $berhasil = $this->M_biodata->updateBio($temp,$id,'alumni');
					 $data['error2']="berhasil";
					 return $data;
				}
	}
	
	
}

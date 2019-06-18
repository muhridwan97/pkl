<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$hargaKartuS1=30000;
$hargaKartuS2=150000;
class Pengiriman extends CI_Controller {

	function __construct(){
		parent::__construct();
		  $this->load->helper(array('form', 'url'));
		  $this->load->model('M_transaksi');
	}
	public function index()
	{	
		$cek = $this->M_transaksi->get_dataPengiriman($this->session->userdata('id'))->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'namaAlumni' => $c->nama,
			'alamatPengirim' => $c->alamat,
			'noHp' => $c->noHp,
			'kodePos' => $c->kodePos
			);	
			
		$data["alamat"] = $this->get_provinsi();
		$this->load->view('V_pengiriman',$data);
		}else{
			$this->load->view('V_pengiriman',$data);
		}
		
	}
	public function get_provinsi()
	{
		$alamat;
		$curl = curl_init();
	
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/province",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: ec6957ae8995567c27fad9762d043d24"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $hasil= json_decode($response);
		   //print_r(json_decode($response));
		}
		
		foreach($hasil as $name => $rajaongkir){
		//echo $name . '<br/>';
			 foreach($rajaongkir as $name2 => $result){
				 if($name2=="results"){
					$count=1;
				foreach($result as $name3 => $result0){
						foreach($result0 as $name4 => $result1){
						if($name4=="province_id"){
							$alamat[$count]["$name4"]=$result1;
							//echo "province_id :".$result1.'<br/>';
						}
						if($name4=="province"){
							$alamat[$count]["$name4"]=$result1;
							//echo "province ...:".$result1.'<br/>';
						}
						
					}//echo "-------------------------------------------".'<br/>';
					$count++;
					}
				}
			 }	
			 //echo $name2 . ': ' . $value[0] . '-' . $value[1].'<br> ';
			 }
			 //echo '<br/>';

		//print_r($alamat);
		return $alamat;
	}
	public function get_kota()
	{
		$id=$this->input->post('id');
		echo $this->get_kotaku($id);
	}
	public function get_kotaku($id)
	{
		$alamat;
		$curl = curl_init();
	
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/city?province=".$id,
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "GET",
		  CURLOPT_HTTPHEADER => array(
			"key: ec6957ae8995567c27fad9762d043d24"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);

		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
		  $hasil= json_decode($response);
		   //print_r(json_decode($response));
		}
		
		foreach($hasil as $name => $rajaongkir){
		//echo $name . '<br/>';
			 foreach($rajaongkir as $name2 => $result){
				 if($name2=="results"){
					$count=1;
				foreach($result as $name3 => $result0){
						foreach($result0 as $name4 => $result1){
						if($name4=="city_id"){
							$alamat[$count]["$name4"]=$result1;
							echo "city_id ....:".$result1.'<br/>';
						}
						if($name4=="type"){
							$alamat[$count]["$name4"]=$result1;
						}
						if($name4=="city_name"){
							$alamat[$count]["$name4"]=$alamat[$count]['type']." ".$result1;
							echo "city_name ..:".$result1.'<br/>';
						}
						
					}//echo "-------------------------------------------".'<br/>';
					$count++;
					}
				}
			 }	
			 //echo $name2 . ': ' . $value[0] . '-' . $value[1].'<br> ';
			 }
			 //echo '<br/>';
		$opsi="<option value='0'>--pilih--</pilih>";

		foreach ($alamat as $data ){
		$opsi.= "<option value='$data[city_id]'>$data[city_name]</option>";
		}
		//print_r($opsi);
		return $opsi;
	}
	
	public function cekPaket(){
		$jasa=$this->input->post('jenis');
		$kota=$this->input->post('kota');
		echo $this->cekPaketku($kota,$jasa);
	}
	public function cekPaketku($tujuan,$cour){
		$curl = curl_init();
		$hasil;
		$paket="";
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=256&destination=".$tujuan."&weight=100&courier=".$cour, //dalam gram
		  CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: ec6957ae8995567c27fad9762d043d24"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$hasil= json_decode($response);
		   //print_r(json_decode($response));
		}
		
		$paket.= "<option value=''>--pilih--</option>";
		foreach($hasil as $name => $rajaongkir){
			 foreach($rajaongkir as $name2 => $result){
				foreach($result as $name3 => $result0){
					if($name3=="0"){
						foreach($result0 as $name4 => $result1){
							if($name4=="costs"){
								foreach($result1 as $name5 => $result2){
									//if($name5=="0"){//pilihan paket
										foreach($result2 as $name6 => $result3){
											if($name6=="service"){
											$paket.= "<option value='". $name5 ."'>". $result3 ."</option>";
											}
										}
									//}
								}
							}
						}
					}
				}
			 }
			 //print_r( $paket);
		}
		return $paket;
	}

	// harga
	public function cekHarga(){
		$jasa=$this->input->post('jenis');
		$kota=$this->input->post('kota');
		$paket=$this->input->post('paket');
		echo $this->cekHargaku($kota,$jasa,$paket)["ket"];
	}
	
	public function getHarga(){
		$jasa=$this->input->post('jenis');
		$kota=$this->input->post('kota');
		$paket=$this->input->post('paket');
		echo $this->cekHargaku($kota,$jasa,$paket)["harga"];
	}
	
	public function cekHargaku($tujuan,$cour,$paket){
		$curl = curl_init();
		$hasil;
		$harga["ket"]="";
		$harga["harga"]="";
		curl_setopt_array($curl, array(
		  CURLOPT_URL => "https://api.rajaongkir.com/starter/cost",
		  CURLOPT_RETURNTRANSFER => true,
		  CURLOPT_ENCODING => "",
		  CURLOPT_MAXREDIRS => 10,
		  CURLOPT_TIMEOUT => 30,
		  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		  CURLOPT_CUSTOMREQUEST => "POST",
		  CURLOPT_POSTFIELDS => "origin=256&destination=".$tujuan."&weight=100&courier=".$cour, //dalam gram
		  CURLOPT_HTTPHEADER => array(
			"content-type: application/x-www-form-urlencoded",
			"key: ec6957ae8995567c27fad9762d043d24"
		  ),
		));

		$response = curl_exec($curl);
		$err = curl_error($curl);

		curl_close($curl);
		
		
		
		if ($err) {
		  echo "cURL Error #:" . $err;
		} else {
			$hasil= json_decode($response);
		   //print_r(json_decode($response));
		}
		
		
		foreach($hasil as $name => $rajaongkir){
		//$harga.= $name . "\n";
			 foreach($rajaongkir as $name2 => $result){
				foreach($result as $name3 => $result0){
					if($name3=="0"){
						foreach($result0 as $name4 => $result1){
							if($name4=="code"){
							$harga["ket"].= "nama jasa :". $result1 . "\n";
							}
							if($name4=="costs"){
								foreach($result1 as $name5 => $result2){
									if($name5==$paket){//pilihan paket
										foreach($result2 as $name6 => $result3){
											if($name6=="service"){
											$harga["ket"].= "nama paket :". $result3 ."\n";
											}
											if($name6=="cost"){
												foreach($result3 as $name7 => $result4){
													foreach($result4 as $name8 => $result5){
														if($name8=="value"){
															$harga["harga"].= $result5;
															$harga["ket"].= "harga :".$result5."\n";
														}
														if($name8=="etd"){
															$harga["ket"].= "estimasi :".$result5."\n";
														}
														if($name8=="note"){
															$harga["ket"].= "catatatan :".$result5."\n";
														}
													}
											}
										}
									}
								}
							}
						}
					}
				}
			 //echo $name2 . ': ' . $value[0] . '-' . $value[1].'<br> ';
			 }
			 //echo $harga;
		}
		//echo "harga : ".$hasil['value'];
		return $harga;
	}
}

	public function setPengiriman(){
		$id= $this->session->userdata('id');
		$nama =  $this->input->post('nama');
		$alamat =  $this->input->post('alamat');
		$provinsi =  $this->input->post('provinsi');
		$kota =  $this->input->post('kota');
		$kodePos =  $this->input->post('kodePos');
		$noHp =  $this->input->post('noHp');
		$jasa =  $this->input->post('jasa');
		$paket =  $this->input->post('paket');
		$ket =  $this->input->post('harga');
		$harga =  $this->input->post('ongkir');
		
		$this->load->model('M_transaksi');
		$data = array(
			'id_pemesan' => $id,
			'nama' => $nama,
			'alamat' => $alamat,
			'provinsi' => $provinsi,
			'kabKota' => $kota,
			'kodePos' => $kodePos,
			'noHp' => $noHp,
			'jasaPengiriman' => $jasa,
			'paketPengiriman' => $paket,
			'ket' => "",
			'statusPengiriman' => "Pengiriman",
			'hargaOngkir' => $harga
			);
		$berhasil = $this->M_transaksi->updatePengiriman($data,'pengiriman');
		$this->updatePembayaran($id);
		if($berhasil!=0)
		{
			//$sukses['sukses'] = "sukses";
			header('location:'. base_url());
		}
	}
	
	public function setPengirimanAmbil(){
		$id= $this->session->userdata('id');
		
		$this->load->model('M_transaksi');
		$data = array(
			'id_pemesan' => $id,
			'hargaOngkir' => 0,
			'kodePos' => null,
			'statusPengiriman' => "Ambil Sendiri"
			);
		$berhasil = $this->M_transaksi->updatePengiriman($data,'pengiriman');
		$this->updatePembayaran($id);
		if($berhasil!=0)
		{
			//$sukses['sukses'] = "sukses";
			header('location:'. base_url());
		}
	}
	
	public function updatePembayaran($id){ 
	global $hargaKartuS1,$hargaKartuS2;
			$cek=$this->M_transaksi->get_dataPembayaran($id)->result();
		if (count($cek)>0){
			foreach ($cek as $c){
				
			};
			$data = array(
			'id_pembayaran' => $c->id_pembayaran,
			'id_pengirim' => $c->id_pengirim,
			'buktiPembayaran' => 'default3.png',
			'totalPembayaran' => $c->hargaOngkir,
			'statusPembayaran' => 'pending',
			'strataPendidikan' => $c->strataPendidikan,
			'thnLulus' => $c->thnLulus,
			'thnKerja' => $c->thnKerja,
			);	
			$thnLulus = $this->ubahTanggal($data['thnLulus']);
			$thnKerja = $this->ubahTanggal($data['thnKerja']);
			
			$start_date = new DateTime($thnLulus);
			$end_date = new DateTime(); // tanggal sekarang berdasarkan tanggal di komputer
			$selisihLulus        = $end_date->diff($start_date)->format("%a");

			$selisihLulus = (int)$selisihLulus/30;
			
			if($selisihLulus>=24){
				$data['totalPembayaran']+= $hargaKartuS2;
			}else{
				$data['totalPembayaran']+= $hargaKartuS1;
			}
			unset($data['strataPendidikan']);
			unset($data['thnLulus']);
			unset($data['thnKerja']);
			$this->M_transaksi->updatePembayaran($data,'pembayaran');
		}
	}
	public function ubahTanggal($tanggal){
			$split 	 = explode('/', $tanggal);
			return "".$split[2]."-".$split[0]."-".$split[1]."";
	}
}
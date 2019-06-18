<?php
class M_biodata extends CI_Model{
    
    //ambil data mahasiswa dari database
    function get_fakultas(){
        $query = $this->db->query("select * from fakultas");
        return $query;
    }
	function nama_fakultas($id){
        $query = $this->db->query("select fakultas_nama from fakultas where fakultas_id='$id'");
        return $query;
    }
	function nama_jurusan($id){
        $query = $this->db->query("select jurusan_nama from jurusan where jurusan_id='$id'");
        return $query;
    }
	function nama_programStudi($id){
        $query = $this->db->query("select prodi_nama from prodi where prodi_id='$id'");
        return $query;
    }
	function fakultas(){//cobaajax
		$this->db->order_by('fakultas_nama','ASC');
		$fakultas= $this->db->get('fakultas');
		return $fakultas->result_array();
	}
	function programStudi($jurId,$strataPendidikan){//cobaajax

	$programStudi="<option value='0'>--pilih--</pilih>";

	$this->db->order_by('prodi_nama','ASC');
	$jur= $this->db->get_where('prodi',array('jurusan_id'=>$jurId,'strataPendidikan'=>$strataPendidikan));

	foreach ($jur->result_array() as $data ){
	$programStudi.= "<option value='$data[prodi_id]'>$data[prodi_nama]</option>";
	}

	return $programStudi;

	}
	function jurusan($fakulId){//cobaajax

	$jurusan="<option value='0'>--pilih--</pilih>";

	$this->db->order_by('jurusan_nama','ASC');
	$jur= $this->db->get_where('jurusan',array('fakultas_id'=>$fakulId));

	foreach ($jur->result_array() as $data ){
	$jurusan.= "<option value='$data[jurusan_id]'>$data[jurusan_nama]</option>";
	}

	return $jurusan;

	}
	
	function get_jurusan(){
        $query = $this->db->query("select * from jurusan");
        return $query;
    }
	/*function get_jurusan($fakultas_id){
        $query = $this->db->query("select * from jurusan where fakultas_id='$fakultas_id'");
        return $query;
    }*/
	function get_biodata($id){
        $query = $this->db->query("SELECT * FROM alumni JOIN fakultas ON fakultas = fakultas_id JOIN jurusan ON jurusan = jurusan_id JOIN prodi ON programStudi = prodi_id where id_alumni='$id'");
        return $query;
    }
	function set_biodata($data,$table){
		$query = $this->db->insert($table,$data);
		return $query;
	}
	public function updateBio($data, $id, $table)
	{
	   $this->db->where('id_alumni', $id);
	   $this->db->update($table,$data); 
	}
	
	//Admin
	function read(){
		$this->db->order_by("id_alumni","desc");
		$query=$this->db->get("alumni");
		return $query->result_array();
	}
	function delete($id){
		$this->db->where("id_alumni",$id);
		$this->db->delete("alumni");
	}
	function set_ijazahValid($id){
		$this->db->set('status', 'valid');
		$this->db->where('id_alumni', $id);
		$this->db->update('alumni');
	}function jumlahMember(){
		return $this->db->count_all('alumni');
	}
	function jumlahMemberPending(){
		$this->db->where('status', 'pending');
		return $this->db->count_all_results('alumni');
	}
	function jumlahMemberMembayar(){
		$this->db->where('statusPembayaran', 'terbayar');
		return $this->db->count_all_results('pembayaran');
	}
	function jumlahMemberTerkirim(){
		$this->db->where('statusPembayaran', 'Terkirim');
		return $this->db->count_all_results('pembayaran');
	}
	function get_memberMembayar(){//SELECT * FROM alumni JOIN pengiriman ON id_alumni = id_pemesan JOIN pembayaran ON id_pengiriman =  where statusPembayaran='pending'
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->join('pengiriman', 'id_alumni = id_pemesan');
		$this->db->join('pembayaran', 'id_pengiriman = id_pengirim');
		$this->db->where('statusPembayaran', 'terbayar');
		return $this->db->get();
	}
	function get_memberTerkirim(){//SELECT * FROM alumni JOIN pengiriman ON id_alumni = id_pemesan JOIN pembayaran ON id_pengiriman =  where statusPembayaran='pending'
		$this->db->select('*');
		$this->db->from('alumni');
		$this->db->join('pengiriman', 'id_alumni = id_pemesan');
		$this->db->join('pembayaran', 'id_pengiriman = id_pengirim');
		$this->db->where('statusPembayaran', 'Terkirim');
		return $this->db->get();
	}
	function get_status($id){
		$this->db->select('status');
		$this->db->from('alumni');
		$this->db->where('id_alumni',$id);
		return $this->db->get();
	}
} 
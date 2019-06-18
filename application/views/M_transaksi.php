<?php
class M_transaksi extends CI_Model{
    
    public function set_pengiriman($data,$table){
		$query = $this->db->insert($table,$data);
		return $query;
	}	
	public function set_pembayaran($data,$table){
		$query = $this->db->insert($table,$data);
		return $query;
	}	
	public function updatePengiriman($data,  $table)
	{
	   $this->db->where('id_pemesan', $data['id_pemesan']);
	   $this->db->update($table,$data); 
	   return 1;
	}
	public function updatePembayaran($data,  $table)
	{
	   $this->db->where('id_pengirim', $data['id_pengirim']);
	   $this->db->update($table,$data); 
	   return 1;
	}
	public function pembayaranValid($data,  $table)
	{
	   $this->db->where('id_pembayaran', $data['id_pembayaran']);
	   $this->db->update($table,$data); 
	   return 1;
	}
	function get_pending(){
        $query = $this->db->query("SELECT * FROM alumni  where status='pending' ORDER BY id_alumni DESC");
        return $query;
    }
	function get_pembayaran(){
        $query = $this->db->query("SELECT * FROM alumni JOIN pengiriman ON id_alumni = id_pemesan JOIN pembayaran ON id_pengiriman = id_pengirim where statusPembayaran='pending' order by id_pembayaran desc");
        return $query;
    }
	function get_dataPengiriman($id){
        $query = $this->db->query("SELECT * FROM pengiriman where id_pemesan='$id'");
        return $query;
    }
	function get_dataPembayaran($id){
        $query = $this->db->query("SELECT * FROM pengiriman JOIN pembayaran ON id_pengirim=id_pengiriman JOIN alumni ON id_alumni=id_pemesan where id_pemesan='$id'");
        return $query;
    }
	
} 
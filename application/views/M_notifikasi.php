<?php
class M_notifikasi extends CI_Model{
    
    
	public function updateNotif($data)
	{
	   $this->db->where('statusNotifikasi', 0);
	   $this->db->where('id_alumni', $data['id_alumni']);
	   $this->db->update('notifikasi',$data); 
	   return 1;
	}
	
	function get_notif($id){
        $query = $this->db->query("SELECT * FROM notifikasi where id_alumni='$id' ORDER BY id_notif DESC LIMIT 5 ");
        return $query;
    }
	
	function jumlahNotif($id){
		$this->db->where('statusNotifikasi', '0');
		$this->db->where('id_alumni', $id);
		return $this->db->count_all_results('notifikasi');
	}
	function getAlumni(){
		return $this->db->get('alumni');
	}
	function setNotifikasi($data){
		return $this->db->insert('notifikasi', $data);
	}
	function getNotifikasiPending($id,$subjek){
		$this->db->where('id_alumni', $id);
		$this->db->where('subjek', $subjek);
		return $this->db->get('notifikasi');
	}
} 
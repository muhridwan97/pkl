<?php
class M_registrasi extends CI_Model{
    
    //ambil data mahasiswa dari database
	
    
	function tampil_data(){
		return $this->db->get('user');
	}
	
	function get_email(){
		return $this->db->query('select email from alumni');
	}
 
	function set_dataAlumni($data,$table){
		$query = $this->db->insert($table,$data);
		return $query;
	}
} 
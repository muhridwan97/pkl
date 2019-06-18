<?php
class M_login extends CI_Model{
    
    //ambil data mahasiswa dari database
    function get_admin(){
        $query = $this->db->query("select * from admin");
        return $query;
    }
	function get_alumni(){
        $query = $this->db->query("select * from alumni");
        return $query;
    }
	function get_alumniById($id){
        $query = $this->db->query("select * from alumni where id_alumni = '$id'");
        return $query;
    }
	function get_nama($email){
        $query = $this->db->query("select namaAlumni from alumni where email = '$email'");
        return $query;
    }
	function get_id($email){
        $query = $this->db->query("select id_alumni from alumni where email = '$email'");
        return $query;
    }
	function get_auth($email,$password){
        $query = $this->db->query("select * from alumni where email = '$email' && password = '$password'");
        return $query;
    }
	
} 
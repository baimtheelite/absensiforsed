<?php
defined('BASEPATH') OR exit('No direct script access allowed');
 
class Absensi_model extends CI_Model{
    public function GetAnggota($table){
        $res=$this->db->get($table); // Kode ini berfungsi untuk memilih tabel yang akan ditampilkan
        return $res->result_array(); // Kode ini digunakan untuk mengembalikan hasil operasi $res menjadi sebuah array
    }

    public function query($query){
        $res=$this->db->query($query);
        return $res->result_array();
    }
 
     public function qry($query){
        $res=$this->db->query($query);
        return $res;
    }

    public function Insert($table,$data){
        $res = $this->db->insert($table, $data); // Kode ini digunakan untuk memasukan record baru kedalam sebuah tabel
        return $res; // Kode ini digunakan untuk mengembalikan hasil $res
    }
 
    public function Update($table, $data, $where){
        $res = $this->db->update($table, $data, $where); // Kode ini digunakan untuk merubah record yang sudah ada dalam sebuah tabel
        return $res;
    }
 
    public function Delete($table, $where){
        $res = $this->db->delete($table, $where); // Kode ini digunakan untuk menghapus record yang sudah ada
        return $res;
    }

    public function GetWhere($table, $data){
        $res=$this->db->get_where($table, $data);
        return $res->result_array();
    }

    public function Counttbl($table){
        $res = $this->db->count_all($table);
        return $res;
    }
    
    public function max($table, $column){
        $this->db->select_max($column);
        $res = $this->db->get($table);
        return $res->result_array();
    }
}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('users')
                 ->order_by('id_users', 'DESC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("users", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_users)
    {

        $query = $this->db->where("id_users", $id_users)
                ->get("users");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("users", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("users", $id);
        $query = $this->db->delete("pustakawan", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function listing(){
        $this->db->select('*');
        $this->db->from('users');
        $query = $this->db->get();
        return $query->result();
    }

      public function view_row(){ 
         return $this->db->get('users')->result();  
     }

     public function view_by_date($date){
        $this->db->where('DATE(tanggal_dibuat)', $date); // Tambahkan where tanggal nya
        
        return $this->db->get('users')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }
    
    public function view_by_month($month, $year){
        $this->db->where('MONTH(tanggal_dibuat)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal_dibuat)', $year); // Tambahkan where tahun
        
        return $this->db->get('users')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }
    
    public function view_by_year($year){
        $this->db->where('YEAR(tanggal_dibuat)', $year); // Tambahkan where tahun
        
        return $this->db->get('users')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }
    
    public function view_all(){
        return $this->db->get('users')->result(); // Tampilkan semua data transaksi
    }
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal_dibuat) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('users'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tanggal_dibuat)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal_dibuat)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

    public function petugas()
    {
        $this->db->order_by('nama_user','ASC');
        $klasifikasi = $this->db->get('users');

        return $klasifikasi->result_array();
    }


}
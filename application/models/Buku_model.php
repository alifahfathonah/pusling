<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Buku_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('buku')
                 ->order_by('id_buku', 'ASC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("buku", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_buku)
    {

        $query = $this->db->where("id_buku", $id_buku)
                ->get("buku");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("buku", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("buku", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function viewByKode($kode_buku){
        $this->db->where('kode_buku', $kode_buku);
        $result = $this->db->get('buku')->row(); // Tampilkan data siswa berdasarkan NIS
        
        return $result; 
    }

    //function mendapatkan id terakhir atau id_max mobil
    public function get_idmax(){
        $this->db->select_max('id_buku');
        $this->db->from('buku');
        $query = $this->db->get()->row_array();
        return $query['id_buku'];   
    }

    //function membuat format id baru berbentuk 00001
    public function get_newid($auto_id){
        $noUrut = (int) substr($auto_id, 3, 3);

        // bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
        $noUrut++;

        // membentuk kode anggota baru
        // perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
        // misal sprintf("%03s", 12); maka akan dihasilkan '012'
        // atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
        $char = "BRG";
        $kodeBarang = sprintf("%03s", $noUrut);
        return $kodeBarang;
    }



}

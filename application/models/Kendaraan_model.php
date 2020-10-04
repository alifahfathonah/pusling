<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kendaraan_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('kendaraan')
                 ->order_by('id_kendaraan', 'DESC')
                 ->get();
        return $query->result();
    }



    public function simpan($data)
    {
        $query = $this->db->insert("kendaraan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_kendaraan)
    {

        $query = $this->db->where("id_kendaraan", $id_kendaraan)
                ->get("kendaraan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("kendaraan", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("kendaraan", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function viewByKode($kode_buku){
        $this->db->where('kode_kendaraan', $kode_kendaraan);
        $result = $this->db->get('kendaraan')->row(); // Tampilkan data siswa berdasarkan NIS
        
        return $result; 
    }

    public function kode_kendaraan_motor()
    {
        $this->db->order_by('kode_kendaraan','ASC');
        $this->db->where('jenis_kendaraan','motor');
        $pustakawan = $this->db->get('kendaraan');

        return $pustakawan->result_array();
    }


    public function kode_kendaraan_mobil()
    {
        $this->db->order_by('kode_kendaraan','ASC');
        $this->db->where('jenis_kendaraan','mobil');
        $pustakawan = $this->db->get('kendaraan');

        return $pustakawan->result_array();
    }


}
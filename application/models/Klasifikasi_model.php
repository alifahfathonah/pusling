<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi_model extends CI_model{

	public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('klasifikasi')
                 ->order_by('id_klasifikasi', 'ASC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("klasifikasi", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_buku)
    {

        $query = $this->db->where("id_klasifikasi", $id_buku)
                ->get("klasifikasi");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("klasifikasi", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("klasifikasi", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function klasifikasi()
    {
        $this->db->order_by('klasifikasi','ASC');
        $klasifikasi = $this->db->get('klasifikasi');

        return $klasifikasi->result_array();
    }

   



}
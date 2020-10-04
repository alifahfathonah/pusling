<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Kontak_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select('*')
                 ->from('kontak')
                 ->order_by('id_kontak', 'DESC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("kontak", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_kontak)
    {

        $query = $this->db->where("id_kontak", $id_kontak)
                ->get("kontak");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("kontak", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("kontak", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }


}
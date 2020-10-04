<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pustakawan_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('pustakawan')
                 ->order_by('id_pustakawan', 'DESC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("pustakawan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_pustakawan)
    {

        $query = $this->db->where("id_pustakawan", $id_pustakawan)
                ->get("pustakawan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("pustakawan", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("pustakawan", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function pustakawan()
    {
        $this->db->order_by('nama_pustakawan','ASC');
        $pustakawan = $this->db->get('pustakawan');

        return $pustakawan->result_array();
    }


}
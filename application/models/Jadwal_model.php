<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal_model extends CI_model{
 

    public function edit($id_jadwal)
    {

        $query = $this->db->where("id_jadwal", $id_jadwal)
                ->get("jadwal");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("jadwal", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {

        $query = $this->db->delete("jadwal", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

}
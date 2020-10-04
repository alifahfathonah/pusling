<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profil_model extends CI_model{

    

    public function edit($id_profil)
    {

        $query = $this->db->where("id_profil", $id_profil)
                ->get("profil");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("profil", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimoni_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('testimoni')
                 ->order_by('id_testimoni', 'DESC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("testimoni", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_testimoni)
    {

        $query = $this->db->where("id_testimoni", $id_testimoni)
                ->get("testimoni");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("testimoni", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {
        $_id = $this->db->get_where('testimoni',['id_testimoni' => $id])->row();
            $query = $this->db->delete('testimoni',['id_testimoni'=>$id]);
            if($query){
                unlink("assets/images_testimoni/".$_id->gambar);
            }
            
        $this->session->set_flashdata('hapus', 'Testimoni berhasil dihapus!');
            redirect('admin/testimoni');

    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Galeri_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('galeri')
                 ->order_by('id_galeri', 'DESC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("galeri", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_galeri)
    {

        $query = $this->db->where("id_galeri", $id_galeri)
                ->get("galeri");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("galeri", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    public function hapus($id)
    {
      $_id = $this->db->get_where('galeri',['id_galeri' => $id])->row();
            $query = $this->db->delete('galeri',['id_galeri'=>$id]);
            if($query){
                unlink("assets/images_galeri/".$_id->gambar);
            }
            
        $this->session->set_flashdata('hapus', 'Gambar berhasil dihapus!');
            redirect('admin/galeri');

    }

    //ambil data mahasiswa dari database
    function galeri_limit($limit, $start){
        $query = $this->db->get('galeri', $limit, $start);
        return $query;
    }


}
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('laporan')
                 ->order_by('id_laporan', 'DESC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("laporan", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

    

    public function edit($id_laporan)
    {

        $query = $this->db->where("id_laporan", $id_laporan)
                ->get("laporan");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("laporan", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

       public function hapus($id)
    {
      $_id = $this->db->get_where('laporan',['id_laporan' => $id])->row();
            $query = $this->db->delete('laporan',['id_laporan'=>$id]);
            if($query){
                unlink("assets/images_laporan/".$_id->gambar);
            }
            
        $this->session->set_flashdata('hapus', 'Laporan berhasil dihapus!');
            redirect('admin/laporan');

    }

    public function view_by_id($id){
        $this->db->where('id_laporan', $id); // Tambahkan where tanggal nya
        
        return $this->db->get('laporan')->row_array();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }

    public function view_by_date($date){
        $this->db->where('DATE(tgl_laporan)', $date); // Tambahkan where tanggal nya
        
        return $this->db->get('laporan')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }
    
    public function view_by_month($month, $year){
        $this->db->where('MONTH(tgl_laporan)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tgl_laporan)', $year); // Tambahkan where tahun
        
        return $this->db->get('laporan')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }
    
    public function view_by_year($year){
        $this->db->where('YEAR(tgl_laporan)', $year); // Tambahkan where tahun
        
        return $this->db->get('laporan')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }
    
    public function view_all(){
        $query = $this->db->select("*")
                 ->from('laporan')
                 ->order_by('created_at', 'DESC')
                 ->get();
        return $query->result();
    }
    
    public function option_tahun(){
        $this->db->select('YEAR(tgl_laporan) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('laporan'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tgl_laporan)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tgl_laporan)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }

}

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_buku_model extends CI_model{

    public function get_all()
    {
        $query = $this->db->select("*")
                 ->from('laporan_buku')
                 ->order_by('id_laporan_buku', 'DESC')
                 ->get();
        return $query->result();
    }

   


    public function simpan($data)
    {
        $query = $this->db->insert("laporan_buku", $data);

        if($query){
            return true;
        }else{
            return false;
        }

    }

     public function edit($id_laporan_buku)
    {

        $query = $this->db->where("id_laporan_buku", $id_laporan_buku)
                ->get("laporan_buku");

        if($query){
            return $query->row();
        }else{
            return false;
        }

    }

    public function update($data, $id)
    {

        $query = $this->db->update("laporan_buku", $data, $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }


    public function hapus($id)
    {

        $query = $this->db->delete("laporan_buku", $id);

        if($query){
            return true;
        }else{
            return false;
        }

    }

        public function view_by_date($date){
        $this->db->where('DATE(tanggal)', $date); // Tambahkan where tanggal nya
        
        return $this->db->get('laporan_buku')->result();// Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
    }
    
    public function view_by_month($month, $year){
        $this->db->where('MONTH(tanggal)', $month); // Tambahkan where bulan
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
        
        
        return $this->db->get('laporan_buku')->result(); // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
    }
    
    public function view_by_year($year){
        $this->db->where('YEAR(tanggal)', $year); // Tambahkan where tahun
        
        
        return $this->db->get('laporan_buku')->result(); // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
    }
    
    public function view_all(){
        $query = $this->db->select("*")
                 ->from('laporan_buku')
                 ->order_by('tanggal', 'DESC')
                 ->get();
        return $query->result();
    }
    
    public function option_tahun(){
        $this->db->select('YEAR(tanggal) AS tahun'); // Ambil Tahun dari field tgl
        $this->db->from('laporan_buku'); // select ke tabel transaksi
        $this->db->order_by('YEAR(tanggal)'); // Urutkan berdasarkan tahun secara Ascending (ASC)
        $this->db->group_by('YEAR(tanggal)'); // Group berdasarkan tahun pada field tgl
        
        return $this->db->get()->result(); // Ambil data pada tabel transaksi sesuai kondisi diatas
    }


}

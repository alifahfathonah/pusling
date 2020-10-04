<?php

class Statistik extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

        
        $this->load->model('Kontak_model');  
        $this->load->model('admin');
        $this->load->library('upload');
        $this->load->library('session');
        $this->load->helper("file");


	}

	public function index()
	{
        
        $data['buku']=$this->db->query("Select * from buku group by judul")->result();
        $data['laporan_buku']=$this->db->query("Select * from laporan_buku")->result();
        $data['kontak']=$this->Kontak_model->get_all();
        
        $data['Mobil']=$this->db->query("select count(*) from laporan where jenis_pusling='Mobil'")->row_array();
        // var_dump($data['Mobil']);die;

        $data['Motor']=$this->db->query("select count(*) from laporan where jenis_pusling='Motor'")->row_array(); 


        // var_dump($data);
        // die;

        // load view admin/overview.php
        $this->load->view("statistik", $data);
	}

}
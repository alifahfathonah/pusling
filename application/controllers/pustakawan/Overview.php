<?php

class Overview extends CI_Controller {
    public function __construct()
    {
		parent::__construct();

		 $this->load->model('admin');
        //cek session dan level user
        if($this->admin->is_role() != "pustakawan"){
            redirect("auth/login/");
        }
	}

	public function index()
	{
        // load view admin/overview.php

        

        $ket = 'Laporan Statistik';
        $url_cetak = 'pustakawan/overview/cetak_statistik';

        $data['ket'] = $ket;
        $data['url_cetak'] = base_url($url_cetak);

        $data['buku']=$this->db->query("Select * from buku group by judul")->result();
        $data['laporan_buku']=$this->db->query("Select * from laporan_buku")->result();

        
        $data['Mobil']=$this->db->query("select count(*) from laporan where jenis_pusling='Mobil'")->row_array();
        // var_dump($data['Mobil']);die;

        $data['Motor']=$this->db->query("select count(*) from laporan where jenis_pusling='Motor'")->row_array();
        $this->load->view("pustakawan/overview", $data);
	}

    public function cetak_statistik(){
        
            $ket = 'Semua Data Laporan Statistik';
            $data['ket'] = $ket;
            $data['Mobil']=$this->db->query("select count(*) from laporan where jenis_pusling='Mobil'")->row_array();
            // var_dump($data['Mobil']);die;

            $data['Motor']=$this->db->query("select count(*) from laporan where jenis_pusling='Motor'")->row_array();

            $data['buku']=$this->db->query("Select * from buku group by judul")->result();
            $data['laporan_buku']=$this->db->query("Select * from laporan_buku")->result();


    ob_start();
    // $data['users'] = $this->User_model->view_row();
    $this->load->view('pustakawan/laporan/print_statistik', $data);
    $html = ob_get_contents();
        ob_end_clean();
        
        require_once('assets/html2pdf/html2pdf.class.php');
    $pdf = new HTML2PDF('L','A4','en');
    $pdf->WriteHTML($html);
    $pdf->Output('Data Laporan.pdf', 'D');
  }

}